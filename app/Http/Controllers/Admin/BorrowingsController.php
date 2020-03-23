<?php

namespace App\Http\Controllers\Admin;

use App\Borrowing;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostponeBorrowingRequest;
use App\Http\Requests\ValidateBorrowingRequest;
use App\Notifications\CancelledBorrowingNotification;
use App\Notifications\PostponedBorrowingNotification;
use App\Notifications\ValidatedBorrowingNotification;

class BorrowingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:manage_borrowings');
    }

    public function index()
    {
        return view('admin.borrowings.index', [
            'borrowings' => Borrowing::where('starting_at', '!=', null)->where('started_at', '=', null)->where('cancelled_at', '=', null)->orderBy('created_at', 'desc')->paginate(20),
        ]);
    }

    public function current()
    {
        return view('admin.borrowings.current', [
            'borrowings' => Borrowing::where('started_at', '!=', null)->where('finished_at', '=', null)->where('cancelled_at', '=', null)->orderBy('created_at', 'desc')->paginate(20),
        ]);
    }

    public function finished()
    {
        return view('admin.borrowings.finished', [
            'borrowings' => Borrowing::where('finished_at', '!=', null)->orWhere('cancelled_at', '!=', null)->orderBy('created_at', 'desc')->paginate(20),
        ]);
    }

    public function validation(Borrowing $borrowing)
    {
        return view('admin.borrowings.validate', [
            'borrowing' => $borrowing,
        ]);
    }

    public function submitValidation(ValidateBorrowingRequest $request, Borrowing $borrowing)
    {
        $startingAt = $request->get('startingAt');
        $finishingAt = $request->get('finishingAt');

        $borrowing->starting_at = $startingAt;
        $borrowing->finishing_at = $finishingAt;
        $borrowing->validated_at = now();
        $borrowing->save();

        $borrowing->user->notify(new ValidatedBorrowingNotification($borrowing));

        return redirect()->route('admin.borrowings.index')->with('success', 'L\'emprunt de '.$borrowing->replica->book->title.' par '.$borrowing->user->name.' a bien été validé !');
    }

    public function withdraw(Borrowing $borrowing)
    {
        if (is_null($borrowing->validated_at)) {
            return redirect()->back()->withErrors('Merci de valider la demande avant de la faire retirer.');
        }

        $borrowing->started_at = now();
        $borrowing->save();

        return redirect()->back()->with('success', 'L\'ouvrage a bien été retiré.');
    }

    public function postpone(Borrowing $borrowing)
    {
        return view('admin.borrowings.postpone', [
            'borrowing' => $borrowing,
        ]);
    }

    public function submitPostpone(PostponeBorrowingRequest $request, Borrowing $borrowing)
    {
        $finishingAt = $request->get('finishingAt');

        $borrowing->finishing_at = $finishingAt;
        $borrowing->save();

        $borrowing->user->notify(new PostponedBorrowingNotification($borrowing));

        return redirect()->route('admin.borrowings.current')->with('success', 'Cet emprunt a été reporté.');
    }

    public function deposit(Borrowing $borrowing)
    {
        $borrowing->finished_at = now();
        $borrowing->save();

        $late = $borrowing->finished_at->diffInDays($borrowing->finishing_at, false);

        if ($late < 0) {
            return redirect()->back()->with('success', 'Le livre a été rendu avec un retard de '.$late.' jours.');
        } else {
            return redirect()->back()->with('success', 'Le livre a été rendu à l\'heure.');
        }
    }

    public function cancel(Borrowing $borrowing)
    {
        $borrowing->cancelled_at = now();
        $borrowing->save();

        $borrowing->user->notify(new CancelledBorrowingNotification($borrowing));

        return redirect()->route('admin.borrowings.index')->with('success', 'L\'emprunt de '.$borrowing->replica->book->title.' par '.$borrowing->user->name.' a bien été annulé.');
    }
}

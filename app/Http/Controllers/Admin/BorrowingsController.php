<?php

namespace App\Http\Controllers\Admin;

use App\Borrowing;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateBorrowingRequest;
use App\Notifications\CancelledBorrowingNotification;
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
            'borrowings' => Borrowing::where('starting_at', '!=', null)->where('started_at', '=', null)->orderBy('created_at', 'desc')->paginate(10),
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

    public function cancel(Borrowing $borrowing)
    {
        $borrowing->cancelled_at = now();
        $borrowing->save();

        $borrowing->user->notify(new CancelledBorrowingNotification($borrowing));

        return redirect()->route('admin.borrowings.index')->with('success', 'L\'emprunt de '.$borrowing->replica->book->title.' par '.$borrowing->user->name.' a bien été annulé.');
    }
}

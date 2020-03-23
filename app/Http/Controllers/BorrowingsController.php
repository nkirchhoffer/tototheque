<?php

namespace App\Http\Controllers;

use App\Notifications\CancelledBorrowingNotification;

class BorrowingsController extends Controller
{
    private $auth;

    public function __construct(AuthManager $auth)
    {
        $this->auth = $auth;

        $this->middleware('auth');
    }

    public function cancel(Borrowing $borrowing)
    {
        if ($this->auth->user()->id !== $borrowing->user->id) {
            return redirect()->route('app')->withErrors('Vous ne pouvez pas faire cela.');
        }

        $borrowing->cancelled_at = $borrowing;
        $borrowing->save();

        $borrowing->user->notify(new CancelledBorrowingNotification($borrowing));

        return redirect()->route('app')->with('success', 'Votre emprunt a été annulé.');
    }
}

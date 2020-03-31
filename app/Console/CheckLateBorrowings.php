<?php

namespace App\Console;

use App\Borrowing;
use App\Notifications\LateBorrowingNotification;

class CheckLateBorrowings {

    public function __invoke()
    {
        $borrowings = Borrowing::where('started_at', '!=', NULL)->where('finished_at', '=', NULL)->get();

        foreach ($borrowings as $borrowing) {
            if ($borrowing->late() < 0) {
                $borrowing->user->notify(new LateBorrowingNotification($borrowing));
            }
        }
    }

}
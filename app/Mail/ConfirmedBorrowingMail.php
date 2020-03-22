<?php

namespace App\Mail;

use App\Borrowing;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmedBorrowingMail extends Mailable
{
    use Queueable, SerializesModels;

    private $borrowing;

    /**
     * Create a new message instance.
     *
     * @param Borrowing $borrowing
     * @return void
     */
    public function __construct(Borrowing $borrowing)
    {
        $this->borrowing = $borrowing;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.borrowings.confirmed', ['borrowing' => $this->borrowing]);
    }
}

<?php

namespace App\Mail;

use App\User;
use App\VerificationToken;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyMailAddress extends Mailable
{
    use Queueable;
    use SerializesModels;

    private $token;
    private $user;

    /**
     * Create a new message instance.
     *
     * @param VerificationToken $token Token de vérification
     *
     * @return void
     */
    public function __construct(VerificationToken $token, User $user)
    {
        $this->token = $token;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Vérification de l\'adresse e-mail')
            ->from('no-reply@tototheque.fr')
            ->view('mails.verification', ['token' => $this->token, 'user' => $this->user]);
    }
}

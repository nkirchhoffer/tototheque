<?php

namespace App\Notifications;

use App\Borrowing;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\NexmoMessage;
use Illuminate\Notifications\Notification;

class ValidatedBorrowingNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $borrowing;

    /**
     * Create a new notification instance.
     *
     * @param Borrowing $borrowing
     *
     * @return void
     */
    public function __construct(Borrowing $borrowing)
    {
        $this->borrowing = $borrowing;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function via($notifiable)
    {
        return is_null($notifiable->phone_number) ? ['mail'] : ['mail', 'nexmo'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage())
                    ->from('contact@nkir.ch')
                    ->subject('Votre emprunt a été validé')
                    ->line('Votre emprunt de **'.$this->borrowing->replica->book->title.'** a été validé.')
                    ->line('Vous êtes invité à venir retirer le livre dès le **'.$this->borrowing->starting_at->locale('fr_FR')->isoFormat('LL').' à 14h00**.')
                    ->line('Votre emprunt se terminera donc le **'.$this->borrowing->finishing_at->locale('fr_FR')->isoFormat('LL').' à 20h00**. Tout retard sera sanctionné.')
                    ->line('Il n\'est pas trop tard pour annuler votre emprunt, cliquez sur le lien ci-dessous :')
                    ->action('Annuler l\'emprunt', route('borrowings.cancel', $this->borrowing))
                    ->line('Merci de votre confiance, à bientôt !');
    }

    public function toNexmo($notifiable)
    {
        return (new NexmoMessage())
                    ->content('Vous pouvez venir retirer '.$this->borrowing->replica->book->title.' dès le '.$this->borrowing->starting_at->locale('fr_FR')->isoFormat('LL').' à 14h. Fin de l\'emprunt le '.$this->borrowing->finishing_at->locale('fr_FR')->isoFormat('LL').' à 20h. Merci !')
                    ->unicode();
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}

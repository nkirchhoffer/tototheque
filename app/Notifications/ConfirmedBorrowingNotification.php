<?php

namespace App\Notifications;

use App\Borrowing;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\NexmoMessage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;

class ConfirmedBorrowingNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $borrowing;

    /**
     * Create a new notification instance.
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
        return !is_null($notifiable->phone_number) ? ['nexmo', 'mail'] : ['mail'];
    }

    /**
     * Get the Mail representation of the notification.
     *
     * @param Notifiable $notifiable
     *
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage())
            ->from('contact@nkir.ch')
            ->subject('Confirmation de votre emprunt')
            ->greeting('Cher(e) '.$notifiable->name.',')
            ->line('Nous avons bien reçu votre demande d\'emprunt de **'.$this->borrowing->replica->book->title.'**.')
            ->line('Cet emprunt débuterait le **'.$this->borrowing->starting_at->locale('fr_FR')->isoFormat('LL').'** et se terminerait le **'.$this->borrowing->finishing_at->locale('fr_FR')->isoFormat('LL').'**.')
            ->line('Une confirmation vous sera envoyée dès que votre demande sera traitée, elle contiendra la date et l\'heure du retrait ainsi que celles du rendu. Tout retard de rendu engendrera une sanction.')
            ->line('Vous pouvez cependant annuler votre emprunt à tout moment à partir du lien ci-dessous.')
            ->action('Annuler ma demande', route('borrowings.cancel', ['borrowing' => $this->borrowing]))
            ->line('Merci de votre confiance, à bientôt !');
    }

    /**
     * Get the Nexmo representation of the notification.
     *
     * @param Notifiable $notifiable
     *
     * @return NexmoMessage
     */
    public function toNexmo($notifiable)
    {
        return (new NexmoMessage())
            ->content('Votre demande d\'emprunt de '.$this->borrowing->replica->book->title.' a bien été reçue. Vous recevrez une confirmation dans les heures à venir.')
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

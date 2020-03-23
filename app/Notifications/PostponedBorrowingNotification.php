<?php

namespace App\Notifications;

use App\Borrowing;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\NexmoMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PostponedBorrowingNotification extends Notification implements ShouldQueue
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
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return is_null($notifiable->phone_number) ? ['mail'] : ['nexmo', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Prolongation de votre emprunt')
                    ->greeting('Cher(e) '.$notifiable->name.',')
                    ->line('Votre date de rendu pour l\'emprunt de **'.$this->borrowing->replica->book->title.'** a été reportée au **'.$this->borrowing->finishing_at->locale('fr_FR')->isoFormat('LL').' à 20h00**.')
                    ->line('Tout retard de rendu engendrera des sanctions.')
                    ->line('Merci de votre compréhension !');
    }

    public function toNexmo($notifiable)
    {
        return (new NexmoMessage)
                    ->content('La date de rendu de votre emprunt de '.$this->borrowing->replica->book->title.' a été reportée au '.$this->borrowing->finishing_at->locale('fr_FR')->isoFormat('LL').' à 20h. Merci !')
                    ->unicode();
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}

<?php

namespace App\Notifications;

use App\Borrowing;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\NexmoMessage;
use Illuminate\Notifications\Notification;

class LateBorrowingNotification extends Notification implements ShouldQueue
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

    public function late()
    {
        return abs($this->borrowing->late()).(abs($this->borrowing->late() > 1) ? ' jours' : ' jour');
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
        return is_null($notifiable->phone_number) ? ['mail'] : ['nexmo', 'mail'];
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
                    ->subject('Retard de votre emprunt')
                    ->greeting('Cher(e) '.$notifiable->name.',')
                    ->line('Votre emprunt du livre **'.$this->borrowing->replica->book->title.'** accuse un retard de '.$this->late().'.')
                    ->line('Merci de vous rapprocher de nous afin de trouver une entente, vous pouvez nous envoyer un mail avec le lien ci-dessous :')
                    ->action('Nous contacter par mail', 'mailto:emprunts@tototheque.fr')
                    ->line('Nous vous remercions de votre coopération.');
    }

    public function toNexmo($notifiable)
    {
        return (new NexmoMessage())
                    ->content('Votre emprunt de '.$this->borrowing->replica->book->title.' accuse un retard de '.$this->late().'. Merci de nous contacter au plus vite.')
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

<?php

namespace App\Notifications;

use App\Borrowing;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\NexmoMessage;
use Illuminate\Notifications\Notification;

class CancelledBorrowingNotification extends Notification implements ShouldQueue
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
                    ->subject('Concernant votre emprunt')
                    ->greeting('Cher(e) '.$notifiable->name.',')
                    ->line('Votre emprunt du livre **'.$this->borrowing->replica->book->title.'** a été annulé.')
                    ->line('Vous pouvez cependant effectuer d\'autres demandes d\'emprunt à partir du lien ci-dessous :')
                    ->action('Emprunter '.$this->borrowing->replica->book->title, route('book', $this->borrowing->replica->book))
                    ->line('Merci de votre compréhension.');
    }

    public function toNexmo($notifiable)
    {
        return (new NexmoMessage())
                    ->content('Votre emprunt de '.$this->borrowing->book->title.' a été annulé. Vous pouvez cependant emprunter une autre édition. Merci.')
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

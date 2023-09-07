<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class RegisterInvitation extends Notification
{
    use Queueable;

    /**
     * @var array $payload
     */
    public $payload;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(array $payload)
    {
        $this->payload = $payload;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Registration invitation')
            ->greeting('Dear teacher!')
            ->line(__('Your friend :inviter invites you to register as a teacher at :school.', ['inviter' => $this->payload['inviter'], 'school' => $this->payload['school']]))
            ->action('Go to register', $this->payload['url'])
            ->line('If you are not aware of this, please ignore this message. Good luck!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable): array
    {
        return [
            //
        ];
    }
}

<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UpdateTeamRegistration extends Notification implements ShouldQueue
{
    use Queueable;
    private $oldEmail;
    private $newEmail;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($oldEmail,$newEmail)
    {
        $this->oldEmail = $oldEmail;
        $this->newEmail = $newEmail;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
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
            ->subject('2018 APP移動應用創新賽隊伍資料更改')
            ->greeting('您好！')
            ->line("隊長已將您的電子郵件($this->oldEmail)更改至此電子郵件($this->newEmail)")
            ->action('官網', url(config('app.url')));
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

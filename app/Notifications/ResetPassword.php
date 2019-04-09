<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword as OriginalResetPassword;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPassword extends OriginalResetPassword implements ShouldQueue
{
    use Queueable;

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $this->token);
        }

        return (new MailMessage())
            ->subject('2019 APP移動應用創新賽 密碼重置')
            ->greeting('親愛的參賽者您好：')
            ->line('你會收到這封郵件是因為我們收到了您請求重置密碼。')
            ->action('重置密碼', url(config('app.url').route('password.reset', $this->token, false)))
            ->line('若您沒有請求重置密碼，請忽略此郵件。');
    }

    /**
     * Get the tags that should be assigned to the job.
     *
     * @return array
     */
    public function tags()
    {
        return ['ResetPassword'];
    }
}

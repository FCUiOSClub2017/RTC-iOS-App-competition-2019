<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\ResetPassword as OriginalResetPassword;

class ResetPassword extends OriginalResetPassword
{
    use Queueable;

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $this->token);
        }
        return (new MailMessage)
            ->subject('2018 APP移動應用創新賽隊伍密碼重置')
            ->greeting('您好！')
            ->line('你會收到這封郵件是因為我們收到了您請求重置密碼。')
            ->action('重置密碼', url(config('app.url').route('password.reset', $this->token, false)))
            ->line('如果你沒有請求重置密碼，請忽略此郵件。');
    }
}

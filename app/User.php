<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use App\Notifications\ResetPassword;
use App\Notifications\VerifyEmail;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password',
        'verify',
    ];

    protected $casts = [
        'verify' => 'boolean',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the phone record associated with the user.
     */
    public function user_verify()
    {
        return $this->hasOne('App\UserVerify');
    }


    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    /**
     * Send the verify notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendVerifyEmailNotification($token)
    {
        $this->notify(new VerifyEmail($token));
    }

}

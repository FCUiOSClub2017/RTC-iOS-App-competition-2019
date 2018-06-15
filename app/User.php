<?php

namespace App;

use App\Notifications\ResetPassword;
use App\Notifications\VerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

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
     * Send the password reset notification.
     *
     * @param string $token
     *
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    /**
     * Send the verify notification.
     *
     * @param string $token
     *
     * @return void
     */
    public function sendVerifyEmailNotification($token)
    {
        $this->notify(new VerifyEmail($token));
    }

    public function verify()
    {
        return $this->hasOne('App\UserVerify');
    }

    public function team_member()
    {
        return $this->hasMany('App\TeamMember');
    }

    private $teamMemberGroupByLevel;

    public function teamMemberGroupByLevel()
    {
        if (!$this->teamMemberGroupByLevel) {
            $this->teamMemberGroupByLevel = $this->team_member->groupBy('level')->map(function ($item, $key) {
                return $item->first();
            });
        }

        return $this->teamMemberGroupByLevel;
    }
}

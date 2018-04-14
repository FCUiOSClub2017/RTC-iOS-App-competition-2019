<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Notifications\CompleteTeamRegistration;
use App\Notifications\UpdateTeamRegistration;

class TeamMember extends Model
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 
        'name', 
        'email', 
        'phone',
        'level', 
        'univercity_id',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $this->notify(new CompleteTeamRegistration());
        });
        static::saving(function ($model) {
            $columns = $model->getDirty();
            foreach ($columns as $column => $newValue) {
                $this->notify(new UpdateTeamRegistration());
            }
        });
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_id',
        'univercity_id',
    ];

    /**
     * Get the user that owns the phone.
     */
    public function level_label()
    {
        $name="NaN";
        switch ($this->level) {
            case 4:
            case 5:
                $name = "指導老師";
                break;
            case 1:
                $name = "隊長";
                break;
            case 2:
            case 3:
                $name = "隊員";
                break;
        }
        return $name;
    }

    /**
     * Get the user that owns the phone.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the user that owns the phone.
     */
    public function univercity()
    {
        return $this->belongsTo('App\Univercity');
    }
}

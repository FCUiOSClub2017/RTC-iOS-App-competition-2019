<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

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
    static public function levelText($data=null)
    {
        if($data==null)
            $data = $this->level;
        $name="NaN";
        switch ($data) {
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

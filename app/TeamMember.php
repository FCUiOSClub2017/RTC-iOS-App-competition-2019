<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
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
     * Get the user that owns the phone.
     */
    public function level_label()
    {
        $name="NaN";
        switch ($this->level) {
            case 0:
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

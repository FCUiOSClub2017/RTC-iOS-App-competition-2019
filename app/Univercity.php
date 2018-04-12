<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Univercity extends Model
{
    public $timestamps = false;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'course', 
    ];

    public function team_member(){
        return $this->hasMany('App\TeamMember');
    }
}

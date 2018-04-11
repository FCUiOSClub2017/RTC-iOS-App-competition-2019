<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserVerify extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'user_id';

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }

    protected $fillable = [
        'token', 
        'user_id', 
    ];

    /**
     * Get the user that owns the phone.
     */
    public function user()
    {
        // dd($this->email,\App\User::where('email','=',$this->email)->first());
        // return \App\User::whereEmail($this->email)->get()->first();
        return $this->belongsTo('App\User');
    }
}

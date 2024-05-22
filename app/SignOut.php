<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SignOut extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    // protected $casts = [
    //     'signout_time' => 'date:hh:mm',
    // ];

    function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Activitylog\Traits\CausesActivity;

class User extends Authenticatable
{
    use Notifiable;
    use CausesActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'responsible_name', 'password', 'uuid'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 
    ];

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class, 'marina_id');
    }

    public function isVerified()
    {
        return (bool) $this->email_verified_at;
    }

    public function isNotVerified()
    {
        return ! $this->isVerified();
    }
}

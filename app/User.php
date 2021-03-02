<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function debit_locations()
    {
        return $this->hasMany(DebitLocation::class);
    }

    public function debit_input(){
        return$this->hasManyThrough('App\DebitInput','App\DebitLocation');
    }

    public function tanam()
    {
        return $this->hasMany(Tanam::class);
    }
}

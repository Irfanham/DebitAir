<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tanam extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'parent'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function tanam_input()
    {
        return $this->hasMany(TanamInput::class);
    }

    public function stanam(){
        return $this->hasMany(Tanam::class,'parent');
    }

    public function subtanam(){
        return $this->hasMany(Tanam::class,'parent')->with('subtanam');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DebitInput extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'debit_location_id', 'debit',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    public function debit_location()
    {
        return $this->belongsTo(DebitLocation::class);
    }

    public function user(){
        return $this->hasOneThrough('App\User','App\DebitLocation','id','id','debit_location_id');
    }

}

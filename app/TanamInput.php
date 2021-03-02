<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TanamInput extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tanam_id', 'tanam_period', 'tanam_period_time', 'value',
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
        return $this->belongsTo(DebitLocations::class);
    }

    public function tanam()
    {
        return $this->belongsTo(Tanam::class);
    }


}

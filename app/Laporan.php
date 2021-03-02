<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    //
    public function tanam(){
        return $this->belongsTo(Tanam::class);
    }
    public function tanam_input(){
        return $this->belongsTo(TanamInput::class);
    }
}

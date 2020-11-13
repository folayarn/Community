<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    public function option(){
        return $this->hasMany('App\Option');
    }

    public function correct(){
        return $this->hasOne('App\Correct');

    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Correct extends Model
{
    public function quiz(){
        return $this->belongsTo('App\Quiz');

    }
}
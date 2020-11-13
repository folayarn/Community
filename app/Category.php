<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $fillable=['category'];
    
    public $timestamps=false;

    public function quiz(){
        return $this->hasMany('App\Quiz');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected $fillable=['body','topic','category','countAns','user_id','isAnswered','question_provider'];



    protected function user(){

   return     $this->belongsTo('App\User');
    }

    protected function answer(){

     return   $this->hasMany('App\Answer');
    }

    protected function following(){

       return $this->hasMany('App\FollowPost');
    }


}

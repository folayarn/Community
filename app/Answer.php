<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable=['body','answer_provider','question_id','user_id'];

    protected function user(){

    return    $this->belongsTo('App\User');
    }

    protected function question(){

     return   $this->belongsTo('App\Question');
    }


}

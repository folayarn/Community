<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FollowPost extends Model
{
    protected $fillable=['question_id','user_id','isFollowed',
    'topic','body','category','question_provider','isAnswered','creates'];

    public $timestamps=false;

    protected function user(){

       return $this->belongsTo('App\User');
    }
    protected function question(){

     return   $this->belongsTo('App\Question');
    }



}

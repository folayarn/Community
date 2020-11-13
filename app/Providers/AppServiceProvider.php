<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Schema;
use Illuminate\view;
use App\Question;
use App\Answer;
use App\FollowPost;
    
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('layouts.main', function ($view){
        $myquestion=count(Question::where('user_id',Auth::user()->id)->get());
        $myanswer=count(Answer::where('user_id',Auth::user()->id)->get());
        $follow=count(FollowPost::where('user_id',Auth::user()->id)->get());
        $view->with(['var'=>$myquestion, 'myanswer'=>$myanswer,'follow'=>$follow]);
        
    });

    }
}

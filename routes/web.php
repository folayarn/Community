<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@callback');

Route::prefix('/admin')->group(function(){
        //admin Routes
 Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/','AdminController@index')->name('admin.dashboard');
Route::get('/v-dex','Auth\AdminLoginController@showSignup')->name('admin.show');
Route::post('/register','Auth\AdminLoginController@signup')->name('admin.register');
});

Route::get('/create-questions', 'PostsController@index');
Route::post('/post-questions', 'PostsController@store');
Route::get('/create-answer/{id}', 'PostsController@answer');
Route::get('/trid=f/{id}', 'PostsController@show');
Route::post('/crk-fc', 'PostsController@postAnswer');
Route::put('/{id}', 'PostsController@update');
Route::put('/{id}', 'PostsController@answerUpdate');
Route::get('/trid=fedits/{id}', 'PostsController@edit');
Route::get('/crk-fcedit/{id}/ok/{qeu}', 'PostsController@showEdit');
//Route::any('/getlyrics', 'LyricsController@getsearch');
Route::get('/search', 'PostsController@search');
Route::put('/a/{id}', 'PostsController@answered');
Route::get('/ans/{user_id}','PostsController@myAns');
Route::get('/{user_id}','PostsController@myQues');

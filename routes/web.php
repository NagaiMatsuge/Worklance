<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::resource('/post', 'PostController')->names([
    'create' => 'post.create',
]);
Route::post('/changePassword', 'ChangePasswordController@changePassword')->name('changePassword');
Route::post('/post/search', 'PostController@search')->name('postSearch');

Route::get('/users/{id}', 'HomeController@user')->name('user');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
Route::get('/users', 'HomeController@users')->name('users');
Route::post('/search', 'HomeController@search')->name('search');

Route::put('/user/changeAbout', 'HomeController@changeAbout')->name('about');
Route::post('/user/personalInfo', 'HomeController@personalInfo')->name('personalInfo');

//Message
Route::post('/message/send/toUser', 'MessageController@store')->name('sendMessage');
Route::get('/message/delete/{id}', 'MessageController@destroy')->name('deleteMessage');

//Skill
//Admin Page stuff
Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminPageController@index');
    Route::get('/post', 'AdminPageController@publications');
    Route::get('/user/{id}/delete', 'AdminPageController@delete')->name('adminDeleteUser');
    Route::get('/post/{id}/delete', 'AdminPageController@deletePost')->name('adminDeletePost');
    Route::get('/user/{id}/makeAdmin', 'AdminPageController@makeAdmin')->name('makeUserAdmin');

    //Skill
    Route::get('/skill', 'SkillController@index')->name('homeSkillpage');
    Route::post('/skill/createSkill', 'SkillController@store')->name('addNewSkill');
    Route::get('/skill/delete/{id}', 'SkillController@destroy')->name('deleteSkill');
    Route::get('/skill/edit/{id}', 'SkillController@edit')->name('editSkill');
    Route::post('/skill/update/{id}', 'SkillController@update')->name('updateSkill');


});


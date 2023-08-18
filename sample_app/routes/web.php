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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'PlayerController@login');

Route::get('/login', 'PlayerController@login')->name('login');

Route::post('/login', 'ValidationController@val_login');


Route::get('/sign_up', 'PlayerController@sign_up')->name('sign_up');
Route::post('/sign_up', 'ValidationController@val_sign_up')->name('val_sign_up');
Route::get('/password_reset', 'PlayerController@password_reset')->name('password_reset');

Route::get('/index', 'PlayerController@index')->name('index');

Route::get('/post', 'PlayerController@post')->name('post');
Route::post('/post_confirm', 'PlayerController@post_confirm')->name('post_confirm');
Route::post('/post_complete', 'PlayerController@post_complete')->name('post_complete');
Route::get('/post_complete', 'PlayerController@index');
Route::get('/old_review_list', 'PlayerController@old_review_list')->name('old_review_list');
Route::get('/old_review', 'PlayerController@old_review')->name('old_review');
Route::get('/calendar', 'PlayerController@calendar')->name('calendar');
Route::get('/plan', 'PlayerController@plan')->name('plan');
Route::post('/plan_complete', 'ValidationController@plan_complete')->name('plan_complete');
Route::get('/plan_complete', 'PlayerController@friend_index');
Route::get('/friends_list', 'PlayerController@friends_list')->name('friends_list');
Route::get('/friend_index', 'PlayerController@friend_index')->name('friend_index');
Route::get('/add_friend', 'PlayerController@add_friend')->name('add_friend');


Route::get('/user_setting', 'PlayerController@user_setting')->name('user_setting');
Route::post('/user_setting_complete', 'ValidationController@user_setting_complete')->name('user_setting_complete');
Route::get('/mail', 'PlayerController@login');
Route::post('/mail', 'mailController@send');
Route::get('/post_edit', 'PlayerController@post_edit')->name('post_edit');
Route::get('/post_edit_complete', 'PlayerController@index');
Route::post('/post_edit_complete', 'PlayerController@post_edit_complete')->name('post_edit_complete');
Route::get('/post_delete', 'PlayerController@post_delete');
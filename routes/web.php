<?php

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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/checkins/{user_id}', 'CheckinController@getCheckinsForUser')->name('checkins.for.user');
Route::post('/checkin', 'CheckinController@processCheckin')->name('process.checkin.from.user');

Route::get('/friends', 'FriendController@index')->name('friends.index');
Route::post('/friends/request', 'FriendController@addUnverifiedFriend')->name('friends.addFriendUnverified');
Route::get('/search', 'SearchController@index')->name('search.index');
Route::post('/search', 'FriendController@doSearch')->name('search.doSearch');
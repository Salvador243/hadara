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

Route::get('/home', 'HomeController@index')->name('home');

//Google Login
Route::group(['prefix' => 'auth'], function () {
    Route::get('/{provider}', 'Auth\LoginController@redirectToProvider');
    Route::get('/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
});
//Controller to profile view
Route::get('/profile_details', 'Profile_DetailsController@details')->name('Pdetails');
//Controller to return the data of the user
Route::get('/profile_edit/{email}','Profile_EditController@edit')->name('Eprofile');
Route::patch('/profile_edit/{email}','Profile_EditController@update')->name('update');

//Controllers to upload images
Route::get('/upload','Upload_ImagesController@upload')->name('Upload');

//Controller to picture's details
Route::get('/picture_details', 'PictureDetailsController@showView')->name('picture_details');
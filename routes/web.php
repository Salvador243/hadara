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
Auth::routes();

Route::get('/', 'HomeController@index')->name('index');
Route::get('/search', 'HomeController@search')->name('search');
Route::get('/addComment', 'PictureDetailsController@addComment')->name('addComment');


//Google Login
Route::group(['prefix' => 'auth'], function () {
    Route::get('/{provider}', 'Auth\LoginController@redirectToProvider');
    Route::get('/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
});
//Controller to profile view
Route::get('/profile_details', 'Profile_DetailsController@details')->name('Pdetails');
//Controller to return the data of the user
Route::post('/profile_edit/{email}','Profile_EditController@edit')->name('Eprofile');
//controller to updating our data
Route::patch('/profile_update','Profile_EditController@update')->name('update.data');
//Controllers to upload images
Route::get('/upload','Upload_ImagesController@upload')->name('Upload');

//Controller to picture's details
Route::get('/picture_details/{id}', 'PictureDetailsController@showView')->name('picture_details');

Route::post('/save_image/{email}', 'Upload_ImagesController@save')->name('save');


Route::post('/dropzone/store/{email}','ImageController@store')->name('dropzone.store');

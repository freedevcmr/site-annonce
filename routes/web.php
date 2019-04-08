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

// Route::get('/', function () {
//     return view('welcome');
// });

//Auth::routes();
//route pour la connection 
Route::group(['prefix'=>'connexion','namespace'=>'Auth'],function(){
    
    Route::get('/','LoginController@showLoginForm')->name('login');
    Route::post('/','LoginController@login');
});

Route::post('deconnexion', 'Auth\LoginController@logout')->name('logout');

//route pour l'inscription
Route::group(['prefix'=>'enregistrement','namespace'=>'Auth'],function(){
    Route::get('/','RegisterController@showRegistrationForm')->name('register');
    Route::post('/','RegisterController@register');
});

Route::group(['prefix'=>'passe','namespace'=>'Auth'],function(){
    Route::get('change','ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('change/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('change', 'ResetPasswordController@reset')->name('password.update');
});

// Route::get('/home', 'HomeController@index')->name('home');
Route::view('/', 'home')->name('home');

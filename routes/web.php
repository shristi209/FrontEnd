<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\customauthenticationcontroller;
use App\Http\Controllers\resetPassword;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/login',[customauthenticationcontroller::class,'login']);
Route::get('/registration',[customauthenticationcontroller::class,'registration']);
//creating this to insert the data that is filled up by the user,, taklakka lagera db ma rakhna lai vayo after validation
Route::post('/register-user',[customauthenticationcontroller::class,'registerUser'])->name('register-user');
//for user le login garda, yo chai login garauna lai vayo like checking db and equal vayesi home page ma jane vayo
Route::post('/login-user',[customauthenticationcontroller::class,'loginUser'])->name('login-user');

Route::get('/dashboard',[customauthenticationcontroller::class,'dashboard']);

Route::get('/logout-user',[customauthenticationcontroller::class,'logoutUser']);
//below le chai forgetpassword ma thichda yo route ma redirect garxa, and below post wala le chai tespaxi ko value lai db ma rakhxa
Route::get('/forgot-password',[resetPassword::class,'forgotPassword']);

// Route::get('/forgot-password-post',[customauthenticationcontroller::class],'forgotPasswordPost')->name('forgot.password.post');


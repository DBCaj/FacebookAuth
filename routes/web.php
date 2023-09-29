<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\FacebookController;


////////////// login logout - start /////////////
Route::controller(AuthController::class)->group(function() {
  Route::get('/', 'login')->name('login.form');
  Route::post('/login-auth', 'loginAuth')->name('login.auth');
  Route::get('/logout', 'logout')->name('logout');
});
////////////// login logout - end //////////////



////////////////////////// Facebook Login Auth - start //////////////////////////
Route::controller(FacebookController::class)->group(function()
{
  Route::get('/auth/facebook', 'facebookPage')->name('login.facebook');
  Route::get('/auth/facebook/callback', 'facebookCallback');
  Route::get('/dashboard3', 'dashboard3')->name('facebook.dashboard');
});
////////////////////////// Facebook Login Auth - end //////////////////////////



//////////// auth middleware - start ////////////
Route::middleware('custom_auth')->group(function() {
  Route::get('/dashboard2', [AuthController::class, 'dashboard2'])->name('dashboard2');
});
//////////// auth middleware - end ////////////

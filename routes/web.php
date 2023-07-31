<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthentication ;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/registration',[UserAuthentication::class, 'registration']);
Route::get('/login',[UserAuthentication::class, 'login']);
Route::post('/register-user',[UserAuthentication::class, 'newUserRegistration'] )->name('register-user');
Route::post('/login-user',[UserAuthentication::class, 'newUserLogin'] )->name('login-user');

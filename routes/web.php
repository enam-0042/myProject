<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthentication ;
use App\Http\Controllers\ControlIpaddress ;

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

// here is all the database part
Route::get('/home',[ControlIpaddress::class, 'ipHome']);
Route::get('/addip',[ControlIpaddress::class, 'addippage']);
Route::get('/showlist',[ControlIpaddress::class, 'showlistpage']);

Route::post('/addip',[ControlIpaddress::class, 'addip'] )->name('addip');
Route::get('/changeip/{ip_id}',[ControlIpaddress::class, 'changeippage']);
Route::PUT('/updatelabel/{ip_id}', [ControlIpaddress::class, 'changeip']);
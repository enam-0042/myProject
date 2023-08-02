<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthentication ;
use App\Http\Controllers\ControlIpaddress ;
use App\Http\Controllers\LogController ;
use App\Http\Controllers\Welcome ;

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

Route::get('/', [Welcome::class, 'welcome']);
Route::get('/registration',[UserAuthentication::class, 'registration']);
Route::get('/login',[UserAuthentication::class, 'login']);
Route::post('/register-user',[UserAuthentication::class, 'newUserRegistration'] )->name('register-user');
Route::post('/login-user',[UserAuthentication::class, 'newUserLogin'] )->name('login-user');
Route::get('/logout',[UserAuthentication::class,'logout']);
// here is all the database part

Route::group(['middleware'=>['protectedPage']],function(){
    Route::get('/home',[ControlIpaddress::class, 'ipHome']);
    Route::get('/addip',[ControlIpaddress::class, 'addippage']);
    Route::get('/showlist',[ControlIpaddress::class, 'showlistpage']);
    
    Route::post('/addip',[ControlIpaddress::class, 'addip'] )->name('addip');
    Route::get('/changeip/{ip_id}',[ControlIpaddress::class, 'changeippage']);
    Route::PUT('/updatelabel/{ip_id}', [ControlIpaddress::class, 'changeip']);
    Route::get('/showchanges',[ControlIpaddress::class, 'showchange']);
    Route::get('/log',[LogController::class,'logentry']);
});






// session test from different browser
Route::get('/zzz',function(){
    $session= session()->all();
    print_r($session);
});


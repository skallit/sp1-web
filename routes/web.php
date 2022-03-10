<?php

use App\Models\ApiModel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
    return redirect(route('login'));
});

Auth::routes();

Route::middleware(\App\Http\Middleware\CheckToken::class)->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('reservation',\App\Http\Controllers\ReservationController::class);
    Route::get('reservation/{reservation}/delete',[\App\Http\Controllers\ReservationController::class,'delete'])->name('reservation.delete');
    Route::get('logout',[\App\Http\Controllers\Auth\LogoutController::class,'logout'])->name('login');
    Route::resource('profil',\App\Http\Controllers\UserController::class);
    Route::post('updatePassword',[\App\Http\Controllers\UserController::class,'updatePassword']);
    Route::post('reservation/vehicleChoice',[\App\Http\Controllers\ReservationController::class,'vehicleChoice']);
    //Route::resource('driver',\App\Http\Controllers\DriverController::class);
});

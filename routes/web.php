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
    Route::resource('reservation', \App\Http\Controllers\ReservationController::class);
    Route::get('reservation/{reservation}', [\App\Http\Controllers\ReservationController::class, 'show'])->name('reservation.show');
    Route::get('reservation/{reservation}/delete', [\App\Http\Controllers\ReservationController::class, 'delete'])->name('reservation.delete');
    Route::delete('reservation/{reservation}/destroy', [\App\Http\Controllers\ReservationController::class, 'destroy'])->name('reservation.destroy');
    Route::get('logout', [\App\Http\Controllers\Auth\LogoutController::class, 'logout'])->name('login');
    Route::resource('profil', \App\Http\Controllers\UserController::class);
    Route::resource('driver', \App\Http\Controllers\DriverController::class);
    Route::post('updatePassword', [\App\Http\Controllers\UserController::class, 'updatePassword']);
    Route::post('reservation/createConfirmation', [\App\Http\Controllers\ReservationController::class, 'createConfirmation']);
    Route::post('driver/createConfirmation', [\App\Http\Controllers\DriverController::class, 'createConfirmation']);
    Route::post('reservation/driverChoice', [\App\Http\Controllers\ReservationController::class, 'driverChoice']);
    //Route::resource('driver',\App\Http\Controllers\DriverController::class);
});

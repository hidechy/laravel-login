<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;

Route::group(['middleware' => ['guest']], function (){
    Route::get('/', [AuthController::class, 'showLogin'])->name('showLogin');
    Route::post('login', [AuthController::class, 'login'])->name('login');
});

Route::group(['middleware' => ['auth']], function (){
    Route::get('home', function () {
        return View('home');
    })->name('home');

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});
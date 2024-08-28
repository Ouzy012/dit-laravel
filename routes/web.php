<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home']);

Route::prefix('user')->group(function () {
    Route::get('create', [UserController::class, 'create'])->name('user.new');
    Route::post('store', [UserController::class, 'store'])->name('user.store');
    Route::get('index', [UserController::class, 'index'])->name('users.index');
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::middleware('jwt')->group(function () {
    Route::get('/', function () {
        return view('index');
    });
});

Route::get('/register', fn() => view('auth.register'));
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/verify-email/{token}', [AuthController::class, 'verifyEmail']);

Route::get('/login', fn() => view('auth.login'))->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout']);

Route::post('/forgot-password', [AuthController::class, 'sendOtp']);
Route::post('/reset-password', [AuthController::class, 'resetPassword']);

Route::post('/refresh-token', [AuthController::class, 'refresh']);

Route::get('/verify-success', fn() => view('auth.verify_success'));
Route::get('/verify-fail', fn() => view('auth.verify_fail'));

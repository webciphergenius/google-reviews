<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\UserController;
use App\Http\Controllers\QRCodeController;
Route::resource('users', UserController::class);
Route::get('qrcode/create', [QRCodeController::class, 'create'])->name('qrcode.create');
Route::post('qrcode/store', [QRCodeController::class, 'store'])->name('qrcode.store');
Route::get('/qrcode/show/{id}', [QRCodeController::class, 'show'])->name('qrcode.show');
Route::get('/qrcode/{user}', [QRCodeController::class, 'show'])->name('qrcode.show');
Route::get('/', function () {
    return view('home');
});

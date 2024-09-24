<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\UserController;



Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/', function () {
        return view('dashboard');
    });
   

Route::get('/book', [BookController::class, 'index'])->name('book.index');
Route::get('/book/upload', [BookController::class, 'upload'])->name('book.upload');
Route::post('/book/store', [BookController::class, 'store'])->name('book.store');



Route::get('/sport', [SportController::class, 'index'])->name('sport.index');
Route::post('/sport/massage/{userId?}', [SportController::class, 'storeMessage'])->name('message.store');

// New route to show a specific user's chat for admins
Route::get('/sport/user/{user}', [SportController::class, 'showUserChat'])->name('sport.user.chat');



Route::get('/user', [UserController::class, 'index'])->name('user.index');

});
require __DIR__.'/auth.php';

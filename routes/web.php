<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminTicketController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomepageController;

use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/', [HomepageController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/posts', [PostController::class, 'index']);
Route::get('/post/{post:slug}', [PostController::class, 'show']);
Route::get('/ticket/{ticket:slug}', [TicketController::class, 'show']);
Route::get('/tickets', [TicketController::class, 'index']);

Route::resource('/dashboard/tickets', AdminTicketController::class)->except('show')->middleware('admin');
Route::get('/dashboard/tickets/checkSlug', [AdminTicketController::class, 'checkSlug'])->middleware('admin');
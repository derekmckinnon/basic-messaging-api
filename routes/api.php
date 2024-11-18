<?php

use App\Http\Controllers\MessagesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);
Route::get('/list_all_users', [UserController::class, 'index']);

Route::get('/view_messages', [MessagesController::class, 'index']);
Route::post('/send_message', [MessagesController::class, 'send']);

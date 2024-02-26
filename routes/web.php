<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WhattsapController;
use App\Http\Controllers\MensajesController;

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
Route::get('/', [WhattsapController::class, 'intro']);
Route::get('/login', [WhattsapController::class, 'login']);
Route::get('/create', [WhattsapController::class, 'register']);
Route::get('/createA', [WhattsapController::class, 'registerConfirm']);
Route::get('/loginA', [WhattsapController::class, 'loginConfirm']);
Route::get('/ChatPage', [WhattsapController::class, 'ChatPage']);
Route::get('/obtener', [MensajesController::class, 'obtenerMensajes']);

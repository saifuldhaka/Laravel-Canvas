<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CanvasController;
use App\Http\Controllers\IdentifierController;


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
Route::resource('/',IdentifierController::class);
Route::resource('identifier',IdentifierController::class);
Route::resource('canvas',CanvasController::class);
Route::get('create-pdf/{id}', [CanvasController::class, 'createPdf'])->name('canvas.create-pdf');

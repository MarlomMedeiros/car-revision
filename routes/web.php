<?php

use App\Http\Controllers\RevisionController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\OwnerController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [OwnerController::class, 'index']);
Route::resource('/owners', OwnerController::class);
Route::resource('/owners/{owner}/vehicles', VehicleController::class);
Route::resource('/owners/{owner}/vehicles/{vehicle}/revisions', RevisionController::class);

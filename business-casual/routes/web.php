<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ClientController::class, 'index'])->name('home');

Route::get('clients', fn () =>  redirect()->route('home'));

Route::post('clients', [ClientController::class, 'store'])->name('clients.store');

Route::get('clients/show', [ClientController::class, 'show'])->name('clients.show');

Route::get('clients/create', [ClientController::class, 'create'])->name('clients.create');

Route::get('clients/logout', [ClientController::class, 'logout'])->name('clients.logout');
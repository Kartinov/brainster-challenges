<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProjectController;

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

Route::get('/', [PageController::class, 'index'])->name('home');

Route::post('/hire-student', [MailController::class, 'hireStudent'])->name('mails.hireStudent');

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'index')->name('auth.login')->middleware('guest');
    Route::get('/logout', 'logout')->name('auth.logout')->middleware('auth');
    Route::post('/authenticate', 'authenticate')->name('auth.authenticate');
});

Route::resource('projects', ProjectController::class)
    ->except('show')
    ->middleware('auth');

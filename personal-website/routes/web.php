<?php

use App\Http\Controllers\BlogController;
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

Route::get('/',             [BlogController::class, 'index'])->name('home');
Route::get('/about',        [BlogController::class, 'about'])->name('about');
Route::get('/sample-post',  [BlogController::class, 'samplePost'])->name('sample-post');
Route::get('/contact',      [BlogController::class, 'contact'])->name('contact');
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DiscussionController;
use App\Models\Discussion;

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

Route::get('/', [DiscussionController::class, 'index'])->name('dashboard');

Route::resource('discussions', DiscussionController::class)->except(['index']);

Route::resource('discussions.comments', CommentController::class)->only(
    ['store', 'create', 'update', 'edit', 'destroy']
);

require __DIR__ . '/auth.php';

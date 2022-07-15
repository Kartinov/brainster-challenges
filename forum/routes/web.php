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

Route::middleware('auth')->group(function () {
    Route::get('/', [DiscussionController::class, 'index'])->name('dashboard')->withoutMiddleware('auth');
    Route::post('/discussions', [DiscussionController::class, 'store'])->name('discussions.store');
    Route::get('/discussions/create', [DiscussionController::class, 'create'])->name('discussions.create');
    Route::get('/discussions/manage', [DiscussionController::class, 'manage'])->name('discussions.manage');
    Route::get('/discussions/{discussion}', [DiscussionController::class, 'show'])->name('discussions.show')->withoutMiddleware('auth');
    Route::get('/discussions/{discussion}/edit', [DiscussionController::class, 'edit'])->name('discussions.edit');
    Route::put('/discussions/{discussion}', [DiscussionController::class, 'update'])->name('discussions.update');
    Route::delete('/discussions/{discussion}', [DiscussionController::class, 'destroy'])->name('discussions.destroy');
    Route::put('/discussions/{discussion}/approve', [DiscussionController::class, 'approve'])->name('discussions.approve');

    Route::post('/discussions/{discussion}/comments', [CommentController::class, 'store'])->name('discussions.comments.store');
    Route::get('/discussions/{discussion}/comments/create', [CommentController::class, 'create'])->name('discussions.comments.create');
    Route::put('/discussions/{discussion}/comments/{comment}', [CommentController::class, 'update'])->name('discussions.comments.update');
    Route::delete('/discussions/{discussion}/comments/{comment}', [CommentController::class, 'destroy'])->name('discussions.comments.destroy');
    Route::get('/discussions/{discussion}/comments/{comment}/edit', [CommentController::class, 'edit'])->name('discussions.comments.edit');
});

require __DIR__ . '/auth.php';

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

// dashboard for everybody :)
Route::get('/', [DiscussionController::class, 'index'])->name('dashboard');



// auth only routes
Route::middleware(['auth'])->group(function () {
    Route::post('/discussions', [DiscussionController::class, 'store'])->name('discussions.store');
    Route::get('/discussions/create', [DiscussionController::class, 'create'])->name('discussions.create');

    // discussions routes for admins only
    Route::middleware(['isAdmin'])->group(function () {
        Route::get('/discussions/manage', [DiscussionController::class, 'manage'])->name('discussions.manage');
        Route::put('/discussions/{discussion}/approve', [DiscussionController::class, 'approve'])->name('discussions.approve');
    });

    // discussion routes for admins and discussion owners (edit, update, destroy)
    Route::middleware(['canManageDiscussion'])->group(function () {
        Route::get('/discussions/{discussion}/edit', [DiscussionController::class, 'edit'])->name('discussions.edit');
        Route::put('/discussions/{discussion}', [DiscussionController::class, 'update'])->name('discussions.update');
        Route::delete('/discussions/{discussion}', [DiscussionController::class, 'destroy'])->name('discussions.destroy');
    });

    // discussion show without auth middleware
    Route::get('/discussions/{discussion}', [DiscussionController::class, 'show'])->name('discussions.show')->withoutMiddleware('auth');

    // discussions routes for auth users (store, create)
    Route::post('/discussions/{discussion}/comments', [CommentController::class, 'store'])->name('discussions.comments.store');
    Route::get('/discussions/{discussion}/comments/create', [CommentController::class, 'create'])->name('discussions.comments.create');

    // comments routes for admins and comment owners (edit, update, destroy)
    Route::middleware('canManageComment')->group(function () {
        Route::put('/discussions/{discussion}/comments/{comment}', [CommentController::class, 'update'])->name('discussions.comments.update');
        Route::delete('/discussions/{discussion}/comments/{comment}', [CommentController::class, 'destroy'])->name('discussions.comments.destroy');
        Route::get('/discussions/{discussion}/comments/{comment}/edit', [CommentController::class, 'edit'])->name('discussions.comments.edit');
    });
});

require __DIR__ . '/auth.php';

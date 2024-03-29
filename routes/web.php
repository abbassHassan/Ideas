<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\IdeaLikeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;


Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


Route::group(['prefix' => 'ideas/', 'as' => 'idea.'], function () {

    Route::POST('', [IdeaController::class, 'store'])->name('create');
    Route::get('/{idea}', [IdeaController::class, 'show'])->name('show');

    Route::group(['middelware' => ['auth']], function () {

        Route::get('/{idea}/edit', [IdeaController::class, 'edit'])->name('edit');
        Route::put('/{idea}', [IdeaController::class, 'update'])->name('update');
        Route::delete('/{idea}', [IdeaController::class, 'destroy'])->name('destroy');
        Route::post('/{idea}/comments', [CommentController::class, 'store'])->name('comments.store');
    });
});


Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('store');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('user', UserController::class)->only('show');
Route::resource('user', UserController::class)->only('edit', 'update')->middleware('auth');


Route::get('profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');


Route::post('/users/{user}/follow', [FollowerController::class, 'follow'])->middleware('auth')->name('user.follow');
Route::post('//users/{user}/unfollow', [FollowerController::class, 'unfollow'])->middleware('auth')->name('user.unfollow');


Route::post('/ideas/{idea}/like', [IdeaLikeController::class, 'like'])->middleware('auth')->name('idea.like');
Route::post('/ideas/{idea}/unlike', [IdeaLikeController::class, 'unlike'])->middleware('auth')->name('idea.unlike');

Route::get('/feed', FeedController::class)->middleware('auth')->name('feed');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');

Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth', 'admin');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TagController;

Route::get('profiles/{user}', [ProfileController::class, 'show']);
Route::get('tags', [TagController::class, 'index']);
Route::get('articles/{article}/comments', [CommentController::class, 'index']);

Route::prefix('users')->group(function () {
    Route::post('/', [UserController::class, 'store']);
    Route::post('login', [UserController::class, 'login']);
});

Route::prefix('articles')->group(function () {
    Route::get('/', [ArticleController::class, 'index']);
    Route::get('feed', [ArticleController::class, 'feed']);
    Route::get('{article}', [ArticleController::class, 'show']);
});

Route::middleware('auth')->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'show']);
        Route::put('/', [UserController::class, 'update']);
    });

    Route::prefix('profiles')->group(function () {
        Route::post('{user}/follow', [ProfileController::class, 'follow']);
        Route::delete('{user}/follow', [ProfileController::class, 'unfollow']);
    });

    Route::prefix('articles')->group(function () {
        Route::post('/', [ArticleController::class, 'store']);
        Route::put('{article}', [ArticleController::class, 'update']);
        Route::delete('{article}', [ArticleController::class, 'destroy']);
        Route::post('{article}/favorite', [ArticleController::class, 'favorite']);
        Route::delete('{article}/favorite', [ArticleController::class, 'unfavorite']);
    });

    Route::prefix('articles')->group(function () {
        Route::post('{article}/comments', [CommentController::class, 'store']);
        Route::delete('{article}/comments/{comment}', [CommentController::class, 'destroy']);
    });
});

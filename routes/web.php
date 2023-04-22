<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;


Route::get('/', [BlogController::class, 'index']);

Route::get('/blog/{blog:slug}', [BlogController::class, 'show']);


Route::get('/author/{user:username}', function(User $user) {

    $blogs =  $user->blogs->load('author', 'category');
    return view('blogs', compact('blogs'));
});

Route::group(['middleware' => 'auth'], function () {
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');
    Route::post('/blogs/{blog:slug}/comments', [CommentController::class, 'store']);
    Route::post('/blog/{blog:slug}/subscription', [BlogController::class, 'subscriptionHandler']);
});

Route::group(['middleware' => 'guest'], function() {
    Route::get('/register', [AuthController::class, 'create']);
    Route::post('/register', [AuthController::class, 'store']);
    Route::get('/login', [AuthController::class, 'login']);
    Route::post('/login', [AuthController::class, 'post_login']);
});
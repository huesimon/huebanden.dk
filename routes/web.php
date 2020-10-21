<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PostController;
use Illuminate\Http\RedirectResponse;
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

Route::get('/', function () {
    return new RedirectResponse(route('posts.index'));
})->name('home');

Route::resources([
    'posts' => PostController::class,
    'comments' => CommentController::class,
    'photos' => PhotoController::class,
    'likes' => LikeController::class,
]);

Auth::routes();

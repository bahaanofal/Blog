<?php

use App\Http\Controllers\front\CommentsController;
use App\Http\Controllers\front\UsersPostsController;
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
    return view('welcome');
});

Route::get('/all-posts', [UsersPostsController::class, 'allPosts'])->name('usersPosts');

Route::resource('posts', UsersPostsController::class);

Route::get('post/{post_id}/comments/create', [CommentsController::class, 'create'])->name('comments.create');
Route::post('post/{post_id}/comments', [CommentsController::class, 'store'])->name('comments.store');
Route::get('post/{post_id}/comments/{comment_id}/edit', [CommentsController::class, 'edit'])->name('comments.edit');
Route::put('post/{post_id}/comments/{comment_id}', [CommentsController::class, 'update'])->name('comments.update');
Route::delete('post/{post_id}/comments/{comment_id}', [CommentsController::class, 'destroy'])->name('comments.destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
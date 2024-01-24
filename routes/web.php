<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostCommentController;

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

Route::get('/', [PostController::class, 'welcome'])->name('welcome');
Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
Route::get('posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');
Route::get('posts/{post:slug}/edit', [PostController::class,'edit'])->name('posts.edit');
Route::post('posts/store', [PostController::class, 'store'])->name('posts.store');
Route::delete('posts/{post:id}', [PostController::class, 'delete'])->name('posts.delete');
Route::post('posts/{post:id}/comments', [PostCommentController::class, 'store'])->name('post.comment.store');

Route::delete('posts/post-comment/{postComment:id}', [PostCommentController::class,'delete'])->name('post-comments.delete');

Route::get('/auth/redirect', [AuthController::class,'redirect'])->name('auth.redirect');
Route::get('/auth/callback', [AuthController::class,'callback'])->name('auth.callback');
Route::get('/auth/logout', [AuthController::class,'logout'])->name('auth.logout');

Route::get('posts', function(){
    return Inertia::render('Posts', [
        'posts' => Post::latest()->get()
    ]);
})->name('posts');

Route::get('categories/{category:slug}', function(Category $category){
    return Inertia::render('Posts', [
        'posts' => $category->posts
    ]);
})->name('categories');

Route::get('authors/{user:username}', function(User $user){
    return Inertia::render('Posts', [
        'posts' => $user->posts
    ]);
})->name('authors');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('dashboard', [PostController::class, 'index'])->name('dashboard');
});

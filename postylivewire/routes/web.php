<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentLikeController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\UnLikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReplyCommentController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\TrendingController;


Route::get('search', [SearchController::class, 'search'])->name('search');
Route::get('/find/user', [SearchController::class, 'find'])->name('find.user');

Route::get('edit/{id}', [UserController::class, 'edit'])->name('edit.profile');
Route::get('/user/{id}', [UserController::class, 'index'])->name('profile');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::get('/chats', [ChatController::class, 'index'])->name('chat');
Route::get('/messages/{id}', [ChatController::class, 'show'])->name('message');

Route::get('/', [PostController::class, 'index'])->name('post');
Route::get('/post/{id}', [PostController::class, 'show'])->name('post.index');

Route::get('post/{id}/comment', [CommentController::class, 'index'])->name('comment');
Route::get('post/comment/{id}/reply', [ReplyCommentController::class, 'index'])->name('reply');

Route::get('post/comment/{id}/reply/show', [ReplyCommentController::class, 'showReplies'])->name('show.replies');
Route::get('/user/{id}/post', [UserPostController::class, 'list'])->name('user.posts');

Route::get('/user/{id}/posts/following', [FollowerController::class, 'showFollowing'])->name('following');
Route::get('/user/{id}/posts/follow', [FollowerController::class, 'showFollowers'])->name('followers');

Route::get('/trending', [TrendingController::class, 'index'])->name('trending');

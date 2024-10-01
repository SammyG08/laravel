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


Route::get('search', [SearchController::class, 'search'])->name('search');
Route::get('/find/user', [SearchController::class, 'find'])->name('find.user');

Route::get('edit/{user:username}', [UserController::class, 'edit'])->name('edit.profile');
Route::post('edit/{user:username}/store', [UserController::class, 'store'])->name('store.edit');
Route::get('/user/{user}', [UserController::class, 'index'])->name('profile');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/chats', [ChatController::class, 'index'])->name('chat');
Route::get('/messages/{user:username}', [ChatController::class, 'show'])->name('message');

Route::get('/', [PostController::class, 'index'])->name('post');
Route::post('/post', [PostController::class, 'store'])->name('save.post');
Route::get('/post/{post}', [PostController::class, 'show'])->name('post.index');
Route::delete('post/{post}/delete', [PostController::class, 'destroy'])->name('delete');

Route::post('post/{post}/like', [LikeController::class, 'store'])->name('like');
Route::delete('post/{post}/unlike', [UnlikeController::class, 'destroy'])->name('unlike');

Route::get('post/{post}/comment', [CommentController::class, 'index'])->name('comment');
Route::post('post/{post}/comment', [CommentController::class, 'store']);
Route::delete('post/{post}/comment/{comment}/delete', [CommentController::class, 'destroy'])->name('delete.comment');
Route::post('post/{post}/comment/{comment}/like', [CommentLikeController::class, 'store'])->name('comment.like');
Route::delete('post/{post}/comment/{comment}/like', [CommentLikeController::class, 'destroy']);

Route::get('post/comment/{comment}/reply', [ReplyCommentController::class, 'index'])->name('reply');
Route::get('post/comment/{comment}/reply/show', [ReplyCommentController::class, 'showReplies'])->name('show.replies');
Route::post('post/comment/{comment}/reply/save', [ReplyCommentController::class, 'store'])->name('store.reply');
Route::delete('post/comment/reply/{reply}/delete', [ReplyCommentController::class, 'destroy'])->name('delete.reply');

Route::get('/user/{user:username}/post', [UserPostController::class, 'list'])->name('user.posts');

Route::post('/user/{user:username}/posts/follow', [FollowerController::class, 'store'])->name('user.follow');
Route::get('/user/{user:username}/posts/following', [FollowerController::class, 'showFollowing'])->name('following');
Route::delete('/user/{user:username}/posts/follow', [FollowerController::class, 'destroy']);
Route::get('/user/{user:username}/posts/follow', [FollowerController::class, 'showFollowers'])->name('followers');

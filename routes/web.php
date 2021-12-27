<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Mail\NewUserWelcomeMail;

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


Auth::routes();

Route::get('/email', function(){
    return new NewUserWelcomeMail();
});

Route::post('/follow/{user}', [FollowsController::class, 'store']);

Route::get('/profile/{user}', [ProfileController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/', [PostsController::class, 'index'])->name('post.index');
Route::get('/post/create', [PostsController::class, 'create'])->name('post.create');
Route::get('/post/{post}', [PostsController::class, 'show'])->name('post.show');
Route::post('/post', [PostsController::class, 'store'])->name('post.store');
Route::get('/post/{post}/edit',[PostsController::class, 'edit'])->name('post.edit');
Route::patch('/post/{post}',[PostsController::class, 'update'])->name('post.update');
Route::delete('/post/{post}',[PostsController::class, 'destroy'])->name('post.destroy');
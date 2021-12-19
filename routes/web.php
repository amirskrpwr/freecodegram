<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers;
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

Route::post('/follow/{user}', [Controllers\FollowsController::class, 'store']);

Route::get('/profile/{user}', [Controllers\ProfileController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [Controllers\ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [Controllers\ProfileController::class, 'update'])->name('profile.update');

Route::get('/', [Controllers\PostsController::class, 'index']);
Route::get('/post/create', [Controllers\PostsController::class, 'create']);
Route::get('/post/{post}', [Controllers\PostsController::class, 'show']);
Route::post('/post', [Controllers\PostsController::class, 'store']);
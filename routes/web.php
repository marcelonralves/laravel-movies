<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MovieController;
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

Route::get('/', [MovieController::class, 'home']);
Route::get('/post/{slug}', [MovieController::class, 'post']);

Route::controller(AdminController::class)->prefix('admin')->group(function () {

    Route::get('/login', 'showLogin')->name('login-admin');
    Route::post('/login', 'postLogin')->name('post-login');

    Route::middleware('auth')->group(function (){
        Route::get('/', 'home');
        Route::get('/posts', 'getPosts');
        Route::get('/post/new', 'newPost')->name('post-create');
        Route::get('/post/{id}/edit', 'editPost');
        Route::get('/post/{id}/del', 'delPost');
        Route::post('/post/new', 'postNewPost')->name('post-new');
        Route::post('/posts/edit', 'postEditPost')->name('post-edit');
    });
});

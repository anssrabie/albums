<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Auth
Route::group(['middleware' => 'guest:web'], function() {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login/post', [LoginController::class, 'postLogin'])->name('post.login');
});


Route::group(['middleware' => ['auth:web']], function() {

    Route::get('/', [HomeController::class,'index'])->name('home');
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

    // Albums
    Route::resource('/albums', AlbumController::class);

    Route::delete('/photos/{photoId}', [AlbumController::class,'deletePhoto'])->name('photos.destroy');
    Route::post('/photos/{photoId}', [AlbumController::class,'movePhoto'])->name('photos.move');
    Route::post('/photos/delete-all/{albumId}', [AlbumController::class,'deleteAllPhotos'])->name('photos.deleteAll');

});

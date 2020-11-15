<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use App\Http\Controllers\RecipieController;

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

//ログイン
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//投稿関連
Route::resource('post', PostController::class);
Route::put('/post/{post}/like', [PostController::class, 'like'])->name('post.like');
Route::delete('/post/{post}/dislike', [PostController::class, 'dislike'])->name('post.dislike');

//レシピ検索画面
Route::get('/recipie', [RecipieController::class, 'index'])->name('recipie.index');
Route::post('/recipie/category', [RecipieController::class, 'category'])->name('recipie.category');
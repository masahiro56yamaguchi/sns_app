<?php

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

Auth::routes();

Route::get('/shares', [App\Http\Controllers\HomeController::class, 'index'])->name('shares');

// 投稿一覧
Route::get('/shares', [App\Http\Controllers\SharesController::class, 'index'])->name('shares');

// 投稿画面を表示
Route::get('/post', [App\Http\Controllers\SharesController::class, 'create'])->name('post');

// 投稿する
Route::post('/post', [App\Http\Controllers\SharesController::class, 'store'])->name('shares.store');

// 編集ページを表示
Route::get('/edit/{id}', [App\Http\Controllers\SharesController::class, 'edit'])->name('post.edit');

// 投稿の更新
Route::post('/update/{id}', [App\Http\Controllers\SharesController::class, 'update'])->name('shares.update');

// 投稿の削除
Route::post('/destroy/{id}', [App\Http\Controllers\SharesController::class, 'destroy'])->name('shares.destroy');

// マイページを表示
Route::get('/mypages', [App\Http\Controllers\MypagesController::class, 'index'])->name('mypages');

// ユーザー情報編集ページを表示
Route::get('/mypages/edit', [App\Http\Controllers\MypagesController::class, 'edit'])->name('mypages.edit');

// ユーザー情報の更新(メールアドレス)
Route::post('/mypages/email/update', [App\Http\Controllers\MypagesController::class, 'update'])->name('email.update');

// ユーザー情報の更新(パスワード)
Route::post('/mypages/password/update', [App\Http\Controllers\MypagesController::class, 'update'])->name('password.update');

// 過去の投稿を表示
Route::get('/mypages/post', [App\Http\Controllers\MypagesController::class, 'post'])->name('mypages.post');

// 投稿にコメントするページ
Route::get('/comments/{id}', [App\Http\Controllers\CommentsController::class, 'index'])->name('comments');

// コメント機能
Route::post('/comments/post', [App\Http\Controllers\CommentsController::class, 'store'])->name('comments.post');

// コメントした投稿を表示
Route::get('/mypages/comment', [App\Http\Controllers\MypagesController::class, 'comment'])->name('mypages.comment');

<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PartyController;
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
| index(一覧表示)
| create(新規作成画面) 
| store(新規保存)
| show(詳細表示)
| edit(編集画面)
| update(上書き保存)
| destroy(削除)
*/

/**
 * アクション 画面の有無 内容
 * index 画面あり 一覧表示画面
 * create 画面あり 新規入力フォーム
 * store 画面なし 追加処理(createの登録ボタン)
 * show 画面あり 詳細表示
 * edit 画面あり 変更フォーム(既存の値が入っている状態)
 * update 画面なし 変更処理(editの更新ボタン)
 * destroy 画面なし 削除処理(showの削除ボタン)
 */

// test account: foobar@gmail.com / passoword

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function() {
    Route::get('/dashboard', [PartyController::class, 'index'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/show', [PartyController::class, 'show'])->name('show');
    Route::get('/edit', [PartyController::class, 'edit'])->name('edit');
    Route::put('/edit/{pokemonId}', [PartyController::class, 'update'])->name('edit.update')->where(['pokemonId' => '[0-9]+']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

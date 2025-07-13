<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\DiagnosisController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HomeController;
use App\Models\Item;
use App\Models\Diagnosis;

Route::get('/', [HomeController::class, 'index'])->name('home');

// おすすめアイテムの結果表示
Route::get('/items/{item}', [ItemController::class, 'show'])->whereNumber('item')->name('items.show');

// おすすめアイテムの詳細(結果表示)ページをランダムに表示
Route::get('/items/random', [ItemController::class, 'random'])->name('items.random');

// おすすめアイテム一覧表示
Route::get('/items', [ItemController::class, 'index'])->name('items.index');

// 診断用質問①②③表示
Route::get('/diagnosis/question1', [DiagnosisController::class, 'showQuestion1'])->name('diagnosis.question1');
Route::get('/diagnosis/question2', [DiagnosisController::class, 'showQuestion2'])->name('diagnosis.question2');
Route::get('/diagnosis/question3', [DiagnosisController::class, 'showQuestion3'])->name('diagnosis.question3');

// 診断用回答処理 → 次の質問へ
Route::post('/diagnosis/question1', [DiagnosisController::class, 'processQuestion1'])->name('diagnosis.process1');
Route::post('/diagnosis/question2', [DiagnosisController::class, 'processQuestion2'])->name('diagnosis.process2');
// 診断用回答処理 → 診断結果へ
Route::post('/diagnosis/question3', [DiagnosisController::class, 'processQuestion3'])->name('diagnosis.process3');

// お気に入り一覧表示
Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');

Route::group(['prefix' => 'items/{item}'], function() {
    // お気に入り登録処理
    Route::post('favorite', [FavoriteController::class, 'store'])->name('items.favorite');
    // お気に入り削除
    Route::delete('unfavorite', [FavoriteController::class, 'destroy'])->name('items.unfavorite');
});

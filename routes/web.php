<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Landscape;
use App\Models\Item;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\FavoriteController;

// トップページ
Route::get('/', function () {
    $landscapes = Landscape::inRandomOrder()->take(2)->get();
    return view('welcome', ['landscapes' => $landscapes]);
});

// アイテム一覧ページ
Route::get('/items', [ItemController::class, 'index'])->name('items.index');

// ランダムおすすめ表示（詳細ページへリダイレクト）
Route::get('/items/random', function () {
    $randomItem = Item::inRandomOrder()->first();
    if ($randomItem) {
        return redirect()->route('items.show', ['item' => $randomItem->id]);
    }
    return redirect('/');
})->name('items.random');

// アイテム詳細ページ
Route::get('/items/{item}', [ItemController::class, 'show'])->name('items.show');

// ダッシュボード（Breezeデフォルト）
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ログインユーザーのみがアクセスできるルート
Route::middleware('auth')->group(function () {
    // プロフィール関連（Breezeデフォルト）
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // お気に入り関連
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
    Route::post('/items/{item}/favorite', [FavoriteController::class, 'store'])->name('items.favorite');
    Route::delete('/items/{item}/unfavorite', [FavoriteController::class, 'destroy'])->name('items.unfavorite');
});

// 認証関連ルート（Breezeデフォルト）
require __DIR__.'/auth.php';
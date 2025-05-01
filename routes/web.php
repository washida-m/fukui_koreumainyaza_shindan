<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Models\Item;

Route::get('/', function () {
    return view('welcome');
});

// おすすめアイテムの結果表示ページ
Route::get('/items/{item}', [ItemController::class, 'show'])->whereNumber('item')->name('items.show');

// おすすめアイテムの詳細(結果表示)ページをランダムに表示
Route::get('/items/random', function () {

    // itemsテーブルからランダムに1件取得(データがない場合はnull)
    $randomItem = Item::inRandomOrder()->first();

    if ($randomItem) {
        // 見つかったらアイテムの詳細(結果表示)ページへリダイレクト
        return redirect()->route('items.show', $randomItem);
    } else {
        // アイテムが1件も登録されていない場合は、TOPページへリダイレクト
        return redirect('/')->with('message', 'まだオススメアイテムが登録されていません。');
    }
    
})->name('items.random');

// 診断用質問表示ページ
Route::get('/diagnosis', [DiagnosisController::class, 'show'])->name('diagnosis.show');
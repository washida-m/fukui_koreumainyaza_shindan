<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\DiagnosisController;
use App\Models\Item;
use App\Models\Diagnosis;

Route::get('/', function () {
    return view('welcome');
});

// おすすめアイテムの結果表示
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

// ------- 診断 ---------
// 質問①②③表示
Route::get('/diagnosis/question1', [DiagnosisController::class, 'showQuestion1'])->name('diagnosis.question1');
Route::get('/diagnosis/question2', [DiagnosisController::class, 'showQuestion2'])->name('diagnosis.question2');
Route::get('/diagnosis/question3', [DiagnosisController::class, 'showQuestion3'])->name('diagnosis.question3');

// 回答処理 → 次の質問へ
Route::post('/diagnosis/question1', [DiagnosisController::class, 'processQuestion1'])->name('diagnosis.process1');
Route::post('/diagnosis/question2', [DiagnosisController::class, 'processQuestion2'])->name('diagnosis.process2');
// 回答処理 → 診断結果へ
Route::post('/diagnosis/question3', [DiagnosisController::class, 'processQuestion3'])->name('diagnosis.process3');
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Favorite;

class ItemController extends Controller
{
    public function show($item) {
        // 指定されたitemの値でアイテムを検索して取得、見つからなければ404エラーを表示
        $item = Item::findOrFail($item);

        // 指定されたitemの値でお気に入りを検索して取得
        $isFavorited = Favorite::where('item_id', $item->id)->exists();

        // 取得したアイテムをビューで表示
        return view('items.show', [
            'item' => $item,
            'isFavorited' => $isFavorited,
        ]);
    }

    public function random() {
        $randomItem = Item::inRandomOrder()->first();

        if ($randomItem) {
            // 見つかったらアイテムの詳細(結果表示)ページへリダイレクト
            return redirect()->route('items.show', $randomItem);
        } else {
            // アイテムが1件も登録されていない場合は、TOPページへリダイレクト
            return redirect('/')->with('message', 'まだオススメアイテムが登録されていません。');
        }
    }
}

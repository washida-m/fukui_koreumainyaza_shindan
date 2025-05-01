<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function show($item) {
        // 指定されたitemの値でアイテムを検索して取得、見つからなければ404エラーを表示
        $item = Item::findOrFail($item);

        // 取得したアイテムをビューで表示
        return view('items.show', [
            'item' => $item,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Item;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class FavoriteController extends Controller
{
    /**
     * お気に入りに登録
     */
    public function store(Request $request, Item $item): RedirectResponse
    {
        // 重複チェック（同じitem_idがfavoritesテーブルに存在しないか）
        $exists = Favorite::where('item_id', $item->id)->exists();

        // 重複している場合は、お気に入り一覧ページへリダイレクト
        if ($exists) {
            return redirect()->route('favorites.index')->with('error', 'このアイテムは既にお気に入りに追加されています。');
        }

        // お気に入りに追加
        Favorite::create([
            'item_id' => $item->id,
        ]);

        // アイテム詳細ページにリダイレクト
        return back()->with('status', $item->name . 'をお気に入りに追加しました！');
    }

    /**
      * お気に入りから削除
      */
    public function destroy(Item $item): RedirectResponse
    {
        // お気に入りに登録されているか
        Favorite::where('item_id', $item->id)->delete();

        // アイテム詳細ページにリダイレクト
        return back()->with('status', $item->name . 'をお気に入りから削除しました！');

    }

    /**
     * お気に入り一覧を表示
     */

     public function index(): View
     {
        $favorites = Favorite::with('item')->latest()->get();

        return view('favorites.index', [
            'favorites' => $favorites
        ]);

     }
}
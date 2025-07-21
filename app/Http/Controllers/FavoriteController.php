<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class FavoriteController extends Controller
{
    /**
     * お気に入りに登録
     */
    public function store(Item $item): RedirectResponse
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        
        if (!$user->favorites()->where('item_id', $item->id)->exists()) {
            $user->favorites()->attach($item->id);
        }

        return back()->with('status', $item->name . 'をお気に入りに追加しました！');
    }

    /**
      * お気に入りから削除
      */
    public function destroy(Item $item): RedirectResponse
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        
        if ($user->favorites()->where('item_id', $item->id)->exists()) {
            $user->favorites()->detach($item->id);
        }

        return back()->with('status', $item->name . 'をお気に入りから削除しました！');
    }

    /**
     * お気に入り一覧を表示
     */
     public function index(Request $request): View
     {
        // ログインユーザーのIDに紐づく「Favorite」モデルを取得する
        $query = Favorite::where('user_id', Auth::id())->with('item');

        // もしURLにカテゴリの指定があれば、絞り込む
        if ($request->has('category')) {
            $query->whereHas('item', function ($q) use ($request) {
                $q->where('category', $request->category);
            });
        }
        
        $favorites = $query->latest()->get();

        return view('favorites.index', [
            'favorites' => $favorites
        ]);
     }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $query = Item::query();

        // カテゴリで絞り込み
        if ($request->has('category')) {
            $query->where('category', $request->category);
        }

        $items = $query->latest()->paginate(12);

        return view('items.index', [
            'items' => $items,
        ]);
    }

    public function show(Item $item)
    {
        $isFavorited = false;
        // ログインチェック
        if (Auth::check()) {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $isFavorited = $user->favorites()->where('item_id', $item->id)->exists();
    }

        // 楽天API
        $rakutenProducts = [];
        if ($item->rakuten_keyword && config('services.rakuten.app_id')){
            $response = Http::get('https://app.rakuten.co.jp/services/api/IchibaItem/Search/20220601', [
                'applicationId' => config('services.rakuten.app_id'),
                'affiliateId' => config('services.rakuten.affiliate_id'),
                'keyword' => $item->rakuten_keyword,
                'format' => 'json',
                'hits' => 4,
                'sort' => '-reviewAverage',
                'furusatoNouzeiFlag' => 0,
            ]);
            if ($response->successful() && isset($response->json()['Items'])) {
                $rakutenProducts = $response->json()['Items'];
            }
        }

        return view('items.show', [
            'item' => $item,
            'isFavorited' => $isFavorited,
            'rakutenProducts' => $rakutenProducts,
        ]);
    }
}

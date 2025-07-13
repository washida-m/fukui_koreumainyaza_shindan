<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Favorite;
use Illuminate\Support\Facades\Http;

class ItemController extends Controller
{
    public function index()
    {
        // アイテムを12件ずつページ送りで取得
        $items = Item::latest()->paginate(12);

        // items.indexにデータを渡して表示
        return view('items.index', [
            'items' => $items,
        ]);
    }

    public function show(Item $item) {

        // 指定されたitemの値でお気に入りを検索して取得
        $isFavorited = Favorite::where('item_id', $item->id)->exists();

        // 楽天APIの処理,楽天の商品情報を格納する配列を初期化
        $rakutenProducts = [];

        // アイテムに楽天キーワードがある、かつ楽天アプリIDが設定されていればAPIを呼び出す
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

            // APIリクエストが成功し、Itemsキーが存在するか確認
            if ($response->successful() && isset($response->json()['Items'])) {
                // レスポンスに含まれている商品リストを格納
                $rakutenProducts = $response->json()['Items'];
            }
        }

        // 取得したアイテムをビューに渡す
        return view('items.show', [
            'item' => $item,
            'isFavorited' => $isFavorited,
            'rakutenProducts' => $rakutenProducts,
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

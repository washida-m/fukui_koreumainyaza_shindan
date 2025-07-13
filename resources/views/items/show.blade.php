@extends('layouts.app')

{{-- titleセクションに値を設定 --}}
@section('title', $item->name . ' - おすすめ結果')

{{-- メインコンテンツ --}}
@section('content')

    <h2 class="text-4xl font-bold text-center my-8">あなたへのオススメ</h2>

    <div class="flex flex-col md:flex-row max-w-6xl mx-auto gap-8 px-4">

        {{-- 左カラム：アイテム詳細 --}}
        <div class="w-full md:w-5/6">
            <div class="flex flex-col items-center">
                {{-- 画像を表示 --}}
                <div class="mb-6 w-full max-w-md">
                    @if ($item->image_path)
                        <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->name }}" class="rounded-xl mx-auto block">
                    @else
                        <img src="https://placehold.jp/500x300.png?text=No+Image" alt="画像なし" class="rounded-xl border-gray-300 mx-auto block">
                    @endif
                </div>
                {{-- カテゴリ名を表示 --}}
                <div class="mb-2">
                    <span class="badge badge-lg badge-outline">{{ $item->category }}</span>
                </div>
                {{-- アイテム名を表示 --}}
                <h3 class="text-3xl font-bold text-center mt-1 mb-4">
                    {{ $item->name }}
                </h3>
                {{-- 説明文を表示 --}}
                <p class="mt-4 text-base text-gray-700 text-left w-full">
                    {!! nl2br(e($item->description))!!}
                </p>
                {{-- お気に入り追加/削除ボタンを表示 --}}
                <div class="mt-8 text-center">
                    @include('favorites.favorite_button', [
                        'item' => $item,
                        'isFavorited' => $isFavorited
                    ])
                </div>
            </div>
        </div>

        {{-- 右カラム：API連携（楽天）表示 --}}
        <div class="w-full md:w-1/6">
            @if (!empty($rakutenProducts))
                <div class="pt-8 md:pt-0 w-full">
                    <h4 class="text-2xl font-semibold mb-6 text-center">楽天でチェック</h4>
                    <div class="grid grid-cols-1 gap-4">
                        @foreach ($rakutenProducts as $r_ItemData)
                            @php
                                $r_Item = $r_ItemData['Item']; // 楽天APIのレスポンスは'Item'キーにアイテム情報が格納
                            @endphp
                            <div class="card bg-base-100 flex flex-col h-full">
                                {{-- 左：商品画像表示 --}}
                                <figure class="h-48 bg-white p-2 flex items-center justify-center rounded-t-lg">
                                    @if (!empty($r_Item['mediumImageUrls'][0]['imageUrl']))
                                        <img src="{{ $r_Item['mediumImageUrls'][0]['imageUrl'] }}" alt="画像なし" class="h-full w-auto object-contain">
                                    @else
                                        <img src="https://placehold.jp/200x200.png?text=No+Image" alt="画像なし" class="h-24 w-auto object-contain">
                                    @endif
                                </figure>
                                {{-- 右：商品名、金額表示 --}}
                                <div class="card-body p-4 flex-grow flex flex-col justify-between">
                                    <h5 class="text-sm font-semibold leading-tight mb-1">
                                        <a href="{{ $r_Item['itemUrl'] }}" target="_blank" rel="noopener noreferrer" class="link link-hover text-info">
                                            {{ Str::limit($r_Item['itemName'], 50) }}
                                        </a>
                                    </h5>
                                    <p class="text-gray-800 text-lg mt-1">
                                        {{ number_format($r_Item['itemPrice']) }}円
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="text-center mt-8 mb-4">
                        <!-- Rakuten Web Services Attribution Snippet FROM HERE -->
                        <a href="https://developers.rakuten.com/" target="_blank">Supported by Rakuten Developers</a>
                        <!-- Rakuten Web Services Attribution Snippet TO HERE -->
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="text-center mt-8">
        <a href="/" class="link link-hover text-info text-lg underline">TOPページに戻る</a>
    </div>
@endsection 
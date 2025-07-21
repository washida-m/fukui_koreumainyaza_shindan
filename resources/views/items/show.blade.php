@extends('layouts.app')

{{-- titleセクションに値を設定 --}}
@section('title', $item->name . ' - おすすめ結果')

{{-- メインコンテンツ --}}
@section('content')

    <div class="flex flex-col md:flex-row md:items-baseline max-w-7xl mx-auto gap-8 px-4 mb-16">

        {{-- 左カラム：アイテム詳細 --}}
        <div class="w-full md:w-3/4">
            <h2 class="text-5xl font-bold text-center my-16">あなたへのオススメ</h2>

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
                <p class="mt-4 text-base text-gray-700 text-center w-full max-w-xl mx-auto">
                    {!! nl2br(e($item->description))!!}
                </p>
                {{-- お気に入り追加/削除ボタンを表示 --}}
                <div class="mt-8 text-center">
                    @auth
                        @include('favorites.favorite_button', [
                            'item' => $item,
                            'isFavorited' => $isFavorited
                        ])
                    @endauth

                    @guest
                        <p class="text-gray-500">※ お気に入り機能を利用するには、<a href="{{ route('login') }}" class="link link-info">ログイン</a>しての〜</p>
                    @endguest
                </div>

                @if ($item->map_query)
                <div class="mt-16 w-full max-w-xl mx-auto">
                    <h4 class="text-xl font-semibold mb-4 text-center">食べれるお店の場所</h4>
                    <div class="h-96 rounded-lg overflow-hidden shadow-lg">
                        <iframe
                            width="100%"
                            height="100%"
                            style="border:0"
                            loading="lazy"
                            allowfullscreen
                            referrerpolicy="no-referrer-when-downgrade"
                            src="https://www.google.com/maps/embed/v1/place?key={{ config('services.google-maps.key') }}&q={{ urlencode($item->map_query) }}">
                        </iframe>
                    </div>
                </div>
                @endif
            </div>

            <div class="text-center mt-16">
                <a href="/" class="link link-hover text-info text-lg underline">TOPページに戻る</a>
            </div>
        </div>

        {{-- 右カラム：API連携（楽天）表示 --}}
        <div class="w-full md:w-1/5">
            @if (!empty($rakutenProducts))
                <div class="pt-8 md:pt-0 w-full">
                    <h4 class="text-2xl font-semibold mb-6 text-center">楽天でチェック</h4>
                    <div class="grid grid-cols-1 gap-4">
                        @foreach ($rakutenProducts as $r_ItemData)
                            @php
                                $r_Item = $r_ItemData['Item'];
                            @endphp
                            <div class="card bg-base-100 flex flex-col h-full shadow rakuten-card">
                                <figure class="h-48 bg-white p-2 flex items-center justify-center rounded-t-lg">
                                    @if (!empty($r_Item['mediumImageUrls'][0]['imageUrl']))
                                        <img src="{{ $r_Item['mediumImageUrls'][0]['imageUrl'] }}" alt="画像なし" class="h-full w-auto object-contain">
                                    @else
                                        <img src="https://placehold.jp/200x200.png?text=No+Image" alt="画像なし" class="h-24 w-auto object-contain">
                                    @endif
                                </figure>
                                <div class="card-body p-4 flex-grow flex flex-col justify-between">
                                    <h5 class="text-sm font-semibold leading-tight mb-1">
                                        <a href="{{ $r_Item['itemUrl'] }}" target="_blank" rel="noopener noreferrer" class="link link-hover text-info">
                                            {{ Str::limit($r_Item['itemName'], 50) }}
                                        </a>
                                    </h5>
                                    <p class="text-gray-800 text-lg mt-1 text-center">
                                        {{ number_format($r_Item['itemPrice']) }}円
                                    </p>
                                    <div class="card-actions justify-center mt-2">
                                        <button class="btn btn-sm bg-blue-500 hover:bg-blue-600 text-white shadow-md share-btn" 
                                            data-url="{{ $r_Item['itemUrl'] }}" 
                                            data-name="{{ $r_Item['itemName'] }}">共有</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="text-center mt-8 mb-4">
                        <a href="https://developers.rakuten.com/" target="_blank">Supported by Rakuten Developers</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
    
    {{-- モーダル --}}
    <dialog id="share_modal_desktop" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">この商品をシェアする</h3>
            <p class="py-4 text-sm" id="share-item-name-desktop"></p>
            
            <div class="flex justify-center items-center py-4 space-x-4">
                {{-- Slack共有ボタン(まだ接続うまくできない....泣) --}}
                <a href="#" id="slack-share-link-desktop" target="_blank" class="btn">Slackで共有</a>
                {{-- LINE共有ボタン --}}
                <a href="#" id="line-share-link-desktop" target="_blank" class="btn">LINEで共有</a>
                {{-- コピーボタン --}}
                <button id="copy-share-link-desktop" class="btn">リンクをコピー</button>
            </div>

            <div class="modal-action">
                <form method="dialog">
                    <button class="btn">閉じる</button>
                </form>
            </div>
        </div>
    </dialog>
@endsection
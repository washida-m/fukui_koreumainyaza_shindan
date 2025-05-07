@extends('layouts.app')

{{-- titleセクションに値を設定 --}}
@section('title', $item->name . ' - おすすめ結果')

{{-- メインコンテンツ --}}
@section('content')

    <h2 class="text-6xl font-bold text-center my-10">あなたへのオススメ</h2>

    <div class="flex flex-col items-center max-w-xl mx-auto p-4">
        {{-- 画像を表示 --}}
        <div class="mb-4 w-full max-w-md">

            @if ($item->image_path)
                <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->name }}" class="rounded-xl mx-auto block">
            @else
                {{-- 取得できない場合は、代替ダミー画像を表示 --}}
                <img src="https://placehold.jp/500x300.png?text=No+Image" alt="画像なし" class="rounded-xl border-gray-300 mx-auto block">
            @endif
        </div>
        {{-- カテゴリ名を表示 --}}
        <div class="mt-2 mb-1">
            <span class="badge badge-lg badge-outline">{{ $item->category }}</span>
        </div>
        {{-- アイテム名を表示 --}}
        <h3 class="text-2xl font-bold text-center mt-1 mb-3">
            {{ $item->name }}
        </h3>
        {{-- 説明文を表示 --}}
        <p class="mt-3 text-base text-gray-700 dark:text-gray-300 text-left w-full">
            {!! nl2br(e($item->description))!!}
        </p>
        {{-- お気に入り追加/削除ボタンを表示 --}}
        <div class="mt-5 text-center"> 
            @include('favorites.favorite_button', [
                'item' => $item,
                'isFavorited' => $isFavorited
            ])
        </div>
        {{-- API連携（楽天）表示 --}}
        {{-- <div class="mt-6 w-full"> ... </div> --}}
    </div>

    <div class="text-center mt-8">
        <a href="/" class="link link-hover text-info text-lg underline">TOPページに戻る</a>
    </div>
    
    {{-- <div class="text-center mt-8 space-x-4">
        <a href="/" class="btn">TOPページに戻る</a>
    </div> --}}

@endsection 
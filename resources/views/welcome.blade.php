@extends('layouts.app')

{{-- titleセクションに値を設定 --}}
@section('title', '福井これうまいんやざ〜！診断')

{{-- メインコンテンツ --}}
@section('content')

    <div class="mt-12 mb-8 px-4"> 
        <h2 class="text-6xl font-bold text-center my-4">福井これうまいんやざ〜！</br>診断</h2>
        <p class="text-2xl text-gray-500 text-center my-10">〜あなたにぴったりの福井の魅力、見つけよっさ！〜</p>

        @if ($landscapes->count() >= 2)
            {{-- 2件取得できた場合 --}}
            <div class="flex flex-col md:flex-row justify-center items-start gap-1 max-w-4xl mx-auto">
                {{-- 画像1、説明を表示 --}}
                <div class="w-full md:w-1/2 p-2">
                    <img src="{{ asset('storage/' . $landscapes[0]->file_path) }}" alt="福井の風景1"
                    class="rounded-lg max-w-sm mx-auto block h-auto object-cover aspect-[4/3]">
                    <p class="text-center text-sm text-gray-600">{!! nl2br(e($landscapes[0]->description ?? '')) !!}</p>
                </div>
                {{-- 画像2、説明を表示 --}}
                <div class="w-full md:w-1/2 p-2">
                    <img src="{{ asset('storage/' . $landscapes[1]->file_path) }}" alt="福井の風景2"
                    class="rounded-lg max-w-sm mx-auto block h-auto object-cover aspect-[4/3]">
                    <p class="text-center text-sm text-gray-600">{!! nl2br(e($landscapes[1]->description ?? '')) !!}</p>
                </div>
            </div>

        @else
        {{-- 1件もしくは0件だった場合の表示 --}}
        <p class="text-center text-gray-500">表示できる風景画像がありません。</p>
        @endif

        <p class="text-2xl text-gray-900 text-center my-10">いくつかの質問に答えたり、ボタンを押すだけで、</br>福井のお土産やグルメの中から、あなたへのおすすめが</br>表示されます！気軽に試してみての〜！</p>
    
        {{-- ランダム表示用ボタンを表示 --}}
        <div class="text-center mt-8 space-x-4">
            <a href="{{ route('items.random') }}" class="btn btn-secondary btn-lg w-72 py-9 text-2xl">今日のオススメは？</a> 
        </div>

        {{-- 診断用ボタンを表示 --}}
        <div class="text-center mt-8 space-x-4">
            <a href="{{ route('diagnosis.question1') }}" class="btn btn-primary btn-lg w-72 py-9 text-2xl">診断スタート！</a> 
        </div>

    </div>

@endsection 
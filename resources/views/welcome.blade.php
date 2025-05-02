@extends('layouts.app')

{{-- titleセクションに値を設定 --}}
@section('title', '福井これうまいんやざ〜！診断')

{{-- メインコンテンツ --}}
@section('content')

    <div class="mt-12 mb-8 px-4"> 
        <h2 class="text-6xl font-bold text-center my-4">福井これうまいんやざ〜！</br>診断</h2>
        <p class="text-2xl text-gray-500 text-center my-10">〜あなたにぴったりの福井の魅力、見つけよっさ！〜</p>

        <div class="flex flex-col md:flex-row justify-center items-start gap-1 max-w-4xl mx-auto">
            {{-- 画像1を表示 --}}
            <div class="w-full md:w-1/2">
                <img src="{{ asset('storage/images/fukui_landscape_1.jpg') }}" alt="福井の風景1"
                     class="rounded-lg max-w-sm mx-auto block h-auto object-cover aspect-[4/3]">
            </div>

            {{-- 画像2を表示 --}}
            <div class="w-full md:w-1/2">
                <img src="{{ asset('storage/images/fukui_landscape_2.jpg') }}" alt="福井の風景2"
                     class="rounded-lg max-w-sm mx-auto block h-auto object-cover aspect-[4/3]">
            </div>
        </div>

        <p class="text-2xl text-gray-900 text-center my-10">いくつかの質問に答えたり、ボタンを押すだけで、</br>福井のお土産やグルメの中から、あなたへのおすすめが</br>表示されるんやざ！気軽に試してみての〜！</p>
    
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
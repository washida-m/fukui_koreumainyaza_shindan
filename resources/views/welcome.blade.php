@extends('layouts.app')

@section('title', '福井これうまいんやざ〜！診断')

@section('content')
    <div class="text-center my-10 px-4">
        <h2 class="text-5xl font-bold">福井これうまいんやざ〜！診断</h2>
        <p class="text-xl text-gray-500 mt-4">〜あなたにぴったりの福井の魅力、見つけよっさ！〜</p>

        {{-- 風景画像の表示 --}}
        <div class="mt-12 mb-8">
            @if (isset($landscapes) && $landscapes->count() >= 2)
                <div class="flex flex-col md:flex-row justify-center items-start gap-4 max-w-4xl mx-auto">
                    <div class="w-full md:w-1/2">
                        <img src="{{ asset('storage/' . $landscapes[0]->file_path) }}" alt="福井の風景1"
                        class="rounded-lg w-full h-64 object-cover">
                        <p class="text-center text-sm text-gray-600 mt-2">{!! nl2br(e($landscapes[0]->description ?? '')) !!}</p>
                    </div>
                    <div class="w-full md:w-1/2">
                        <img src="{{ asset('storage/' . $landscapes[1]->file_path) }}" alt="福井の風景2"
                        class="rounded-lg w-full h-64 object-cover">
                        <p class="text-center text-sm text-gray-600 mt-2">{!! nl2br(e($landscapes[1]->description ?? '')) !!}</p>
                    </div>
                </div>
            @else
                <p class="text-center text-gray-500">表示できる風景画像がありません。</p>
            @endif
        </div>

        <p class="text-lg text-gray-900 my-10">
            ボタンを押すだけで、福井のお土産やグルメの中から、<br>
            あなたへのおすすめが表示されます！気軽に試してみての〜
        </p>
    
        {{-- ボタンエリア --}}
        <div class="flex flex-col md:flex-row justify-center items-start gap-8 mt-8">
            {{-- ランダム表示用ボタン --}}
            <div class="text-center">
                <a href="{{ route('items.random') }}" class="btn btn-secondary btn-lg py-6 w-64 text-xl">今日のオススメは？</a> 
                <p class="text-sm text-gray-600 mt-2">ランダムにおすすめを表示</p>
            </div>

            {{-- 診断機能は今後の実装のためコメントアウト --}}
            {{--
            <div class="text-center">
                <a href="#" class="btn btn-primary btn-lg py-6 w-64 text-xl">診断スタート！</a> 
                <p class="text-sm text-gray-600 mt-2">質問に答えてオススメを見つける</p>
            </div>
            --}}
        </div>
    </div>
@endsection
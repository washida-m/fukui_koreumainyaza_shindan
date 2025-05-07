@extends('layouts.app')

{{-- titleセクションに値を設定 --}}
@section('title', 'おすすめ診断 - 福井これうまいんやざ〜！診断')

{{-- メインコンテンツ --}}
@section('content')

    <h2 class="text-6xl font-bold text-center mt-12 mb-8 px-4">福井これうまいんやざ〜！</br>診断</h2>

    {{-- 診断フォーム --}}
    <form method="POST" action="{{$formAction}}" class="max-w-lg mx-auto">
        @csrf

        {{-- 質問ブロック --}}
        <div class="mb-2 p-10 border border-gray-300 rounded-lg min-h-96">
            {{-- 質問内容 --}}
            <p class="mb-16 text-center font-semibold text-2xl">{!! $questionText !!}</p>

            {{-- 選択肢 --}}
            <div class="space-y-5  w-full max-w-xs mx-auto">
                @foreach ($options as $value => $label)
                    <label class="flex items-center p-3 hover:bg-base-200 cursor-pointer">
                        {{-- name属性は $inputRadioName、value属性は $value を使用 --}}
                        <input type="radio" name="{{ $inputRadioName }}" value="{{ $value }}" required class="radio radio-primary mr-3">
                        {{-- 表示テキストは $label を使用 --}}
                        <span class="flex-1">{{ $label }}</span>
                    </label>
                @endforeach
            </div>
        </div>
        {{-- 送信ボタン --}}
        <div class="text-right mt-0">
            <button type="submit" class="btn btn-primary">
                {{-- ボタンのテキストを質問番号で変える --}}
                @if ($questionNumber < 3)
                    次の質問へ >>
                @else
                    結果を見る！
                @endif
            </button>
        </div>
    </form> 

    <div class="text-center mt-8">
        <a href="/" class="link link-hover text-info text-lg underline">TOPページに戻る</a>
    </div>

@endsection 
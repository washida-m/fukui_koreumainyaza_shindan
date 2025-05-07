@extends('layouts.app')

@section('title', 'お気に入り一覧 - 福井これうまいんやざ〜！診断')

@section('content')
    <h2 class="text-3xl font-bold text-center my-8">お気に入り一覧</h2>

    <div class="overflow-x-auto max-w-2xl mx-auto">
        <table class="table w-full">
            <thead class="bg-base-200">
                <tr>
                    <th class="w-1/4">カテゴリ</th>
                    <th class="w-1/2">アイテム名</th>
                    <th class="w-1/4">操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($favorites as $favorite)
                    @if ($favorite->item)
                        <tr class="hover">
                            <td>
                                <span class="badge badge-ghost badge-sm">{{ $favorite->item->category }}</span>
                            </td>
                            <td>
                                <a href="{{ route('items.show', $favorite->item->id) }}" class="link link-hover  text-lg">
                                    {{ $favorite->item->name }}
                                </a>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('items.unfavorite', $favorite->item) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-error btn-xs normal-case"
                                        onclick="return confirm('「{{ $favorite->item->name }}」をお気に入りから削除します。よろしいですか？')">
                                        削除
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>

        <div class="text-center mt-8">
            <a href="/" class="link link-hover text-info text-lg underline">TOPページに戻る</a>
        </div>

    </div>
@endsection
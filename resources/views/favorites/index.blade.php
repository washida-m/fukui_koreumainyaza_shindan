@extends('layouts.app')

@section('title', 'お気に入り一覧')

@section('content')
    <h2 class="text-3xl font-bold text-center my-8">お気に入り一覧</h2>

    {{-- 絞り込みボタン --}}
    <div class="text-center mb-8 space-x-2">
        <a href="{{ route('favorites.index') }}" class="btn {{ !request('category') ? 'btn-primary' : 'btn-ghost' }}">すべて</a>
        <a href="{{ route('favorites.index', ['category' => '土産']) }}" class="btn {{ request('category') == '土産' ? 'btn-primary' : 'btn-ghost' }}">土産</a>
        <a href="{{ route('favorites.index', ['category' => 'グルメ']) }}" class="btn {{ request('category') == 'グルメ' ? 'btn-primary' : 'btn-ghost' }}">グルメ</a>
    </div>

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
                {{-- お気に入りがない場合の表示 --}}
                @forelse ($favorites as $favorite)
                    @if ($favorite->item)
                        <tr class="hover">
                            <td>
                                <span @class([
                                    'badge', 'badge-sm', 'text-white',
                                    'badge-info' => $favorite->item->category == '土産',
                                    'badge-error' => $favorite->item->category == 'グルメ',
                                ])>{{ $favorite->item->category }}</span>
                            </td>
                            <td>
                                <a href="{{ route('items.show', $favorite->item->id) }}" class="link link-hover  text-lg">
                                    {{ $favorite->item->name }}
                                </a>
                            </td>
                            <td>
                                {{-- 削除 --}}
                                <form method="POST" action="{{ route('items.unfavorite', $favorite->item->id) }}">
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
                @empty
                    <tr>
                        <td colspan="3" class="text-center p-8">
                            <p class="text-gray-500">お気に入り登録されたアイテムはまだありません。</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="text-center mt-8">
            <a href="/" class="link link-hover text-info text-lg underline">TOPページに戻る</a>
        </div>
    </div>
@endsection
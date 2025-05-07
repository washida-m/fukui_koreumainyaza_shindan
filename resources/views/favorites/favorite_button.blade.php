@if ($isFavorited)
    {{-- お気に入り削除ボタンのフォーム --}}
    <form method="POST" action="{{ route('items.unfavorite', $item->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-error btn-sm normal-case" 
            onclick="return confirm('{{ $item->name }} をお気に入りから削除します。よろしいですか？')">お気に入りから削除</button>
    </form>
@else
{{-- お気に入り追加ボタンのフォーム --}}
    <form method="POST" action="{{ route('items.favorite', $item->id) }}">
        @csrf
        <button type="submit" class="btn btn-success">お気に入りに追加</button>
    </form>
@endif
@extends('layouts.app')

@section('title', 'アイテム一覧')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-3xl font-bold text-center mb-8">オススメアイテム一覧</h2>

        @if($items->count())
            {{-- アイテム一覧を表示 --}}
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($items as $item)
                    <a href="{{ route('items.show', $item->id) }}" class="card bg-base-100 shadow-xl hover:shadow-2xl transition-shadow duration-300">
                        <figure class="h-40 bg-white">
                            @if ($item->image_path)
                                <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->name }}" class="h-full w-full object-cover">
                            @else
                                <img src="https://placehold.jp/300x200.png?text=No+Image" alt="画像なし" class="h-full w-full object-cover">
                            @endif
                        </figure>
                        <div class="card-body p-4">
                            <span class="badge badge-outline text-xs">{{ $item->category }}</span>
                            <h3 class="card-title text-base mt-2">{{ $item->name }}</h3>
                        </div>
                    </a>
                @endforeach
            </div>

            {{-- ページネーションリンク --}}
            <div class="mt-8">
                {{ $items->links() }}
            </div>
        @else
            <p class="text-center text-gray-500">登録されているアイテムがありません。</p>
        @endif
    </div>
@endsection
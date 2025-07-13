<header class="mb-4">
    <nav class="navbar bg-base-300 text-neutral-content">
        {{-- トップページへのリンク --}}
        <div class="flex-1">
            {{-- <h1>
                <a class="normal-case font-bold text-neutral-content hover:opacity-75 inline-flex flex-col items-center" href="/">
                    <span>福井これうまいんやざ〜！</span>
                    <span>診断</span>
                </a>
            </h1> --}}
            <h1>
                <a class="normal-case text-xl font-bold text-base-content hover:opacity-75 items-center" href="/">TOP</a>
            </h1>
        </div>

        {{-- お気に入り一覧へのリンク --}}
        <div class="flex-none">
            <ul class="menu menu-horizontal px-1 text-base-content underline">
                <li><a href="{{ route('items.index') }}">アイテム一覧</a></li>
                <li><a href="{{ route('favorites.index') }}">お気に入り一覧</a></li> 
            </ul>
        </div>
    </nav>
</header>
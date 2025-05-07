<header class="mb-4">
    <nav class="navbar bg-neutral text-neutral-content">
        {{-- トップページへのリンク --}}
        <div class="flex-1">
            <h1>
                <a class="normal-case text-xl font-bold text-neutral-content hover:opacity-75 inline-flex flex-col items-center" href="/">
                    <span>福井これうまいんやざ〜！</span>
                    <span>診断</span>
                </a>
            </h1>
        </div>

        {{-- お気に入り一覧へのリンク --}}
        <div class="flex-none">
            <ul class="menu menu-horizontal px-1">
                <li><a href="{{ route('favorites.index') }}">お気に入り一覧</a></li> 
            </ul>
        </div>
    </nav>
</header>
<nav class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="/" class="font-bold text-gray-800">
                    福井これうまいんやざ〜！診断
                </a>
                <div class="hidden sm:flex sm:space-x-8 sm:ms-10">
                    <a href="{{ route('items.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:border-gray-300 focus:outline-none focus:border-gray-300 transition">
                        アイテム一覧
                    </a>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                    {{-- ログインしている場合 --}}
                    <a href="{{ route('favorites.index') }}" class="text-sm text-gray-700 underline mr-4">お気に入り</a>

                    <span class="text-sm text-gray-800 mr-4">{{ Auth::user()?->name }} さん</span>
                    
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                                class="text-sm text-gray-700 underline">
                            ログアウト
                        </a>
                    </form>
                @else
                    {{-- ログインしていない場合 --}}
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">ログイン</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">新規登録</a>
                    @endif
                @endauth
            </div>
        </div>
    </div>
</nav>
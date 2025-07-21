<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', '福井これうまいんやざ〜！診断')</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased flex flex-col min-h-screen">
        <div class="bg-gray-100 flex-grow">
            {{-- ナビゲーションバー --}}
            @include('commons.navbar')

            <main>
                @yield('content')
            </main>
        </div>
        
        {{-- フッター --}}
        <footer class="bg-gray-200 text-center p-4">
            <p>&copy; mami washida</p>
        </footer>
    </body>
</html>
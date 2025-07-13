<!DOCTYPE html>
<html lang="ja" data-theme="winter"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', '福井これうまいんやざ〜！診断')</title>
    
    @vite(['resources/css/app.css'])
</head>

<body class="flex flex-col min-h-screen">

    {{-- ナビゲーションバー --}}
    @include('commons.navbar')

    <div class="container mx-auto flex-grow">
        {{-- エラーメッセージ --}}
        @include('commons.error_messages')

        @yield('content')
    </div>

    {{-- フッター --}}
    <footer class="bg-gray-200 text-center p-4 mt-8">
        <p>&copy; mami washida</p>
    </footer>

</body>
</html>
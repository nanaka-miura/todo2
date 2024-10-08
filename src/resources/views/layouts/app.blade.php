<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>
<body>
    <header class="site__header">
        <div class="header__inner">
            <a class="header__logo" href="/">Todo</a>
            <ul class="header__nav">
                <li class="header__nav--list">
                    <a href="/categories">カテゴリ一覧</a>
                </li>
            </ul>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>
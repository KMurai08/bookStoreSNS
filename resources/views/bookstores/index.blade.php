<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <title>BookStore SNS</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="antialiased">
    <header class="">
        <div class="navbar bg-base-100 my-6">
            <div class="flex-1">
                <p class="text-3xl font-bold mx-10">BookStoreSNS</p>
            </div>
            <div class="flex-none">
                <ul class="menu menu-horizontal px-1">
                    <li><a href="{{ route('novels.index') }}">読む本を探す</a></li>

                    @if (Route::has('login'))
                        @auth
                            <li><a href="{{ route('mybookstores.show', Auth::user()->bookstore->id) }}">マイ本屋</a></li>
                            <li>
                                <details>
                                    <summary>
                                        <span>{{ Auth::user()->name }}</span>
                                    </summary>
                                    <ul class="bg-base-100 rounded-t-none p-2 z-40">
                                        <li><a href="{{ route('novels.create') }}" class="">
                                                小説を投稿する
                                            </a></li>
                                        <li>
                                            <a href="{{ route('profile.edit') }}">ユーザー情報編集</a>
                                        </li>
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <button type="submit"
                                                    class="underline text-sm text-gray-600 hover:text-gray-900">
                                                    ログアウト
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </details>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('login') }}">ログイン</a>
                            </li>

                            @if (Route::has('register'))
                                <li>
                                    <a href="{{ route('register') }}">新規登録</a>
                                </li>
                            @endif
                    </ul>
                @endauth
                @endif
            </div>
        </div>
    </header>
    <div class="container mx-auto px-4">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($bookstoresData as $data)
                <a href="{{ route('bookstores.show', $data['bookstore']->id) }}" class="block">
                    <div
                        class="bg-white shadow-md rounded-lg p-6 transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg">
                        <h2 class="text-xl font-semibold mb-2">{{ $data['bookstore']->bookstore_name }}</h2>
                        <p class="text-gray-600 mb-4">{{ $data['bookstore']->bookstore_introduction }}</p>

                        <div class="border-t pt-4">

                            @if ($data['favorite_review'])
                                <div class="mt-4">
                                    <h3 class="text-sm">只今のイチオシ：{{ $data['favorite_review']->novel->novel_title }}</h3>
                                    <p class="text-xs mt-2">
                                        {{ Str::limit($data['favorite_review']->review_text, 100) }}
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</body>

</html>

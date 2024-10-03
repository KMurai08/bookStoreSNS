<!DOCTYPE html>
<html lang="ja" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <title>書店情報更新</title>
</head>

<body class="">
    <header class="">
        <div class="navbar bg-base-100 my-6">
            <div class="flex-1">
                <a href="{{ route('bookstores.index') }}" class="text-3xl font-bold mx-10">BookStoreSNS</a>
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
    <div class="container mx-auto p-4 md:p-8">

        <h1 class="text-2xl md:text-3xl font-bold mb-10 text-center text-gray-800 border-y py-16">店舗情報編集</h1>
        <div class="bg-white rounded px-8 pt-6 pb-8 mb-4 shadow-md">
            <form action="{{ route('bookstores.update', $bookstore) }}" method="POST">
                @csrf
                @method('PUT')
                <p class="text-xl font-semibold mb-5">店舗基本情報編集</p>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="bookstore_name">
                        書店名:
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        type="text" name="bookstore_name" id="bookstore_name"
                        value="{{ $bookstore->bookstore_name }}" required>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="bookstore_introduction">
                        書店紹介:
                    </label>
                    <textarea
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                        name="bookstore_introduction" id="bookstore_introduction" rows="4" required>{{ $bookstore->bookstore_introduction }}</textarea>
                </div>

                <div class="flex items-center justify-between">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        更新
                    </button>
                </div>
            </form>
        </div>
        <div class="bg-white rounded px-8 pt-6 pb-8 mb-4 shadow-md">
            <p class="text-xl font-semibold mb-5">陳列内容編集</p>
            <div>

            </div>
            <p>準備中です</p>
        </div>
        <div class="bg-white rounded px-8 pt-6 pb-8 mb-4 shadow-md">
            <p class="text-xl font-semibold mb-2">本屋を削除する</p>
            <p class="mb-4">投稿した作品、レビュー、本屋含めて全ての情報が削除されます</p>
            <form method="POST" action="{{ route('users.destroy', Auth::user()) }}"
                onsubmit="return confirm('本当にアカウントを削除しますか？');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-error color-white">アカウント削除</button>
            </form>
        </div>
    </div>

</body>

</html>

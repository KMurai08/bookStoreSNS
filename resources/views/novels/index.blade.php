<!DOCTYPE html>
<html data-theme="light">

<head>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>小説一覧</title>
</head>

<body class="bg-white text-gray-800">
    <header class="">
        <div class="navbar bg-base-100 my-6">
            <div class="flex-1">
                <a href="{{ route('bookstores.index') }}" class="text-3xl font-bold mx-10">BookStoreSNS</a>

            </div>
            <div class="flex-none">
                <ul class="menu menu-horizontal px-1">

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
    <div class="container mx-auto p-8">

        {{-- <div class="mb-12">
            <h2 class="text-2xl font-semibold mb-5 text-black">ジャンルで探す</h2>
            <div class="flex flex-wrap gap-3">
                <button
                    class="btn btn-outline hover:bg-black hover:text-white transition-colors duration-300">ファンタジー</button>
                <button
                    class="btn btn-outline hover:bg-black hover:text-white transition-colors duration-300">児童書</button>
                <button
                    class="btn btn-outline hover:bg-black hover:text-white transition-colors duration-300">SF</button>
                <button
                    class="btn btn-outline hover:bg-black hover:text-white transition-colors duration-300">ミステリー</button>
                <button
                    class="btn btn-outline hover:bg-black hover:text-white transition-colors duration-300">恋愛</button>
                <button
                    class="btn btn-outline hover:bg-black hover:text-white transition-colors duration-300">ホラー</button>
            </div>
        </div> --}}

        <div>
            <h2 class="text-2xl font-semibold mb-5 text-black">新着小説一覧</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($novels as $novel)
                    <div
                        class="card bg-white border border-gray-200 shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="card-body">
                            <p class="card-title text-lg font-bold text-black">{{ $novel->novel_title }}</p>
                            <span class="text-gray-600 text-end">作者: {{ $novel->user->name }}</span>
                            <div class="border-t py-5">
                                <p>{{ Str::limit($novel->novel_introduction, 150, '...') }}</p>
                            </div>
                            <div class="card-actions justify-end mt-4">
                                <a href="{{ url('/novels/' . $novel->id) }}"
                                    class="btn btn-sm bg-black text-white hover:bg-gray-800 transition-colors duration-300">読む</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <title>書店情報更新</title>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-4 md:p-8">
        <div class="bg-white rounded px-8 pt-6 pb-8 mb-4">
            <h1 class="text-2xl md:text-3xl font-bold mb-10 text-center text-gray-800">店舗情報編集</h1>
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
        <div class="bg-white rounded px-8 pt-6 pb-8 mb-4">
            <p class="text-xl font-semibold mb-5">陳列内容編集</p>
            <p>準備中です</p>
        </div>
        <div class="bg-white rounded px-8 pt-6 pb-8 mb-4">
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

<!DOCTYPE html>
<html lang="ja" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>小説投稿フォーム</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6 text-center">小説投稿フォーム</h1>
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            {{-- action="{{ route('novels.store') }}" method="POST" --}}
    @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="novel_title">
                    タイトル
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="novel_title" type="text" placeholder="小説のタイトルを入力">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="novel_introduction">
                    はじめに
                </label>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="novel_introduction" placeholder="小説の紹介文を入力" rows="3"></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="novel_text">
                    本文
                </label>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="novel_text" placeholder="小説の本文を入力" rows="10"></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="genre_id">
                    ジャンル
                </label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="genre_id" name="genre_id">
                    <option value="1">ファンタジー</option>
                    <option value="2">SF</option>
                    <option value="3">ミステリー</option>
                    <option value="4">恋愛</option>
                    <option value="5">その他</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="story_length">
                    物語の長さ
                </label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="story_length">
                    <option>短編</option>
                    <option>中編</option>
                    <option>長編</option>
                </select>
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    投稿する
                </button>
            </div>
        </form>
    </div>
</body>
</html>
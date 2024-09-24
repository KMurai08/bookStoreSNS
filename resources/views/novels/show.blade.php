<!DOCTYPE html>
<html lang="ja" class="bg-gray-100">
<head>
        <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.tailwindcss.com"></script>
      <script src="https://cdn.tailwindcss.com"></script>
    <title>{{ $novel_title }}</title>
</head>

<body class="font-sans ">

    <div class="max-w-4xl mx-auto p-6">
        <!-- Novel Information -->
        <div class="bg-white rounded-lg shadow-md p-8 mb-6">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-4">
                <h1 class="text-3xl font-bold text-gray-800 mb-2 md:mb-0">{{ $novel_title }}</h1>
                <div class="text-sm text-gray-600">
                    <p class="mb-1">作者: <span class="font-semibold">{{ $name }}</span></p>
                    <p>作成日: <span class="font-semibold">{{ $updated_at->format('Y年m月d日') }}</span></p>
                </div>
            </div>
            <div class="border-t border-gray-200 pt-4">
                <h2 class="text-xl font-semibold text-gray-700 mb-2">作品について</h2>
                <p class="text-gray-600 leading-relaxed">{{ $novel_introduction }}</p>
            </div>
        </div>

        <!-- Novel Text -->
        <div class="bg-white rounded-lg shadow-md p-8 mb-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">本文</h2>
            <div class="prose max-w-none text-gray-700 leading-relaxed">
                {!! $novel_text !!}
            </div>
        </div>

        <!-- Review Form -->
        <div class="bg-white rounded-lg shadow-md p-8 mb-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">レビューを投稿</h2>
                <form class="space-y-4" action="{{ route('review.store', $novel_id) }}" method="POST">
                @csrf
                <div>
                    <label for="review_title" class="block text-sm font-medium text-gray-700 mb-1">レビュータイトル</label>
                    <input
                        type="text"
                        id="review_title"
                        name="review_title"
                        placeholder="レビュータイトルを入力してください"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                </div>
                <div>
                    <label for="review_text" class="block text-sm font-medium text-gray-700 mb-1">レビュー内容</label>
                    <textarea
                        id="review_text"
                        name="review_text"
                        placeholder="レビュー内容を入力してください"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 h-32"
                    ></textarea>
                </div>
                <button
                    type="submit"
                    class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 transition-colors duration-300"
                >
                    投稿
                </button>
            </form>
        </div>
            {{-- レビュー表示処理 --}}
            <div class="bg-white rounded-lg shadow-md p-8 mb-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">レビュー一覧</h2>

                @foreach($reviews as $review)
                    <div class="border-2 p-2 my-3 rounded-lg">
                        <span class="">{{ $review['reviewer_name'] }}</span>
                        <span class="">{{ $review['review_created_at'] }}</span>
                        <h3 class="font-semibold border-b mb-2">{{ $review['review_title'] }}</h3>                      
                        <p>{{ $review['review_text'] }}</p>
                    </div>
                @endforeach
            </div>
    </div>


</body>
</html>
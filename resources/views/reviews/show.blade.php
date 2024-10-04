<!DOCTYPE html>
<html lang="ja" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.11/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>レビュー詳細 - {{ $review->review_title }}</title>
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
        <div class="card bg-base-100 shadow-xl">
            <div class="card-body">
                <h1 class="card-title text-3xl font-bold mb-6">レビュー詳細</h1>

                <div class="bg-gray-50 p-6 rounded-lg mb-6">
                    <h2 class="text-2xl font-semibold mb-4">{{ $review->review_title }}</h2>
                    <div class="flex items-center mb-4">
                        <span class="badge badge-primary mr-2">作品</span>
                        <a href="{{ route('novels.show', ['id' => $review->novel_id]) }}">{{ $review->novel->novel_title }}</a>
                    </div>
                    <div class="flex items-center mb-4">
                        <span class="badge badge-secondary mr-2">レビュアー</span>
                        <span class="font-medium">{{ $review->user->name }}</span>
                    </div>
                    <div class="flex items-center mb-4">
                        <i class="fas fa-calendar-alt text-gray-500 mr-2"></i>
                        <span>{{ $review->created_at->format('Y年m月d日 H:i') }}</span>
                    </div>
                    <p class="text-gray-700 mt-4 leading-relaxed">{{ $review->review_text }}</p>
                </div>

                <div class="flex justify-between items-center mt-6">
                    @if (Auth::check() && Auth::id() === $review->user_id)
                        <button class="btn btn-secondary" onclick="my_modal_4.showModal()">
                            <i class="fas fa-edit mr-2"></i>レビューを編集する
                        </button>
                    @else
                        <div></div> <!-- 編集ボタンがない場合のスペース確保 -->
                    @endif
                    <a href="{{ route('novels.show', ['id' => $review->novel_id]) }}" class="btn btn-primary">
                        <i class="fas fa-book mr-2"></i>小説を読む
                    </a>
                </div>
            </div>
        </div>

        @if (Auth::check() && Auth::id() === $review->user_id)
            <dialog id="my_modal_4" class="modal">
                <div class="modal-box w-11/12 max-w-5xl">
                    <h3 class="font-bold text-lg mb-4">レビューの編集</h3>
                    <form action="{{ route('reviews.update', $review->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-control mb-4">
                            <label for="review_title" class="label">
                                <span class="label-text">タイトル</span>
                            </label>
                            <input type="text" name="review_title" id="review_title"
                                value="{{ $review->review_title }}" class="input input-bordered w-full">
                        </div>
                        <div class="form-control mb-4">
                            <label for="review_text" class="label">
                                <span class="label-text">レビュー内容</span>
                            </label>
                            <textarea name="review_text" id="review_text" rows="4" class="textarea textarea-bordered h-24">{{ $review->review_text }}</textarea>
                        </div>
                        <div class="modal-action">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save mr-2"></i>更新
                            </button>
                            <button type="button" class="btn btn-ghost" onclick="my_modal_4.close()">キャンセル</button>
                        </div>
                    </form>
                </div>
            </dialog>
            <form id="delete-form" action="{{ route('reviews.destroy', $review->id) }}" method="POST"
                style="display: none;">
                @csrf
                @method('DELETE')
            </form>
        @endif
    </div>
    <script>
        function confirmDelete() {
            if (confirm('このレビューを削除してもよろしいですか？この操作は取り消せません。')) {
                document.getElementById('delete-form').submit();
            }
        }
    </script>
</body>

</html>

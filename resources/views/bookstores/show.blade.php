<!DOCTYPE html>
<html lang="ja" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>{{ $bookstore_name }}</title>
</head>

<body>

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
                            @if ($canEdit)
                                <li>
                                    <a href="{{ route('bookstores.edit', $id) }}">本屋を編集</a>
                                </li>
                            @else
                                <li><a href="{{ route('mybookstores.show', Auth::user()->bookstore->id) }}">マイ本屋</a></li>
                            @endif
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
    <div class="max-w-4xl mx-auto p-6">
        <div class="bg-white rounded-lg shadow-md p-8 my-10 flex flex-col">
            <div class="flex justify-center mb-5">
                <span class="badge badge-neutral">書店</span>
            </div>
            <h1 class="text-3xl font-bold text-gray-800 text-center border-b-2 border-gray-200 pb-4">
                {{ $bookstore_name }}</h1>
            <p class="text-gray-600 text-center py-4">{{ $bookstore_introduction }}</p>
        </div>

        <div class="my-16 max-w-4xl mx-auto px-4">

            @if (isset($favorite_review_title) && isset($favorite_review_text))
                <p class="text-xl border-y-2 text-center font-bold py-6 mb-6">只今のイチオシ</p>

                <div class="bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden">
                    <div class="md:flex">
                        <!-- 小説情報 -->
                        <div class="skeleton md:w-2/5 bg-gray-100 p-6">
                            <h3 class="text-2xl font-bold text-black mb-4">{{ $favorite_novel_title }}</h3>
                            <p class="text-gray-700 mb-6">{{ Str::limit($favorite_novel_introduction, 200) }}</p>
                            <a class="btn btn-outline btn-primary"
                                href="{{ route('novels.show', ['id' => $favorite_novel_id]) }}">
                                小説を読む
                            </a>
                        </div>
                        <!-- レビュー -->
                        <div class="md:w-3/5 p-6 border-l border-gray-200">
                            <div class="flex items-center mb-4">
                                <h3 class="text-xl font-bold text-black mb-4">{{ $favorite_review_title }}</h3>
                            </div>
                            <p class="text-gray-700">{{ Str::limit($favorite_review_text, 300) }}</p>
                            <a href="{{ route('reviews.show', ['id' => $favorite_review_id]) }}"
                                class="inline-block mt-4 text-black hover:text-gray-600 transition-colors duration-300 font-semibold">続きを読む...</a>
                        </div>
                    </div>
                </div>
            @else
                <div class="bg-gray-100 rounded-lg shadow-md p-8 text-center">
                    <p class="text-xl text-gray-800">現在イチオシ作品はありません</p>
                </div>
            @endif
        </div>



        <p class="text-xl border-y-2 text-center font-bold py-6 mb-6">投稿レビュー一覧</p>

        <div class="flex justify-center items-center bg-base-200 p-10 mb-10">
            <div class="relative w-full max-w-2xl bg-white px-10 rounded-lg shadow-lg overflow-hidden h-64">
                @if (count($reviews) > 0)
                    @foreach ($reviews as $index => $review)
                        <div class="slide {{ $index === 0 ? 'active' : 'hidden' }} h-full flex flex-col">
                            <div class="p-8 flex-grow">
                                <h2 class="text-2xl font-bold mb-4">{{ $review->review_title }}</h2>
                                <p class="text-gray-600">{{ Str::limit($review->review_text, 200) }}</p>
                            </div>
                            <div class="flex justify-between items-center p-4 bg-white">
                                <a href="{{ route('novels.show', $review->novel->id) }}" class="link link-primary">
                                    【{{ $review->novel->novel_title }}】を読む
                                </a>
                                <a class="link link-secondary" href="{{ route('reviews.show', $review->id) }}">
                                    レビュー全体を読む
                                </a>
                            </div>
                        </div>
                    @endforeach
                    <button
                        class="nav-button prev absolute top-1/2 left-4 -translate-y-1/2 bg-white bg-opacity-70 hover:bg-opacity-100 rounded-full p-2 focus:outline-none transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button
                        class="nav-button next absolute top-1/2 right-4 -translate-y-1/2 bg-white bg-opacity-70 hover:bg-opacity-100 rounded-full p-2 focus:outline-none transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                @else
                    <div class="p-8">
                        <p class="text-gray-600 text-center">まだ投稿レビューはありません。</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const slides = document.querySelectorAll('.slide');
            const prevButton = document.querySelector('.nav-button.prev');
            const nextButton = document.querySelector('.nav-button.next');
            let currentSlide = 0;

            function showSlide(index) {
                slides[currentSlide].classList.remove('active');
                slides[currentSlide].classList.add('hidden');
                slides[index].classList.remove('hidden');
                slides[index].classList.add('active');
                currentSlide = index;
            }

            function nextSlide() {
                showSlide((currentSlide + 1) % slides.length);
            }

            function prevSlide() {
                showSlide((currentSlide - 1 + slides.length) % slides.length);
            }

            if (prevButton && nextButton) {
                nextButton.addEventListener('click', nextSlide);
                prevButton.addEventListener('click', prevSlide);
            }
        });
    </script>

</body>

</html>

<!DOCTYPE html>
<html lang="ja" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body>

    <header class="mx-5">
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
        <div class="bg-white rounded-lg shadow-md p-8 my-10">

            <h1 class="text-3xl font-bold text-gray-800 text-center border-b-2 border-gray-200 pb-2">
                {{ $bookstore_name }}</h1>
            <p class="text-gray-600 text-center py-4">{{ $bookstore_introduction }}</p>
        </div>

        <div class="my-16">
            @if (isset($favorite_review_title) && isset($favorite_review_text))
                <p class="text-xl border-y-2 text-center font-bold py-2 mb-4">只今のイチオシ</p>
                <div class="flex w-full flex-col lg:flex-row">
                    <div class="w-1/2 rounded-box shadow-md grid h-96 place-items-center overflow-auto p-2 m-1">
                        <p>【{{ $favorite_novel_title }}】</p>
                        <p>{{ $favorite_novel_introduction }}</p>
                        <a class="btn btn-primary" href="{{ route('novels.show', ['id' => $favorite_novel_id]) }}">
                            小説を読む
                        </a>
                    </div>
                    <div class="w-1/2 rounded-box shadow-md grid h-96 place-items-center overflow-auto p-2 m-1">
                        <h1 class="text-l font-semibold">{{ $favorite_review_title }}</h1>
                        <p class="py-6">
                            {{ $favorite_review_text }}
                        </p>
                    </div>

                </div>
            @else
                <div class="hero bg-base-200 py-4">
                    <div class="hero-content text-center">
                        <p>現在イチオシ作品はありません</p>
                    </div>
                </div>
            @endif

        </div>

        <p class="text-xl border-y-2 text-center font-bold p-2 my-4">投稿レビュー一覧</p>
        <div class="flex justify-center items-center bg-base-200 p-10 mb-10">
            <div class="relative w-full max-w-2xl bg-white px-10 rounded-lg shadow-lg overflow-hidden">
                @if (count($reviews) > 0)
                    @foreach ($reviews as $index => $review)
                        <div class="slide {{ $index === 0 ? 'active' : 'hidden' }}">
                            <div class="p-8">
                                <h2 class="text-2xl font-bold mb-4">{{ $review->review_title }}</h2>
                                <p class="text-gray-600">{{ Str::limit($review->review_text, 200) }}</p>
                                <div class="flex justify-end mt-2">
                                    <a href="{{ route('novels.show', $review->novel->id) }}"
                                        class="link link-primary">作品【{{ $review->novel->novel_title }}】を読む＞＞</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="p-8">
                        <p class="text-gray-600 text-center">まだ投稿レビューはありません。</p>
                    </div>
                @endif


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

            nextButton.addEventListener('click', nextSlide);
            prevButton.addEventListener('click', prevSlide);
        });
    </script>



</body>

</html>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body>
    <div class="max-w-4xl mx-auto p-6">
        <header>
            <div class="navbar bg-base-100 border-y-4 border-gray-900 mb-10">
                <div class="flex-1">
                    <a class="btn btn-ghost text-xl">BookStoreSNS</a>
                </div>
                <div class="flex-none">
                    <ul class="menu menu-horizontal px-1">
                        <li><a>Link</a></li>
                        <li>
                            <details>
                                <summary>Parent</summary>
                                <ul class="bg-base-100 rounded-t-none p-2">
                                    <li><a>Link 1</a></li>
                                    <li><a>Link 2</a></li>
                                </ul>
                            </details>
                        </li>
                    </ul>
                </div>
            </div>

        </header>
        <div role="tablist" class="tabs tabs-lifted tabs-lg">
            <a role="tab" class="tab tab-active">本屋</a>
            <a role="tab" class="tab">投稿レビュー</a>
            <a role="tab" class="tab">投稿作品</a>
            <a role="tab" class="tab">いいね</a>

        </div>

        <div class="bg-white rounded-lg shadow-md p-8 my-10">
            <div class="flex justify-end">
                <div class="badge badge-primary badge-outline">{{ $name }}</div>
            </div>
            <h1 class="text-3xl font-bold text-gray-800 text-center border-b-2 border-gray-200 pb-2">
                {{ $bookstore_name }}</h1>
            <p class="text-gray-600 text-center py-4">{{ $bookstore_introduction }}</p>
        </div>

        <div>
            <p class="text-l font-bold mx-5 mb-2">只今のイチオシ：{{ $favorite_novel_title }}
            </p>
            <div class="hero bg-base-200 py-4">
                <div class="hero-content text-center">
                    <div class="max-w-md">
                        <h1 class="text-4xl font-bold">{{ $favorite_review_title }}</h1>
                        <p class="py-6">
                            {{ $favorite_review_text }}
                        </p>
                        <a class="btn btn-primary" href="{{ route('novels.show', ['id' => $favorite_novel_id]) }}">
                            小説を読む
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-center items-center bg-base-200 p-10 mb-10 mt-10">
            <div class="relative w-full max-w-2xl bg-white px-10 rounded-lg shadow-lg overflow-hidden">
                @foreach ($reviews as $index => $review)
                    <div class="slide {{ $index === 0 ? 'active' : 'hidden' }}">
                        <div class="p-8">
                            <h2 class="text-2xl font-bold mb-4">{{ $review->review_title }}</h2>
                            <p class="text-gray-600">{{ Str::limit($review->review_text, 200) }}</p>
                            <div class="flex justify-end mt-2">
                                <a href="{{ route('novels.show', $review->novel->id) }}"
                                    class="link link-primary">{{ $review->novel->novel_title }}＞＞</a>
                            </div>
                            <div class="flex justify-end">
                                <a href=""
                                    class="link link-primary">レビュー全体を読む</a>
                            </div>
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
    {{-- @foreach ($reviews as $review)
    <h3>{{ $review->review_title }}</h3>
    <p>{{ $review->review_text }}</p>
    <p>小説: {{ $review->novel->novel_title }}</p>
@endforeach
        <div class="mt-10">
            <p class="text-center text-l font-bold bg-base-200 pt-5">本棚名</p>
            <div class="flex justify-center items-center bg-base-200 p-10 mb-10">

                <div class="relative w-full max-w-2xl bg-white px-10 rounded-lg shadow-lg overflow-hidden">
                    <div class="slide active">
                        <div class="p-8">
                            <h2 class="text-2xl font-bold mb-4">レビュータイトル</h2>
                            <p class="text-gray-600">レビュー本文【表示文字数制限あり】</p>
                            <div class="flex justify-end">
                                <a class="link link-primary">作品タイトル</a>
                            </div>
                            <div class="flex justify-end">
                                <a class="link link-primary">レビュー全体を読む</a>
                            </div>
                        </div>
                    </div>
                    <div class="slide hidden">
                        <div class="p-8">
                            <h2 class="text-2xl font-bold mb-4">スライド2</h2>
                            <p class="text-gray-600">スライド2の内容です。画像の代わりにテキストを使用しています。</p>
                        </div>
                    </div>
                    <div class="slide hidden">
                        <div class="p-8">
                            <h2 class="text-2xl font-bold mb-4">スライド3</h2>
                            <p class="text-gray-600">最後のスライドです。このように複数のテキストブロックを切り替えて表示できます。</p>
                        </div>
                    </div>
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
            <footer class="footer footer-center bg-base-300 text-base-content p-4">
                <aside>
                    <p>Copyright ©2024- All right reserved by ACME Industries Ltd</p>
                </aside>
            </footer>
        </div>
    </div>

    <script>
        const slides = document.querySelectorAll('.slide');
        const prevButton = document.querySelector('.prev');
        const nextButton = document.querySelector('.next');
        let currentSlide = 0;

        function showSlide(n) {
            slides[currentSlide].classList.add('hidden');
            slides[currentSlide].classList.remove('active');
            currentSlide = (n + slides.length) % slides.length;
            slides[currentSlide].classList.remove('hidden');
            slides[currentSlide].classList.add('active');
        }

        prevButton.addEventListener('click', () => showSlide(currentSlide - 1));
        nextButton.addEventListener('click', () => showSlide(currentSlide + 1));
    </script> --}}



</body>

</html>

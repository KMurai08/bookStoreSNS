<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://cdn.tailwindcss.com"></script>
    <title>BookStore SNS</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="antialiased">
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-bold my-8">BookStore SNS</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($bookstores as $bookstore)
            <a href="{{ route('bookstores.show',$bookstore->id) }}" class="block">
                <div class="bg-white shadow-md rounded-lg p-6 transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-lg">
                    <h2 class="text-xl font-semibold mb-2">{{ $bookstore->bookstore_name }}</h2>
                    <p class="text-gray-600">{{ $bookstore->bookstore_introduction }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</body>
</html>
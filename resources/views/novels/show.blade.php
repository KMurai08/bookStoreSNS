<!DOCTYPE html>
<html>
<head>
        <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.tailwindcss.com"></script>
      <script src="https://cdn.tailwindcss.com"></script>
    <title>{{ $novel_title }}</title>
</head>
<body class="bg-sky-50">
    <div class="contentWrapper p-10 place-content-center">
        <div class="flex justify-between bg-white my-5 p-5">
            <div class="text-3xl font-semibold">
                <h1>タイトル：{{ $novel_title }}</h1>
            </div>
            <div>
                <p>作者: {{ $name }}</p>
                <p>作成日：{{ $updated_at }}</p>
            </div>
        </div>
    <div class="bg-white">
        <p>本文：{!! $novel_text !!}</p>
    </div>
    
    <div>
        <a href="{{ url('/novels') }}">戻る</a>
    </div>
</div>
</body>
</html>
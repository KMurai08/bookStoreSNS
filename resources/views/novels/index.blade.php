<!DOCTYPE html>
<html data-theme="light">

<head>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>小説一覧</title>
</head>

<body class="bg-sky-50">
    <div class="contentsWrapper p-10">
        <div class="border-b pb-10">
            <p class="my-5">ジャンルで探す</p>
            <button class="btn btn-outline">ファンタジー</button>
            <button class="btn btn-outline">児童書</button>
            <button class="btn btn-outline">SF</button>
            <button class="btn btn-outline">ミステリー</button>
            <button class="btn btn-outline">恋愛</button>
            <button class="btn btn-outline">ホラー</button>
        </div>
        
        <div>
            <p class="my-5">新着小説一覧</p>

            <ul class="link link-primary">
                @foreach ($novels as $novel)
                    <li><a href="{{ url('/novels/' . $novel->id) }}">{{ $novel->novel_title }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    
</body>

</html>

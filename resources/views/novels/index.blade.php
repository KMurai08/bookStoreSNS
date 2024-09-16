<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.tailwindcss.com"></script>
      <script src="https://cdn.tailwindcss.com"></script>
    <title>小説一覧</title>
</head>
<body class="bg-sky-50">

    <div class="contentsWrapper p-10">
    <h1 class="my-5">小説一覧</h1>

    <ul class="link link-primary">
        @foreach($novels as $novel)
            <li><a href="{{ url('/novels/' . $novel->novel_id) }}">{{ $novel->novel_title }}</a></li>
        @endforeach
    </ul>
</div>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
      <script src="https://cdn.tailwindcss.com"></script>
    <title>ユーザー一覧</title>
</head>
<body>
    <h1 class="font-bold">小説一覧</h1>

    <ul>
        @foreach($novels as $novel)
            <li><a href="{{ url('/novels/' . $novel->novel_id) }}">{{ $novel->novel_title }}</a></li>
        @endforeach
    </ul>

</body>
</html>
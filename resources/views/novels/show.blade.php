<!DOCTYPE html>
<html>
<head>
    <title>{{ $novel_title }}</title>
</head>
<body>
    <h1>タイトル：{{ $novel_title }}</h1>
    <p>作者: {{ $name }}</p>
<p>本文：{!! $novel_text !!}</p>
    <!-- 他の詳細情報をここに追加 -->
    <a href="{{ url('/novels') }}">戻る</a>
</body>
</html>
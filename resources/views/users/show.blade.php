<!DOCTYPE html>
<html>
<head>
    <title>ユーザー詳細</title>
</head>
<body>
    <h1>ユーザー詳細</h1>
    <p>名前: {{ $user->name }}</p>
    <p>メールアドレス: {{ $user->email }}</p>
    <!-- 他の詳細情報をここに追加 -->
    <a href="{{ url('/users') }}">戻る</a>
</body>
</html>
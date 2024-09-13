<!DOCTYPE html>
<html>
<head>
    <title>ユーザー一覧</title>
</head>
<body>
    <h1>ユーザー一覧</h1>
    <ul>
        @foreach($users as $user)
            <li><a href="{{ url('/users/' . $user->id) }}">{{ $user->name }}</a></li>
        @endforeach
    </ul>
</body>
</html>
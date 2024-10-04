<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <title>ユーザー情報編集</title>
</head>

<body>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <p class="text-xl font-semibold mb-2">アカウントを削除する</p>
                <p class="mb-4">投稿した作品、レビュー、本屋含めて全ての情報が削除されます</p>
                <form method="POST" action="{{ route('users.destroy', Auth::user()) }}"
                    onsubmit="return confirm('本当にアカウントを削除しますか？');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-error color-white">アカウント削除</button>
                </form>

            </div>
        </div>
    </div>
</body>

</html>

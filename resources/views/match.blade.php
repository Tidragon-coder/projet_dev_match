<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    match

    <form method="GET" action="{{ route('profile') }}">
            @csrf
            <button type="submit">acceder au profile</button>
    </form>
</body>
</html>
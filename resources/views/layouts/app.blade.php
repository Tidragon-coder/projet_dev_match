<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hello</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/logo2.png') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="app.js"></script>

</head>
<body>

    <nav class="nav_fixed">
        <ul class="container_li_nav">

            <li class="list_nav">
                <a href="{{ route('match') }}">
                    <i class="fa-solid fa-house"></i>
                </a>
            </li>

            <li class="list_nav">
                <a href="{{ route('messages.list') }}">
                    <i class="fa-solid fa-message"></i>
                </a>    
            </li>

            
            <li class="list_nav">
                <a href="{{ route('profile') }}">
                    <i class="fa-solid fa-user"></i>
                </a> 
            </li>
              
            <li class="list_nav">
                <a href="{{ route('feedback') }}">
                    <i class="fa-solid fa-circle-info"></i>
                </a>
            </li>
        </ul>
    </nav>
    <main>
        @yield('content')
    </main>


</body>
</html>

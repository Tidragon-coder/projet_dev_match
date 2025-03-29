<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Document</title>
</head>
<body>
<div class="container_form">
        <h2>Bienvenue sur MatchWork ! </h2>
        <p class="text_welcome">Trouvez des profils complémentaires et formez l’équipe parfaite.</p>
        
        @if(session('success'))
            <div class="bg-green-500 text-white p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        
        @if(session('error'))
            <div class="bg-red-500 text-white p-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="bg-red-500 text-white p-3 rounded mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form method="POST" action="{{ route('login.submit') }}" class="space-y-4">
            @csrf
            <div class="container_label">
                <label for="email" class="form_label">Email</label>
                <input type="email" name="email" id="email" placeholder="Votre email" class="form-control">
            </div>
            
            <div class="container_label">
                <label for="password" class="form_label">Mot de passe</label>
                <input type="password" name="password" id="password" placeholder="Votre mot de passe" class="form-control">
            </div>
            
            <div class="flex items-center">
                <input type="checkbox" name="remember" id="remember" class="form-control">
                <label for="remember" class="ml-2 block text-sm text-slate-300">Se souvenir de moi</label>
            </div>
            
            <div>
                <button type="submit" class="btn btn-primary">
                    Se connecter
                </button>
            </div>
        </form>
       
    </div>

    <form action="{{ route('register.submit') }}" method="POST">
        
    </form>

    <div class="container_login">
            <p class="text_login">
            Vous n’avez pas de compte ? 
                <a href="{{ route('register') }}">
                Creer votre compte
                </a>
            </p>
        </div>
</body>
</html>
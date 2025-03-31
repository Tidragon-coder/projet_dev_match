<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">

<link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>match</title>
</head>
<body>

    <div class="profile-container">
        <!-- Photo de profil -->
        @if(auth()->user()->profile_picture)
            <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="Photo de profil">
        @else
            <img src="{{ asset('images/default-profile.png') }}" alt="Photo de profil par défaut">
        @endif

        
        <!-- Informations utilisateur -->
        <h2>{{ auth()->user()->name }}</h2>
        <p class="info"><strong>Nom d'utilisateur :</strong> {{ auth()->user()->pseudo }}</p>
        <p class="info"><strong>Email :</strong> {{ auth()->user()->email }}</p>
        <p class="info"><strong>Âge :</strong> {{ auth()->user()->age }} ans</p>
        <p class="info"><strong>Sexe :</strong> {{ auth()->user()->sexe }}</p>
        <p class="info"><strong>Spécialité :</strong> {{ auth()->user()->speciality }}</p>
        <p class="info"><strong>Année(s) d'expérience :</strong> {{ auth()->user()->year_experience }}</p>

        <!-- Biographie si elle existe -->
        @if(auth()->user()->biography)
            <p class="info"><strong>Biographie :</strong> {{ auth()->user()->biography }}</p>
        @else
            <p class="info"><strong>Biographie :</strong> Non renseignée</p>
        @endif

        <!-- Bouton de déconnexion -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Se déconnecter</button>
        </form>
        <form method="PUT" action="{{ route('edit') }}">
            @csrf
            <button type="submit">Modifier</button>
        </form>
        <form method="GET" action="{{ route('match') }}">
            @csrf
            <button type="submit">acceder au match</button>
        </form>
        
     
    </div>

</body>
</html>
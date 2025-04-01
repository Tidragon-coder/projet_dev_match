<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Match</title>
</head>
<body>

    <h2>Profil de {{ $user->pseudo }}</h2>
    <p>{{ $user->sexe }}</p>
    <p>Prenom : {{ $user->name }}</p>
    <p>Année d'expérience : {{ $user->year_experience }}</p>
    <p>Âge : {{ \Carbon\Carbon::parse($user->date_naissance)->age }} ans</p>
    <p>Spécialité : {{ $user->speciality }}</p>
    <p>Biographie : {{ $user->biography }}</p>

    <!-- Afficher le message si il est passé via la session -->
    @if(session('message'))
        <div class="alert alert-warning">
            {{ session('message') }}
        </div>
    @endif

    <form method="POST" action="{{ route('swipe.store') }}">
        @csrf
        <input type="hidden" name="swiped_user_id" value="{{ $user->id }}">
        <button type="submit" name="direction" value="match">Match</button>
        <button type="submit" name="direction" value="pass">Pass</button>
    </form>

    <form method="GET" action="{{ route('profile') }}">
        @csrf
        <button type="submit">Accéder au profil</button>
    </form>

    
    


</body>
</html>

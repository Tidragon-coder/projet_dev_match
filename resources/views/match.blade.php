<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <!-- <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="photo de {{ $user->name }}" max-width="20%"> -->
    <h2>Profil de {{ $user->pseudo }}</h2>
    <p>{{ $user->sexe }}</p>
    <p>Prenom : {{ $user->name }}</p>
    <p>Année d'expérience : {{ $user->year_experience }}</p>
    <p>Âge : {{ \Carbon\Carbon::parse($user->date_naissance)->age }} ans</p>
    <p>Spécialité : {{ $user->speciality }}</p>
    <p>Biographie : {{ $user->biography }}</p> 

    <form method="GET" action="{{ route('match') }}">
        @csrf
        <button type="submit">PASS</button>
    </form>
    <form method="GET" action="{{ route('match') }}">
        @csrf
        <button type="submit">MATCH</button>
    </form>

    <form method="GET" action="{{ route('profile') }}">
        @csrf
        <button type="submit">acceder au profile</button>
    </form>
</body>
</html>
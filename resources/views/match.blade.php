<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Match</title>
    <style>
        /* Style pour l'alerte */
        .alert {
            background-color: #f9c74f;
            padding: 10px;
            color: #4f4f4f;
            border-radius: 5px;
            margin-bottom: 10px;
        }
    </style>
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
        <div id="message" class="alert alert-warning">
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

    <!-- Script pour faire disparaître l'alerte après 2 secondes -->
    <script>
        
        @if(session('message'))
            //2 seconde d'attente
            setTimeout(function() {
                let messageElement = document.getElementById('message');
                if (messageElement) {
                    // Appliquer une transition de fondu pour l'élément
                    messageElement.style.transition = "opacity 0.5s ease-out";
                    messageElement.style.opacity = 0;  // Faire disparaître l'élément
                    setTimeout(function() {
                        messageElement.style.display = "none";  // Masquer complètement l'élément après le fondu
                    }, 500); // Délai de 0.5 seconde après le fondu
                }
            }, 2000); // Délai de 2 secondes avant de commencer l'animation
        @endif
    </script>

</body>
</html>

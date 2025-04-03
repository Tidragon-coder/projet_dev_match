@extends('layouts.app')

@section('title', 'match')

@section('content')

<!-- Section Navbar et Logo -->
<div class="nav-register-login">
    <img class="logo1" src="images/logo.png" alt="Logo" width="100px">
</div>
<div class="container_profile_match">
    <h2 class="title_page_match">A vos matchs, prêts, partez !</h2>
    <div class="container_picture_profile_match">
        <div class="container_infos_profile_match_top">{{ $user->name }} - {{ $user->speciality }}</div>
        <div class="container_infos_profile_match_bottom">{{ $user->localisation }} - {{ $user->year_experience}} ans XP</div>
        <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="aucune photo de profil de {{ $user->name }}" class="profile-image">
    </div>
    <div class="container_bio_user_match"><p class="bio_infos_user_match">{{ $user->biography}}</p></div>
    <div class="container_btn_swipes">
        <form method="POST" action="{{ route('swipe.store') }}">
            @csrf
            <input class="swiped_user_id" type="hidden" name="swiped_user_id" value="{{ $user->id }}">
            <button class="match-btn" type="submit" name="direction" value="match">Match</button>
            <button class="pass-btn" type="submit" name="direction" value="pass">Pass</button>
        </form>

        

    </div>

    <form method="GET" action="{{ route('profile') }}">
            @csrf
            <button type="submit">Accéder au profil</button>
        </form>
</div>
   



    <!-- <h2>Profil de {{ $user->pseudo }}</h2> -->
    
    <!-- <p>{{ $user->sexe }}</p>
    <p>Prenom : {{ $user->name }}</p>
    <p>Année d'expérience : {{ $user->year_experience }}</p>
    <p>Âge : {{ \Carbon\Carbon::parse($user->date_naissance)->age }} ans</p>
    <p>Spécialité : {{ $user->speciality }}</p>
    <p>Biographie : {{ $user->biography }}</p> -->

    <!-- Afficher le message si il est passé via la session -->
    @if(session('message'))
        <div id="message" class="alert alert-warning">
            {{ session('message') }}
        </div>
    @endif

    @if(session('popupMessage'))
        <div style="background-color: #ffc107; color: #000; padding: 10px; margin: 15px auto; border-radius: 10px; text-align: center; max-width: 500px;">
            {{ session('popupMessage') }}
        </div>
    @endif  


    
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

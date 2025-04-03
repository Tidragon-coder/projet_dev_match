@extends('layouts.app')

@section('title', 'match')

@section('content')

<!-- Section Navbar et Logo -->
<div class="nav-register-login">
    <img class="logo1" src="images/logo.png" alt="Logo" width="100px">
</div>

@if(isset($user))
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
            <button class="match-btn" id="matchBtn" type="submit" name="direction" value="match">Match</button>
            <button class="pass-btn" id="passBtn" type="submit" name="direction" value="pass">Pass</button>
        </form>
    </div>

    <form method="GET" action="{{ route('profile') }}">
        @csrf
        <button type="submit">Accéder au profil</button>
    </form>
</div>
@else
<div class="container_profile_match" style="text-align: center;">
    <h2 class="title_page_match">Aucun profil disponible</h2>
    <p style="color: #aaa;">Veuillez réessayer plus tard.</p>
</div>
@endif

<!-- Messages -->
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
        setTimeout(function() {
            let messageElement = document.getElementById('message');
            if (messageElement) {
                messageElement.style.transition = "opacity 0.5s ease-out";
                messageElement.style.opacity = 0;
                setTimeout(function() {
                    messageElement.style.display = "none";
                }, 500);
            }
        }, 2000);
    @endif
</script>

@if(session('popupMessage') && str_contains(session('popupMessage'), 'limite'))
<script>
    // Désactiver les boutons
    document.addEventListener("DOMContentLoaded", function() {
        const matchBtn = document.getElementById("matchBtn");
        const passBtn = document.getElementById("passBtn");

        if (matchBtn && passBtn) {
            matchBtn.disabled = true;
            passBtn.disabled = true;

            matchBtn.style.opacity = 0.5;
            passBtn.style.opacity = 0.5;

            // Optionnel : réactiver après 2 minutes (120000 ms)
            setTimeout(() => {
                matchBtn.disabled = false;
                passBtn.disabled = false;
                matchBtn.style.opacity = 1;
                passBtn.style.opacity = 1;
            }, 120000);
        }
    });
</script>
@endif


@endsection

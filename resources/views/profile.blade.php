@extends('layouts.app')

@section('title', 'Espace Personnel')

@section('content')

<style>
    body {
        background-color: #080808;
        color: #fff;
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 800px;
        margin: auto;
        padding: 20px;
    }

    .nav-register {
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: relative;
        width: 100%;
        margin-top: 50px;
    }

    .logo1 {
        width: 100px;
    }

    .container_logout_match {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    margin: 30px 0;


}


    .logout_btn_container button {
        background-color: #FFC848;
        color: #080808;
        padding: 10px 20px;
        border: none;
        border-radius: 20px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
    
    }

    .logout_btn_container button:hover {
        background-color: #e6b838;
    }

    .container_infos {
        text-align: center;
        margin-bottom: 30px;
    }

    .welcome_profile {
        font-size: 28px;
        margin-bottom: 10px;
    }

    .welcome_profile_espace {
        font-size: 20px;
        margin-bottom: 5px;
    }

    .last_connexion {
        font-size: 14px;
        color: #aaa;
    }

    .infos_container {
        background-color: #111;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 0 10px rgba(255, 200, 72, 0.2);
        margin-bottom: 30px;
    }

    .title_infos_container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .title_infos_container h2 {
        margin: 0;
        font-size: 22px;
        color: #FFC848;
    }

    .title_infos_container button {
        background-color: transparent;
        color: #FFC848;
        border: none;
        font-size: 16px;
        cursor: pointer;
    }
    .all_infos_container {
    display: flex;
    flex-wrap: wrap;
    gap: 15px;
    justify-content: space-between;
    margin-right: 25px;
}

.info_user {
    flex: 0 1 calc(50% - 10px);
    display: flex;
    align-items: flex-start;
    background-color: #222;
    padding: 10px;
    border-radius: 10px;
    min-width: 150px;
    word-break: break-word;
    overflow-wrap: break-word;
    white-space: normal;
}

.info_user i {
    margin-right: 10px;
    color: #FFC848;
    flex-shrink: 0;
}

.info {
    margin: 0;
    font-size: 16px;
    word-break: break-word;
    overflow-wrap: break-word;
    white-space: normal;
    flex: 1;
}

.info_user_picture {
    flex: 0 1 100%;
    text-align: center;
    margin-bottom: 15px;
}


    .info_user_picture img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #FFC848;
    }



    .info {
        margin: 0;
        font-size: 16px;
    }

    @media screen and (max-width: 600px) {
        .info_user {
            flex: 1 1 100%;
        }
    }

    .container-btn-match {
        text-align: center;
        margin-bottom: 30px;
    }

    .container-btn-match button {
        background-color: #FFC848;
        color: #080808;
        padding: 12px 30px;
        border: none;
        border-radius: 25px;
        font-weight: bold;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .container-btn-match button:hover {
        background-color: #e6b838;
    }

    .container_projet {
        background-color: #111;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 0 10px rgba(255, 200, 72, 0.2);
        margin-bottom: 30px;
    }

    .title_add_projet {
        font-size: 22px;
        color: #FFC848;
        margin-bottom: 20px;
    }

    .form-label-projet {
        display: block;
        margin-bottom: 6px;
        color: #FFC848;
        font-weight: bold;
    }

    .form-control-projet {
        width: 100%;
        padding: 10px;
        border-radius: 10px;
        border: none;
        background-color: #222;
        color: white;
        margin-bottom: 15px;
    }

    .form-control-projet:focus {
        outline: none;
        border: 2px solid #FFC848;
    }

    .btn-primary-projet {
        background-color: #FFC848;
        color: #080808;
        padding: 12px 30px;
        border: none;
        border-radius: 25px;
        font-weight: bold;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-primary-projet:hover {
        background-color: #e6b838;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .col-md-4 {
        flex: 1 1 calc(33.333% - 20px);
    }

    .card_projet {
        background-color: #222;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 0 10px rgba(255, 200, 72, 0.2);
    }

    .card_projet img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .card-body {
        padding: 15px;
    }

    .card-text {
        font-size: 14px;
        color: #ddd;
        margin-bottom: 15px;
    }

    .btn-danger {
        background-color: #ff4c4c;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 20px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-danger:hover {
        background-color: #e04343;
    }

    @media screen and (max-width: 600px) {
    .all_infos_container {
        gap: 10px;
    }

    .info_user {
        flex: 1 1 48%;
    }

    .info_user_picture {
        flex: 1 1 100%;
        text-align: center;
    }
}
.container_projet {
    background-color: #656463;
    margin-top: 20px;
    margin-right: 20px;
    padding: 25px;
    border-radius: 15px;
    box-shadow: 0 0 15px rgba(255, 200, 72, 0.1);
    margin-bottom: 40px;
}

.title_add_projet {
    font-size: 22px;
    color: #FFC848;
    margin-bottom: 20px;
    text-align: center;
}

.form-label-projet {
    color: #FFC848;
    font-weight: bold;
    margin-bottom: 8px;
    display: block;
}

.form-control-projet {
    width: 100%;
    padding: 12px;
    border-radius: 10px;
    background-color: #222;
    color: #fff;
    border: none;
    margin-bottom: 20px;
    resize: none;
}

.form-control-projet:focus {
    outline: none;
    border: 2px solid #FFC848;
}

.btn-primary-projet {
    background-color: #FFC848;
    color: #080808;
    padding: 12px 24px;
    font-weight: bold;
    border-radius: 25px;
    border: none;
    cursor: pointer;
    display: block;
    margin: 0 auto;
    transition: background-color 0.3s ease;
}

.btn-primary-projet:hover {
    background-color: #e6b838;
}

.card_projet {
    background-color: #222;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 0 10px rgba(255, 200, 72, 0.15);
    transition: transform 0.3s ease;
}

.card_projet:hover {
    transform: scale(1.02);
}

.card_projet img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-bottom: 1px solid #333;
}

.card-body {
    padding: 15px;
}

.card-text {
    font-size: 14px;
    color: #ddd;
    margin-bottom: 15px;
}

.btn-danger {
    background-color: transparent;
    border: 1px solid #ff4c4c;
    color: #ff4c4c;
    padding: 8px 16px;
    border-radius: 20px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.btn-danger:hover {
    background-color: #ff4c4c;
    color: white;
}

.custom-separator {
    border: none;
    border-top: 2px solid #FFC848;
    margin: 40px 0;
    width: 100%;
    margin-right: 20px;
}

.popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background:rgb(49, 184, 49); /* Bleu foncé (de ta palette) */
            color: #F0FBF7; /* Blanc cassé */
            padding: 15px 25px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            display: none; /* Cachée par défaut */
            z-index: 1000;
        }

        /* Animation pour faire disparaître la pop-up */
        .fade-out {
            animation: fadeOut 1s ease-in-out forwards;
        }

        @keyframes fadeOut {
            from { opacity: 1; }
            to { opacity: 0; }
        }

</style>

@section('content')
<div class="nav-register">
    <img class="logo1" src="images/logo.png" alt="Logo">
</div>

<div class="container_logout_match">
    <a href="{{ route('match') }}" style="color: #FFC848; font-weight: bold; text-decoration: none;">
        <i class="fa-solid fa-fire-flame-curved"></i> Matcher 
    </a>

    <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
        @csrf
        <button type="submit" style="background: none; color: #ff4c4c; border: none; font-weight: bold; font-size: 16px; cursor: pointer;">
            <i class="fa-solid fa-right-from-bracket"></i> Se déconnecter
        </button>
    </form>
</div>


    <!-- Infos de bienvenue -->
    <div class="container_infos">
        <h2 class="welcome_profile">👋 Bienvenue, {{ auth()->user()->name ?? 'Utilisateur' }} !</h2>
        <h3 class="welcome_profile_espace">Voici votre espace personnel sur MatchWork.</h3>
        <h4 class="last_connexion">
            Dernière connexion le :
            {{ auth()->user()->last_login_at ? \Carbon\Carbon::parse(auth()->user()->last_login_at)->locale('fr')->isoFormat('D MMMM YYYY') : 'Non renseignée' }}
        </h4>
    </div>

    <!-- Bloc d'infos utilisateur -->
    <div class="infos_container">
        <div class="title_infos_container">
            <h2>MES INFORMATIONS</h2>
            <form method="GET" action="{{ route('edit') }}">
                <button type="submit"><i class="fa-solid fa-pen-to-square"></i> Modifier</button>
            </form>
        </div>

        <div class="all_infos_container">
    <!-- Photo centrée seule -->
    <div class="info_user_picture">
        <img src="{{ auth()->user()->profile_picture ? asset('storage/' . auth()->user()->profile_picture) : asset('images/default-profile.png') }}" alt="Photo de profil">
    </div>

    <!-- Infos utilisateur en grille 2 colonnes -->
    <div class="info_user">
        <i class="fa-solid fa-user"></i>
        <p class="info">{{ auth()->user()->pseudo ?? 'Non renseigné' }}</p>
    </div>
    <div class="info_user">
        <i class="fa-solid fa-envelope"></i>
        <p class="info">{{ auth()->user()->email ?? 'Non renseigné' }}</p>
    </div>

    <div class="info_user">
    <i class="fa-solid fa-cake-candles"></i>
    <p class="info">
        @if(auth()->user()->date_naissance)
            {{ \Carbon\Carbon::parse(auth()->user()->date_naissance)->age }} ans
        @else
            Non renseigné
        @endif
    </p>
</div>

<div class="info_user">
    <i class="fa-solid fa-briefcase"></i>
    <p class="info">
        @if(auth()->user()->date_naissance && auth()->user()->year_experience)
            {{ auth()->user()->year_experience }} années d'expérience
        @elseif(auth()->user()->date_naissance && !auth()->user()->year_experience)
            Années d'expérience non renseignées
        @else
            Non renseignée
        @endif
    </p>
</div>

    <div class="info_user">
        <i class="fa-solid fa-fingerprint"></i>
        <p class="info">{{ ucfirst(auth()->user()->sexe) ?? 'Non renseigné' }}</p>
    </div>

    <div class="info_user">
        <i class="fa-solid fa-file-lines"></i>
        <p class="info">{{ auth()->user()->biography ?? 'Non renseignée' }}</p>
    </div>

    <div class="info_user">
        <i class="fa-solid fa-graduation-cap"></i>
        <p class="info">{{ auth()->user()->speciality ?? 'Non renseignée' }}</p>
    </div>
    <div class="info_user">
        <i class="fa-solid fa-location-dot"></i>
        <p class="info">{{ auth()->user()->localisation ?? 'Non renseignée' }}</p>
    </div>

    <div class="info_user">
        <i class="fa-solid fa-heart"></i>
        <p class="info">{{ auth()->user()->center_interest ?? 'Non renseignés' }}</p>
    </div>
    <div class="info_user">
        <i class="fa-solid fa-phone"></i>
        <p class="info">{{ auth()->user()->phone_number ?? 'Non renseigné' }}</p>
    </div>
</div>

<!-- Séparateur -->
<hr class="custom-separator">

    <!-- Ajouter un projet -->
    <div class="container_projet">
        <h2 class="title_add_projet">Ajouter un Projet</h2>
        <form action="{{ route('projets.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label class="form-label-projet" for="photo">Photo du projet</label>
            <input type="file" class="form-control-projet" name="photo" id="photo" required>

            <label class="form-label-projet" for="description">Description</label>
            <textarea class="form-control-projet" name="description" id="description"></textarea>

            <button type="submit" class="btn-primary-projet">Ajouter un projet</button>
        </form>
    </div>

    <!-- Projets existants -->
    <div class="row">
        @foreach($projets as $projet)
            <div class="col-md-4">
                <div class="card_projet">
                    <img src="{{ asset('storage/' . $projet->photo) }}" class="card-img-top" alt="Projet">
                    <div class="card-body">
                        <p class="card-text">{{ $projet->description }}</p>
                        <form action="{{ route('projets.destroy', $projet->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection


<div id="popup" class="popup" style="display: none;">
    <span id="popup-text">Ceci est une pop-up temporaire !</span>
</div>

<script>
    function showPopup(message, color) {
        let popup = document.getElementById("popup");
        let popupText = document.getElementById("popup-text");

        popupText.innerHTML = message; // Permet d'utiliser du HTML (comme <br>)
        popup.style.backgroundColor = color; // Modifier la couleur
        popup.style.display = "block"; // Afficher la pop-up

        // Attendre 3 secondes puis cacher la pop-up
        setTimeout(() => {
            popup.classList.add("fade-out");

            // Supprimer la pop-up après l'animation
            setTimeout(() => {
                popup.style.display = "none";
                popup.classList.remove("fade-out");
            }, 1000);
        }, 3000);
    }

    document.addEventListener("DOMContentLoaded", function() {
        // Vérifier si les données de la session sont bien présentes
        @if(session('popupMessage') && session('popupColor'))
            showPopup("{!! session('popupMessage') !!}", "{{ session('popupColor') }}");
        @endif
    });
</script>
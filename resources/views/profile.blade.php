@extends('layouts.app')

@section('title', 'Espace Personnel')

@section('content')

<!-- Section Navbar et Logo -->
<div class="nav-register-login">
    <img class="logo1" src="images/logo.png" alt="Logo" width="100px">
</div>

<!-- Section Déconnexion -->
<div class="logout_btn_container">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">
            <i class="fa-solid fa-right-from-bracket"></i> Se déconnecter
        </button>
    </form>
</div>

<!-- Section Bienvenue et Informations de Connexion -->
<div class="container_infos">
    <div class="container_welcome">
        <h2 class="welcome_profile">👋  Bienvenue, {{ auth()->user()->name }} !</h2>
        <h3 class="welcome_profile_espace">Voici votre espace personnel sur MatchWork.</h3>
        <h4 class="last_connexion">
            Dernière connexion le : {{ \Carbon\Carbon::parse(Auth::user()->last_login_at)->locale('fr')->format('d F Y') }}
        </h4>
    </div>
</div>

<!-- Section Informations Utilisateur -->
<div class="infos_container">
        <div class="title_infos_container">
            <h2>MES INFORMATIONS</h2>
            
            <form method="PUT" action="{{ route('edit') }}">
            @csrf
            
            <button type="submit"><i class="fa-solid fa-pen-to-square"></i>Modifier</button>
        </form>
        </div>

        <div class="all_infos_container">

    <div class="info_user_picture">
        @if(auth()->user()->profile_picture)
            <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="Photo de profil">
        @else
            <img src="{{ asset('images/default-profile.png') }}" alt="Aucune photo">
        @endif
    </div>

    <div class="info_user">
        <i class="fa-solid fa-user"></i>
        <p class="info">{{ auth()->user()->name }}</p>
    </div>

    <div class="info_user">
        <i class="fa-solid fa-envelope"></i>
        <p class="info">{{ auth()->user()->email }}</p>
    </div>

    <div class="info_user">
    <i class="fa-solid fa-cake-candles"></i>
    <p class="info" id="user-age"></p>
    <p class="info" id="birthday-message"></p>
</div>

<script>
    const birthDate = "{{ $user->date_naissance }}";

    function calculateAge(birthDate) {
        const birthDateObj = new Date(birthDate);
        const today = new Date();
        let age = today.getFullYear() - birthDateObj.getFullYear();
        const month = today.getMonth();
        const day = today.getDate();

        if (month < birthDateObj.getMonth() || (month === birthDateObj.getMonth() && day < birthDateObj.getDate())) {
            age--;
        }

        return age;
    }

    function daysUntilBirthday(birthDate) {
        const today = new Date();
        const birthDateObj = new Date(birthDate);
        birthDateObj.setFullYear(today.getFullYear());

        if (birthDateObj < today) {
            birthDateObj.setFullYear(today.getFullYear() + 1);
        }

        const diffTime = birthDateObj - today;
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

        return diffDays;
    }

    document.getElementById('user-age').textContent = calculateAge(birthDate) + " ans";

    const daysLeft = daysUntilBirthday(birthDate);
    const birthdayMessage = daysLeft === 0 
        ? "C'est aujourd'hui votre anniversaire !" 
        : `Votre anniversaire est dans ${daysLeft} jour${daysLeft > 1 ? 's' : ''}.`;

    document.getElementById('birthday-message').textContent = birthdayMessage;
</script>



    <div class="info_user">
        <i class="fa-solid fa-fingerprint"></i>
        <p class="info">{{ ucfirst(auth()->user()->sexe) }}</p>
    </div>

    <div class="info_user">
        <i class="fa-solid fa-briefcase"></i>
        <p class="info">{{ auth()->user()->year_experience }} ans d'expérience</p>
    </div>

    <div class="info_user">
        <i class="fa-solid fa-file-lines"></i>
        <p class="info">
            {{ auth()->user()->biography ?? 'Non renseignée' }}
        </p>
    </div>

    <div class="info_user">
        <i class="fa-solid fa-graduation-cap"></i>
        <p class="info">Spécialité : {{ auth()->user()->speciality }}</p>
    </div>

    <div class="info_user">
        <i class="fa-solid fa-location-dot"></i>
        <p class="info">Localisation : {{ auth()->user()->localisation }}</p>
    </div>

    <div class="info_user">
        <i class="fa-solid fa-heart"></i>
        <p class="info">Centres d'intérêt : {{ auth()->user()->center_interest }}</p>
    </div>

    <div class="info_user">
        <i class="fa-solid fa-phone"></i>
        <p class="info">Téléphone : {{ auth()->user()->phone_number }}</p>
    </div>

</div>

    </div>

    <!-- <div class="profile-container"> -->
        <!-- Photo de profil -->
        <!-- @if(auth()->user()->profile_picture)
            <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="Photo de profil">
        @else
            <img src="{{ asset('images/default-profile.png') }}" alt="Aucune photo">
        @endif -->

        
        <!-- Informations utilisateur -->
        <!-- <h2>{{ auth()->user()->name }}</h2>
        <p class="info"><strong>Nom d'utilisateur :</strong> {{ auth()->user()->pseudo }}</p>
        <p class="info"><strong>Email :</strong> {{ auth()->user()->email }}</p>
        <p class="info"><strong>Âge :</strong> {{ auth()->user()->age }} ans</p>
        <p class="info"><strong>Sexe :</strong> {{ auth()->user()->sexe }}</p>
        <p class="info"><strong>Spécialité :</strong> {{ auth()->user()->speciality }}</p>
        <p class="info"><strong>Année(s) d'expérience :</strong> {{ auth()->user()->year_experience }}</p> -->

        <!-- Biographie si elle existe -->
        <!-- @if(auth()->user()->biography)
            <p class="info"><strong>Biographie :</strong> {{ auth()->user()->biography }}</p>
        @else
            <p class="info"><strong>Biographie :</strong> Non renseignée</p>
        @endif -->

        <!-- Bouton de déconnexion -->
        <!-- <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Se déconnecter</button>
        </form>
        <form method="PUT" action="{{ route('edit') }}">
            @csrf
            <button type="submit"><i class="fa-solid fa-pen-to-square"></i> Modifier</button>
        </form>
    </div> -->

    <div class="all_infos_container">
        <!-- Photo de Profil -->
        <div class="info_user_picture">
            @if(auth()->user()->profile_picture)
                <img src="{{ asset('storage/' . auth()->user()->profile_picture) }}" alt="Photo de profil">
            @else
                <img src="{{ asset('images/default-profile.png') }}" alt="Aucune photo">
            @endif
        </div>

        <!-- Informations Utilisateur -->
        <div class="info_user">
            <i class="fa-solid fa-user"></i>
            <p class="info">{{ auth()->user()->pseudo }}</p>
        </div>

        <div class="info_user">
            <i class="fa-solid fa-envelope"></i>
            <p class="info">{{ auth()->user()->email }}</p>
        </div>

        <div class="info_user">
            <i class="fa-solid fa-cake-candles"></i>
            <p class="info">{{ auth()->user()->age }} ans</p>
        </div>

        <div class="info_user">
            <i class="fa-solid fa-fingerprint"></i>
            <p class="info">{{ auth()->user()->sexe }}</p>
        </div>

        <div class="info_user">
            <i class="fa-solid fa-briefcase"></i>
            <p class="info">{{ auth()->user()->year_experience }} ans</p>
        </div>

        <div class="info_user">
            <i class="fa-solid fa-file-lines"></i>
            @if(auth()->user()->biography)
                <p class="info">{{ auth()->user()->biography }}</p>
            @else
                <p class="info">Non renseignée</p>
            @endif
        </div>
    </div>
</div>

<!-- Section Accès au Match -->
<div class="container-btn-match">
    <form method="GET" action="{{ route('match') }}">
        <button type="submit">Accéder au match</button>
    </form>
</div>

<!-- Section Ajout de Projet -->
<div class="container_projet">
    <h2 class="title_add_projet">Ajouter un Projet</h2>
    <form action="{{ route('projets.store') }}" method="POST" enctype="multipart/form-data" class="mb-4">
        @csrf
        <div class="container_add_projet">
            <label for="photo" class="form-label-projet">Photo du projet</label>
            <input type="file" class="form-control-projet" id="photo" name="photo" required>
        </div>
        <div class="container_add_description_projet">
            <label for="description" class="form-label-projet">Description</label>
            <textarea class="form-control-projet" id="description" name="description"></textarea>
        </div>
        <button type="submit" class="btn btn-primary-projet">Ajouter Projet</button>
    </form>
</div>

<!-- Section Liste des Projets -->
<div class="row">
    @foreach($projets as $projet)
        <div class="col-md-4 mb-4">
            <div class="card_projet">
                <img src="{{ asset('storage/' . $projet->photo) }}" class="card-img-top" alt="Projet">
                <div class="card-body">
                    <p class="card-text">{{ $projet->description }}</p>
                    <form action="{{ route('projets.destroy', $projet->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection

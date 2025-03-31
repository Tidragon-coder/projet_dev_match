@extends('layouts.app')

@section('title', 'Inscription')

@section('content')
<div class="nav-register-login">
    <img class="logo1" src="images/logo.png" alt="" width="100px">
    

    <!-- <i class="fa-solid fa-circle-half-stroke"></i> -->
</div>

<div class="logout_btn_container">
<form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">
            <i class="fa-solid fa-right-from-bracket"></i> Se déconnecter
            </button>
        </form>
</div>

<div class="container_infos">
    <div class="container_welcome">
    
        <h2 class="welcome_profile">👋  Bienvenue, {{ auth()->user()->name }} !</h2>
        <h3 class="welcome_profile_espace">Voici votre espace personnel sur MatchWork.</h3>

        <h4 class="last_connexion">
             Dernière connexion le : 
            {{ \Carbon\Carbon::parse(Auth::user()->last_login_at)->locale('fr')->format('d F Y') }}
        </h4>
    </div>

  
</div>

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
                <p class="info"> {{ auth()->user()->biography }}</p>
                @else
                <p class="info"> Non renseignée</p>
                @endif
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
            <button type="submit">Modifier</button>
        </form>-->
        <form method="GET" action="{{ route('match') }}">
            <button type="submit">Accéder au match</button>
        </form>

        
     
    </div> 


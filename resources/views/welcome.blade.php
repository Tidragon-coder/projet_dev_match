@extends('layouts.app')

@section('title', 'Inscription')

@section('content')
<div class="nav-register-login">
    <img class="logo1" src="images/logo.png" alt="" width="100px">
    

    <!-- <i class="fa-solid fa-circle-half-stroke"></i> -->
</div>
<div class="container">


    <div class="container_form">
        <h2>Bienvenue sur MatchWork ! </h2>
        <p class="text_welcome">Trouvez des profils complémentaires et formez l’équipe parfaite.</p>
        
        <p class="text_welcome1">Inscrivez-vous dès maintenant et commencez l’aventure !</p>
        
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
        
        <form id="registration-form" action="{{ route('register.submit') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="container_label">
        <label for="name" class="form-label">Nom d'utilisateur</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>

    <div class="container_label">
        <label for="pseudo" class="form-label">Pseudo</label>
        <input type="text" class="form-control" id="pseudo" name="pseudo" required>
    </div>

    <div class="container_label">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required autocomplete="off">
    </div>

    <div class="container_label">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" id="password" name="password" required autocomplete="off">
    </div>

    <!-- <div class="container_label">
        <label for="age" class="form-label">Âge</label>
        <input type="number" class="form-control" id="age" name="age" required min="16" max="99">
    </div> -->

    <!-- <div class="container_label">
        <label for="sexe" class="form-label">Sexe</label>
        <select class="form-control" id="sexe" name="sexe" required>
            <option value="Homme">Homme</option>
            <option value="Femme">Femme</option>
            <option value="Autre">Autre</option>
        </select>
    </div> -->
 <div class="container_profile-pic-logo">
    <div class="container_label">
        <label for="speciality" class="form-label">Spécialité</label>
        <select class="form-control" id="speciality" name="speciality" required>
            <option value="marketing">Marketing</option>
            <option value="developpementWeb">Développement web</option>
            <option value="webdesign">Webdesign</option>
            <option value="graphiste">Graphiste</option>
        </select>
        
    </div>
    <img class="logo" src="/images/logo2.png" alt="Logo">
</div>

    <!-- <div class="container_label">
        <label for="year_experience" class="form-label">Année d'expérience</label>
        <input type="number" class="form-control" id="year_experience" name="year_experience" required min="0" max="99">
    </div> -->

    <!-- <div class="container_profile-pic-logo">
    <div class="container_label_picture">
        <label for="profile_picture" class="form-label">Photo de profil</label>
        <div class="mt-1 flex items-center">
            <label class="block w-full px-4 py-2 bg-slate-700 border border-slate-600 rounded-md text-white hover:bg-slate-600 cursor-pointer text-center">
                <span class="text_choose_img">Choisir une image</span>
                <input type="file" name="profile_picture" id="profile_picture" accept="image/*" class="hidden">
            </label>
        </div>
        <div id="file-name" class="mt-2 text-sm text-slate-400"></div>
    </div>
    <img class="logo" src="/images/logo2.png" alt="Logo">
    </div> -->
</form>

       
    </div>

    <!-- Bouton en dehors du formulaire -->
<div class="btn-validation">
    <button type="submit" class="btn btn-primary" form="registration-form">S'inscrire</button>
</div>

    <!-- <form action="{{ route('register.submit') }}" method="POST">
        
    </form> -->

    <div class="container_login">
            <p class="text_login">
                Vous evez déjà un compte ? 
                <a href="{{ route('login') }}">
                    Se connecter
                </a>
            </p>

            <p class="text_data">Vos données sont en sécurité. Elles restent strictement confidentielles et ne seront jamais vendues à des tiers.</p>
        </div>

        </div>
        
        

        @endsection
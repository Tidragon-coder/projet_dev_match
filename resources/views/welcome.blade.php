@extends('layouts.app')

@section('title', 'Inscription')

<style>
body {
  background-color: #080808;
  color: #fff;
  font-family: 'Arial', sans-serif;
  margin: 0;
  padding: 0;
}

.container {
  max-width: 480px;
  margin: auto;
}

.logo1 {
  display: block;
  margin: 20px auto;
}

h2 {
  color: #FFC848;
  text-align: center;
  font-size: 24px;
  margin-bottom: 10px;
}

.text_welcome,
.text_welcome1 {
  text-align: center;
  font-size: 14px;
  color: #fff;
  margin-bottom: 8px;
}

.container_form {
  background-color: #111;
  padding: 20px;
  border-radius: 15px;
  box-shadow: 0 0 10px rgba(255, 200, 72, 0.2);
}

.container_label {
  margin-bottom: 15px;
}

label.form-label {
  display: block;
  margin-bottom: 6px;
  color: #FFC848;
  font-weight: bold;
}

input.form-control,
select.form-control {
  width: 100%;
  padding: 10px;
  border-radius: 10px;
  border: none;
  background-color: #222;
  color: white;
}

input.form-control:focus,
select.form-control:focus {
  outline: none;
  border: 2px solid #FFC848;
}

.btn-validation {
  text-align: center;
  margin-top: 20px;
}

.btn-primary {
  background-color: #FFC848;
  color: #080808;
  padding: 12px 30px;
  border: none;
  border-radius: 25px;
  font-weight: bold;
  font-size: 16px;
  width: 100%;
  cursor: pointer;
}

.btn-primary:hover {
  background-color: #e6b838;
}

.container_login {
  margin-top: 20px;
  text-align: center;
  font-size: 13px;
  color: #aaa;
}

.container_login a {
  color: #FFC848;
  text-decoration: none;
  font-weight: bold;
}

.container_profile-pic-logo {
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 10px;
  margin-bottom: 15px;
}

.container_profile-pic-logo .logo {
  width: 60px;
  height: auto;
}

.text_data {
  font-size: 12px;
  margin-top: 10px;
  color: #777;
  text-align: center;
}

.nav-register {

  display: flex;
  align-items: center;
  justify-content: space-between;
  position: relative;
  width: 100%;
  margin-top: 50px;
}   
</style>
@section('content')
<div class="nav-register">
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
                Vous avez déjà un compte ? 
                <a href="{{ route('login') }}">
                    Se connecter
                </a>
            </p>

            <p class="text_data">Vos données sont en sécurité. Elles restent strictement confidentielles et ne seront jamais vendues à des tiers.</p>
        </div>

        </div>
        
        

        @endsection
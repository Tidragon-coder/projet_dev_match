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
  transition: background-color 0.3s ease, opacity 0.3s ease;
}

.btn-primary:hover {
  background-color: #e6b838;
}

.btn-primary:disabled {
  background-color: #444;
  color: #aaa;
  cursor: not-allowed;
  opacity: 0.6;
}

.btn-secondary {
  background: none;
  border: none;
  color: #fff;
  font-size: 16px;
  font-weight: bold;
  text-align: right;
  width: 100%;
  margin-bottom: 10px;
  cursor: pointer;
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
</div>

<div class="container">
    <div class="container_form">
        <h2>Bienvenue sur MatchWork !</h2>
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

        <div id="step1">
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

            <div class="btn-validation" style="text-align: right;">
                <button type="button" class="btn-secondary" onclick="showStep2()">Suivant</button>
            </div>
        </div>

        <div id="step2" style="display: none;">
            <div class="container_label">
                <label for="date_naissance" class="form-label">Date de naissance</label>
                <input type="date" class="form-control" id="date_naissance" name="date_naissance">
            </div>

            <div class="container_label">
                <label for="sexe" class="form-label">Sexe</label>
                <select class="form-control" id="sexe" name="sexe">
                    <option value="homme">Homme</option>
                    <option value="femme">Femme</option>
                    <option value="autre">Autre</option>
                </select>
            </div>

            <div class="container_label">
                <label for="localisation" class="form-label">Localisation</label>
                <input type="text" class="form-control" id="localisation" name="localisation">
            </div>

            <div class="container_label">
                <label for="year_experience" class="form-label">Année d'expérience</label>
                <input type="number" class="form-control" id="year_experience" name="year_experience" min="0" max="50">
            </div>

            <div class="container_label">
                <label for="speciality" class="form-label">Spécialité</label>
                <select class="form-control" id="speciality" name="speciality" required>
                    <option value="marketing">Marketing</option>
                    <option value="developpementWeb">Développement web</option>
                    <option value="webdesign">Webdesign</option>
                    <option value="graphiste">Graphiste</option>
                </select>
            </div>

            <div class="btn-validation" style="text-align: space-between;">
                <button type="button" class="btn-secondary" onclick="showStep1()">Retour</button>
                
            </div>
            <button type="submit" class="btn btn-primary" id="submit-btn" disabled>S'inscrire</button>

        </div>
        </form>
    </div>

    <div class="container_login">
        <p class="text_login">
            Vous avez déjà un compte ?
            <a href="{{ route('login') }}">Se connecter</a>
        </p>
        <p class="text_data">Vos données sont en sécurité. Elles restent strictement confidentielles et ne seront jamais vendues à des tiers.</p>
    </div>
</div>

<script>
function showStep2() {
    document.getElementById("step1").style.display = "none";
    document.getElementById("step2").style.display = "block";
    window.scrollTo({ top: 0, behavior: 'smooth' });
}
function showStep1() {
    document.getElementById("step2").style.display = "none";
    document.getElementById("step1").style.display = "block";
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

document.addEventListener('DOMContentLoaded', () => {
  const inputs = document.querySelectorAll('#step2 input, #step2 select');
  const submitBtn = document.getElementById('submit-btn');

  inputs.forEach(input => {
    input.addEventListener('input', checkStep2Fields);
    input.addEventListener('change', checkStep2Fields);
  });

  function checkStep2Fields() {
    let allFilled = true;
    inputs.forEach(input => {
      if (input.value.trim() === '') {
        allFilled = false;
      }
    });
    submitBtn.disabled = !allFilled;
  }
});
</script>
@endsection

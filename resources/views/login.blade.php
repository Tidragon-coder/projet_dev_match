@extends('layouts.app')

@section('title', 'Inscription')

<style>
body {
  background-color: #080808;
  color: #fff;
  font-family: 'Arial', sans-serif;
  margin: 0;
  padding: 0;
  height: 100vh;
}

.container,
.container1 {
  padding: 20px;
  max-width: 100%;
  margin: 0;
  min-height: calc(100vh - 100px);
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.logo1 {
  display: block;
  margin: 30px auto 10px auto;
  width: 100px;
  height: auto;
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

.container_form1 {
  background-color: #111;
  padding: 20px;
  border-radius: 15px;
  box-shadow: 0 0 10px rgba(255, 200, 72, 0.2);
}

.container_label {
  margin-bottom: 15px;
}

label.form-label,
label.form_label {
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

button[form="login-form"] {
  display: block;
  margin: 20px auto 0 auto;
  max-width: 300px;
  width: 100%;
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


<div class="container1">
<div class="container_form1">
        <h2>Bienvenue sur MatchWork ! </h2>
        <p class="text_welcome">Trouvez des profils complémentaires et formez l’équipe parfaite.</p>
        
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
        
        <form id="login-form" method="POST" action="{{ route('login.submit') }}" class="space-y-4">
            @csrf
            <div class="container_label">
                <label for="email" class="form_label">Email</label>
                <input type="email" name="email" id="email" placeholder="Votre email" class="form-control">
            </div>
            
            <div class="container_label">
                <label for="password" class="form_label">Mot de passe</label>
                <input type="password" name="password" id="password" placeholder="Votre mot de passe" class="form-control">
            </div>
            
            <!-- <div class="flex items-center">
                <input type="checkbox" name="remember" id="remember" class="form-control">
                <label for="remember" class="ml-2 block text-sm text-slate-300">Se souvenir de moi</label>
            </div> -->
            
            
        </form>
       
    </div>

    <button form="login-form" type="submit" class="btn btn-primary">
                    Se connecter
                </button>

    <div>
             
   

    <div class="container_login">
            <p class="text_login">
            Vous n’avez pas de compte ? 
                <a href="{{ route('register') }}">
                Créer votre compte
                </a>
            </p>
        </div>
        </div>
        
        

        @endsection
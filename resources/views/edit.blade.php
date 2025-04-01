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
    margin: 50px auto;
    padding: 20px;
    background-color: #111;
    border-radius: 15px;
    box-shadow: 0 0 15px rgba(255, 200, 72, 0.1);
}

h2 {
    color: #FFC848;
    text-align: center;
    margin-bottom: 20px;
}

.form-label {
    color: #FFC848;
    font-weight: bold;
    margin-bottom: 8px;
    display: block;
}

.form-control {
    width: 100%;
    padding: 12px;
    border-radius: 10px;
    background-color: #222;
    color: #fff;
    border: none;
    margin-bottom: 20px;
    resize: none;
}

.form-control:focus {
    outline: none;
    border: 2px solid #FFC848;
}

.btn-primary {
    background-color: #FFC848;
    color: #080808;
    padding: 12px 24px;
    font-weight: bold;
    border-radius: 25px;
    border: none;
    cursor: pointer;
    display: block;
    margin: 20px auto;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #e6b838;
}

.back-link {
    display: block;
    text-align: center;
    color: #FFC848;
    text-decoration: none;
    margin-top: 20px;
    font-weight: bold;
}

.back-link:hover {
    text-decoration: underline;
}

input[type="file"] {
    display: none;
}

.label-file {
    display: block;
    width: 100%;
    padding: 12px;
    background-color: #222;
    color: #fff;
    text-align: center;
    border-radius: 10px;
    cursor: pointer;
    margin-bottom: 20px;
    border: 2px dashed #FFC848;
    transition: background-color 0.3s ease;
}

.label-file:hover {
    background-color: #333;
}

.hidden {
    display: none;
}

    </style>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Modifier le Profil</h2>
        
        <form action="{{ route('update') }}" method="POST" enctype="multipart/form-data">

            @csrf
            
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="pseudo" class="form-label">Pseudo</label>
                <input type="text" name="pseudo" id="pseudo" class="form-control" value="{{ old('pseudo', $user->pseudo) }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe (laisser vide pour ne pas changer)</label>
                <input type="password" name="password" id="password" class="form-control" autocomplete="new-password" required>
            </div>

            <div class="mb-3">
                <label for="date_naissance" class="form-label">Date de naissance</label>
                <input type="date" name="date_naissance" id="date_naissance" class="form-control" value="{{ old('date_naissance', $user->date_naissance) }}" required>
            </div>



            <div class="mb-3">
                <label for="sexe" class="form-label">Sexe</label>
                <select name="sexe" id="sexe" class="form-control" required>
                    <option value="Homme" {{ $user->sexe == 'homme' ? 'selected' : '' }}>Homme</option>
                    <option value="Femme" {{ $user->sexe == 'femme' ? 'selected' : '' }}>Femme</option>
                    <option value="Autre" {{ $user->sexe == 'autre' ? 'selected' : '' }}>Autre</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="speciality" class="form-label">Spécialité</label>
                <input type="text" name="speciality" id="speciality" class="form-control" value="{{ old('speciality', $user->speciality) }}" required>
            </div>

            <div class="mb-3">
                <label for="localisation" class="form-label">localisation</label>
                <input type="text" name="localisation" id="localisation" class="form-control" value="{{ old('speciality', $user->localisation) }}" required>
            </div>

            <div class="mb-3">
                <label for="biography" class="form-label">Biographie (max 250 caractères)</label>
                <textarea name="biography" id="biography" class="form-control" maxlength="250" value="{{ old('biography', $user->biography) }}"></textarea>
            </div>

            <div class="mb-3">
                <label for="center_interest" class="form-label">Centre d'interet en 3 mots (max 40 caractères)</label>
                <input type="text" name="center_interest" id="center_interest" class="form-control" maxlength="40" value="{{ old('center_interest', $user->center_interest) }}"></textarea>
            </div>

            <div class="mb-3">
                <label for="phone_number" class="form-label">Numéro de téléphone</label>
                <input type="number" name="phone_number" id="phone_number" class="form-control" value="{{ old('phone_number', $user->phone_number) }}"></textarea>
            </div>

            <div class="mb-3">
                <label for="year_experience" class="form-label">Années d'expérience</label>
                <input type="number" name="year_experience" id="year_experience" class="form-control" value="{{ old('year_experience', $user->year_experience) }}">
            </div>
            <div class="mb-3">
            <label class="block w-full px-4 py-2 bg-slate-700 border border-slate-600 rounded-md text-white hover:bg-slate-600 cursor-pointer text-center">
                <span class="text_choose_img">Choisir une image</span>
                <input type="file" name="profile_picture" id="profile_picture" accept="image/*" class="hidden">
            </label>
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>

        <a href="{{ route('profile') }}" class="back-link">Retour au profil</a>
    </div>
</body>


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
                <label for="age" class="form-label">Âge</label>
                <input type="number" name="age" id="age" class="form-control" value="{{ old('age', $user->age) }}" required>
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
                <label for="biography" class="form-label">Biographie</label>
                <textarea name="biography" id="biography" class="form-control">{{ old('biography', $user->biography) }}</textarea>
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
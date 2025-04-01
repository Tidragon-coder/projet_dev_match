<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function register(Request $request)
    {
        try {
            // Validation des données du formulaire
            $request->validate([
                'name' => 'required|string|max:255',
                'pseudo' => 'required|string|max:255|unique:users',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:4',
                'age'=> 'nullable|int',
                'sexe'=> 'nullable',
                'speciality'=> 'required|string',
                'profile_picture'=> 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

             // Gestion de l'upload de l'image de profil
            if ($request->hasFile('profile_picture')) {
                $imagePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            } else {
                $imagePath = null; // Pas d'image fournie
            }
    
            // Création de l'utilisateur
            $user = User::create([
                'name' => $request->name,
                'pseudo' => $request->pseudo,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'speciality' => $request->speciality,
                'sexe' => $request->sexe,
                'age' => $request->age,
                'profile_picture' => $imagePath,
            ]);
    
            // Connexion automatique de l'utilisateur
            auth()->login($user);
    
            // Si la requête est une requête AJAX ou API
            if ($request->wantsJson()) {
                $token = $user->createToken('auth_token')->plainTextToken;
                return response()->json([
                    'message' => 'User registered successfully',
                    'user' => $user,
                    'token' => $token
                ], 201);
            }
    
            // Si c'est une requête classique, rediriger vers la page de login
            return redirect()->route('login')->with('success', 'Registration successful! Please login.');
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Gestion des erreurs de validation
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            // Gestion des erreurs générales
            return redirect()->back()->with('error', 'Error creating user: ' . $e->getMessage())->withInput();
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            $user = auth()->user();
            $user->last_login_at = Carbon::now();
            $user->save();

            $token = $user->createToken('auth_token')->plainTextToken;

            // Vérifier si la requête est AJAX ou API
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'User logged in successfully',
                    'user' => $user,
                    'token' => $token
                ], 200);
            }
            
            return redirect()->route('profile');
        }

        // Gérer l'échec d'authentification
        if ($request->expectsJson()) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }

    
    public function profile()
    {
        $user = auth()->user();
        
        if (!$user) {
            return redirect()->route('login')->with('error', 'You are not logged in');
        }

        return view('profile', compact('user')); // Retourne la vue au lieu du JSON
    }


    public function logout(Request $request) {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logged out'], 200);
    }

    public function update(Request $request)
    {
       
            // Validation des données du formulaire
            $validatedData = $request->validate([
                'name' => 'required|string|max:255' . auth()->id(),
                'pseudo' => 'required|string|max:255|unique:users,pseudo,' . auth()->id(),
                'email' => 'required|email|unique:users,email,' . auth()->id(),
                'password' => 'nullable|string|min:4',
                'age' => 'required|integer',
                'sexe' => 'required|string|max:10',
                'speciality' => 'required|string|max:100',
                'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
                'biography' => 'nullable|string',
                'year_experience' => 'nullable|integer',
            ]);

            // Gestion du mot de passe (ne pas le mettre à jour s'il est vide)
            if ($request->filled('password')) {
                $validatedData['password'] = bcrypt($request->password);
             } else {
            unset($validatedData['password']);
            }

    // Gestion de l'upload de l'image
    if ($request->hasFile('profile_picture')) {
        $imagePath = $request->file('profile_picture')->store('profile_pictures', 'public');
        $validatedData['profile_picture'] = $imagePath;
    }
            
        
            // Mise à jour des informations de l'utilisateur
            auth()->user()->update($validatedData);

            return redirect()->route('profile')->with('success', 'Profil mis à jour !');   
    }

    public function showedit()
    {
        return view('edit', ['user' => auth()->user()]);
    }


    public function showRegister()
    {
        return view('welcome'); // Affiche la vue d'inscription
    }

    public function showLogin() {
        return view('login');
    }

    public function webLogout() {
        auth()->logout();
        return redirect()->route('welcome')->with('success', 'Logged out successfully');
    }


    public function randomProfile()
    {
        $user = \App\Models\User::inRandomOrder()->first();
        return view('match', ['user' => $user]);
    }

    

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function register(Request $request)
    {
        try {
            // Validation des données du formulaire
            $request->validate([
                'name' => 'required|string|max:255|unique:users',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:4',
                'age'=> 'required|int',
                'sexe'=> 'required',
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

    public function update(Request $request, $id)
    {
        try {
            $user = User::find($id);
            if (!$user) {
                return response()->json(['message' => 'User not found'], 404);
            }

            $validatedData = $request->validate([
                'name' => 'required|string|max:255|unique:users,name,' . $user->id,
                'email' => 'required|email|unique:users,email,' . $user->id,
                'password' => 'nullable|string|min:4',
                'age' => 'required|integer',
                'sexe' => 'required|string|max:10',
                'speciality' => 'required|string|max:100',
                'profile_picture' => 'nullable|string',
                'biography' => 'nullable|string',
                'year_experience' => 'nullable|integer',
            ]);


            if ($request->filled('password')) {
                $validatedData['password'] = bcrypt($request->password);
            }


            if (!empty($validatedData)) {
                $user->update($validatedData);
            }


            $user->refresh();

            return response()->json([
                'message' => 'User updated successfully',
                'user' => $user
            ], 200);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json([
                'message' => 'Database error',
                'error' => $e->getMessage()
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Unexpected error',
                'error' => $e->getMessage()
            ], 500);
        }
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
    

}

<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Projet::with('user')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    // Ajouter un projet

    public function store(Request $request)
    {

        $userProjectsCount = Projet::where('user_id', auth()->id())->count();
        $max_projects = 3;

        if ($userProjectsCount >= $max_projects) {
            return redirect()->route('profile')->with([
                'popupMessage' => 'Vous avez atteint la limite de 3 projets ! <br> Débloquez MatchWork Max pour plus de projets !',
                'popupColor' => '#FF4C4C' 
            ]);
        }
        else   {
            
            $request->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'description' => 'nullable|string',
            ]);
    
            $path = $request->file('photo')->store('images', 'public');
            $projet = Projet::create([
                'user_id' => auth()->id(),
                'photo' => $path,
                'description' => $request->description,
            ]);
    
             // Vérifier si la requête vient du navigateur ou de Postman
        if ($request->expectsJson()) {
            // Si la requête attend un JSON (comme dans Postman), retourner la réponse JSON
            return response()->json($projet, 201);
        } else {
            // Si la requête vient d'un formulaire via navigateur, rediriger vers la vue avec les projets
            return redirect()->route('profile')->with([
                'popupMessage' => 'Projet ajouté !',
                'popupColor' => 'rgb(49, 184, 49)' 
            ]);
        }
        }

        

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Récupérer le projet à partir de l'ID
        $projet = Projet::findOrFail($id);
    
        // Vérifier si le projet appartient à l'utilisateur connecté
        if ($projet->user_id !== auth()->id()) {
            return response()->json(['error' => 'Non autorisé'], 403);
        }
    
        // Supprimer le fichier de l'image stockée
        Storage::disk('public')->delete($projet->photo);
    
        // Supprimer le projet de la base de données
        $projet->delete();
    
        // Si la requête est faite via une API (par exemple, via Postman), renvoyer un JSON
        if (request()->ajax() || request()->wantsJson()) {
            return response()->json(['message' => 'Projet supprimé']);
        }
    
        // Sinon, rediriger l'utilisateur vers sa page de profil
        return redirect()->route('profile')->with([
            'popupMessage' => 'Projet supprimé !',
            'popupColor' => 'rgb(243, 156, 34)' 
        ]);
    }
    


    public function indexView()
    {
        $projets = Projet::where('user_id', auth()->id())->get(); // Récupérer uniquement les projets de l'utilisateur connecté
        return view('profile', compact('projets'));
    }

}

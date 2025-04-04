<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class feedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Projet::with('user')->get();
    }

    public function feedback(Request $request){
       
        // Valider les données
        $request->validate([
            'feedback' => 'required|string|max:1000',
        ]);

        // Créer le feedback
        Feedback::create([
            'user_id'=> auth()->id(), 
            'feedback' => $request->input('feedback'),
        ]);
        

        // Redirection avec message de succès
        // return response()->json([
        //     'message' => 'Feedback enregistré avec succès.',
        // ], 201);

        return redirect()->route('feedback')->with([
            'popupMessage' => 'Comentaire envoyé !',
            'popupColor' => 'rgb(49, 184, 49)' 
        ]);
    }
    
    public function showfeedback(){
        return view('feedback');
    }

}

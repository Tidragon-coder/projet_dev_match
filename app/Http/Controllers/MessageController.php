<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\UserMatch;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class MessageController extends Controller {
    // Récupérer les messages d'un match
    public function index($match_id) {
        $user = Auth::user();

        // Vérifier si l'utilisateur appartient bien au match
        $match = UserMatch::where('id', $match_id)
            ->where(function($query) use ($user) {
                $query->where('user1_id', $user->id)
                      ->orWhere('user2_id', $user->id);
            })->first();

        // if (!$match) {
        //     return response()->json(['message' => 'Accès refusé'], 403);
        // }

        // $messages = Message::where('match_id', $match_id)->orderBy('created_at')->get();

        // return response()->json($messages);

        if (!$match) {
            return redirect()->route('dashboard')->with('error', 'Accès refusé.');
        }
    
        // Récupérer les messages du match
        $messages = Message::where('match_id', $match_id)
            ->orderBy('created_at', 'asc')
            ->get();
    
            return view('message', compact('messages', 'match'));
    }

    // Envoyer un message
    public function store(Request $request) {
        try {

            $request->validate([
                'match_id' => 'required|exists:matches,id',
                'content' => 'required|string',
            ]);

            $user = Auth::user();
            $match = UserMatch::where('id', $request->match_id)
                ->where(function($query) use ($user) {
                    $query->where('user1_id', $user->id)
                        ->orWhere('user2_id', $user->id);
                })->first();

            if (!$match) {
                return response()->json(['message' => 'Accès refusé'], 403);
            }

            $message = Message::create([
                'match_id' => $request->match_id,
                'sender_id' => $user->id,
                'content' => $request->content,
            ]);

            return response()->json(['message' => 'Message envoyé', 'data' => $message], 201);
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Gestion des erreurs de validation
            return response()->json('error', 'Error creating user: ' . $e->getMessage())->withInput();
        } catch (\Exception $e) {
            // Gestion des erreurs générales
            return response()->json('error', 'Error creating user: ' . $e->getMessage())->withInput();
        }
    }
}


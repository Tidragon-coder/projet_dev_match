<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\UserMatch;
use Illuminate\Support\Facades\Auth;

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

        if (!$match) {
            return response()->json(['message' => 'Accès refusé'], 403);
        }

        $messages = Message::where('match_id', $match_id)->orderBy('created_at')->get();

        return response()->json($messages);
    }

    // Envoyer un message
    public function store(Request $request) {
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
    }
}


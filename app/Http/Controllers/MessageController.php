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
            return redirect()->route('match')->with('error', 'Accès refusé.');
        }
    
        // Récupérer les messages du match
        $messages = Message::where('match_id', $match_id)
            ->orderBy('created_at', 'asc')
            ->get();
    
            return view('messages.message', compact('messages', 'match'));
    }

    // Envoyer un message
    public function store(Request $request)
    {
        try {
            $request->validate([
                'match_id' => 'required|exists:matches,id',
                'content' => 'required|string',
            ]);
    
            $user = Auth::user();
            $match = UserMatch::where('id', $request->match_id)
                ->where(function ($query) use ($user) {
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
    
            // ✅ Si c'est une requête AJAX / API -> Retour JSON
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Message envoyé', 'data' => $message], 201);
            }
    
            // ✅ Sinon, on redirige vers la page de la conversation
            return redirect()->route('messages.index', ['match_id' => $request->match_id])
                             ->with('success', 'Message envoyé avec succès !');
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return back()->with('error', 'Une erreur est survenue : ' . $e->getMessage())->withInput();
        }
    }
    

    public function listConversations()
{
    $user = Auth::user();

    // Récupérer tous les matchs de l'utilisateur
    $matches = UserMatch::where('user1_id', $user->id)
                        ->orWhere('user2_id', $user->id)
                        ->get();

    return view('messages.list', compact('matches'));
}
}


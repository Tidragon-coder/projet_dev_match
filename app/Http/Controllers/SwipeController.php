<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Swipe;
use App\Models\UserMatch;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SwipeController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'swiped_user_id' => 'required|exists:users,id',
            'direction' => 'required|in:match,pass',
        ]);
    
        $user = Auth::user(); // Utilisateur authentifié
        $targetUserId = $request->swiped_user_id;
        $direction = $request->direction;
    
        // Empêcher de swiper soi-même
        if ($user->id == $targetUserId) {
            return $this->responseHandler($request, 'Impossible de swiper votre propre profil.', 400);
        }
    
        // Vérifier si le swipe existe déjà
        $existingSwipe = Swipe::where('swiper_user_id', $user->id)
                              ->where('swiped_user_id', $targetUserId)
                              ->first();
    
        if ($existingSwipe) {
            return $this->responseHandler($request, 'Vous avez déjà swipé ce profil.', 400);
        }
    
        // Enregistrer le swipe
        Swipe::create([
            'swiper_user_id' => $user->id,
            'swiped_user_id' => $targetUserId,
            'direction' => $direction,
        ]);
    
        // Vérifier si c'est un match réciproque
        if ($direction === 'match') {
            $reciprocalSwipe = Swipe::where('swiper_user_id', $targetUserId)
                                    ->where('swiped_user_id', $user->id)
                                    ->where('direction', 'match')
                                    ->first();
    
            if ($reciprocalSwipe) {
                // Créer le match
                UserMatch::create([
                    'user1_id' => min($user->id, $targetUserId),
                    'user2_id' => max($user->id, $targetUserId),
                ]);
    
                return $this->responseHandler($request, '✨ Match trouvé !');
            }
        }
    
        return $this->responseHandler($request, 'Swipe enregistré.');
    }
    
    /**
     * Gère la réponse JSON ou redirige vers la vue match.blade.php
     */
    private function responseHandler($request, $message, $status = 200)
    {
        if ($request->expectsJson() || $request->ajax()) {
            return response()->json(['message' => $message], $status);
        }
    
        // Retourner à la vue avec un message flash
        return redirect()->route('match')->with('message', $message);
    }
}

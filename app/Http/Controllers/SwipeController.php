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

        $user = Auth::user(); // utilisateur connecté
        $targetUserId = $request->swiped_user_id;
        $direction = $request->direction;

        // Empêcher de swiper soi-même
        if ($user->id == $targetUserId) {
            return response()->json(['message' => 'Impossible de swiper votre propre profil.'], 400);
        }

        // Vérifier si le swipe existe déjà
        $existingSwipe = Swipe::where('swiper_user_id', $user->id)
                              ->where('swiped_user_id', $targetUserId)
                              ->first();

        if ($existingSwipe) {
            return response()->json(['message' => 'Vous avez déjà swipé ce profil.'], 400);
        }

        // Enregistrement du swipe
        $swipe = Swipe::create([
            'swiper_user_id' => $user->id,
            'swiped_user_id' => $targetUserId,
            'direction' => $direction,
        ]);

        // Si l'utilisateur a "matché", vérifier la réciprocité
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

                return response()->json(['message' => '✨ Match trouvé !'], 200);
            }
        }

        return response()->json(['message' => 'Swipe enregistré.'], 200);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Swipe;
use App\Models\UserMatch;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class SwipeController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'swiped_user_id' => 'required|exists:users,id',
            'direction' => 'required|in:match,pass',
        ]);

        $user = Auth::user();
        $targetUserId = $request->swiped_user_id;
        $direction = $request->direction;

        // Limite de 10 swipes par jour
        $todaySwipeCount = Swipe::where('swiper_user_id', $user->id)
            ->whereDate('created_at', Carbon::today())
            ->count();

        if ($todaySwipeCount >= 10) {
            return $this->responseHandler($request, "Vous avez atteint la limite de 10 swipes pour aujourd'hui.", 403, true);
        }

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
    private function responseHandler($request, $message, $status = 200, $isLimit = false)
    {
        if ($request->expectsJson() || $request->ajax()) {
            return response()->json(['message' => $message], $status);
        }

        // Si on atteint la limite, on envoie un message spécifique
        if ($isLimit) {
            return redirect()->route('match')->with('popupMessage', $message);
        }

        return redirect()->route('match')->with('message', $message);
    }
}

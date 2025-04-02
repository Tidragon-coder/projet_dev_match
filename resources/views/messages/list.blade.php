@extends('layouts.app')

@section('content')
<div class="nav-register-login">
    <img class="logo1" src="images/logo.png" alt="Logo" width="100px">
</div>
<h2 class="title_messagerie">Vos discussions</h2>
<a href="{{ route('profile') }}"> profile</a>

<div class="container_all_list_message">
    

    
    <div class="container_list_messages">
    <ul>
    @foreach ($matches as $match)
        @php
            // Identifier l'autre utilisateur du match
            $otherUser = ($match->user1_id == auth()->id()) ? $match->user2 : $match->user1;

            // Récupérer le dernier message (envoyé ou reçu)
            $lastMessage = $match->messages()->latest()->first();
        @endphp
        <li style="display: flex; align-items: center; padding: 15px; border-bottom: 2px solid #FFC848;">
            <!-- Photo de profil -->
            <img src="{{ asset('storage/' . $otherUser->profile_picture) }}" alt="Photo de profil" 
                 style="width: 50px; height: 50px; border-radius: 50%; margin-right: 10px;">

            <!-- Infos utilisateur -->
            <div class="infos_users_message">
                <a href="{{ route('messages.index', ['match_id' => $match->id]) }}">
                    {{ $otherUser->name }} - {{ $otherUser->speciality }}
                </a>

                <small>
                    @if ($lastMessage)
                        @if ($lastMessage->sender_id == auth()->id())
                            ✉️ Envoyé {{ $lastMessage->created_at->diffForHumans() }}
                        @else
                            📩 Reçu {{ $lastMessage->created_at->diffForHumans() }}
                        @endif
                    @else
                        Aucun message
                    @endif
                </small>
            </div>
        </li>
    @endforeach
</ul>
</div>

</div>
@endsection

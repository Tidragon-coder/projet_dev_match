@extends('layouts.app')

@section('title', 'match')

@section('content')
<div class="nav-register-login">
    <img class="logo1" src="../images/logo.png" alt="Logo" width="100px">
</div>
<div class="container">
    <h2 class="title_messagerie">Conversation avec {{ $match->user1_id == auth()->id() ? $match->user2->name : $match->user1->name }}</h2>
    
    <div class="messages-box">
        @foreach ($messages as $message)
            <div class="message {{ $message->sender_id == auth()->id() ? 'sent' : 'received' }}">
                <p>{{ $message->content }}</p>
                <small>{{ $message->created_at->format('H:i') }}</small>
            </div>
        @endforeach
    </div>

    <form action="{{ route('messages.store') }}" method="POST">
        @csrf
        <input type="hidden" name="match_id" value="{{ $match->id }}">
        <textarea class="textarea_message" name="content" placeholder="Écrire un message..." required></textarea>
        <button class="btn-send-msg" type="submit">Envoyer</button>
    </form>

    
</div>

<!-- <a href="{{ route('messages.list') }}"> retour aux listes</a> -->




@endsection


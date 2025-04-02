@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Conversation</h2>

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
        <textarea name="content" placeholder="Écrire un message..." required></textarea>
        <button type="submit">Envoyer</button>
    </form>
</div>

<style>
    .messages-box {
        max-height: 300px;
        overflow-y: scroll;
        border: 1px solid #ddd;
        padding: 10px;
    }
    .message {
        padding: 8px;
        border-radius: 10px;
        margin: 5px 0;
        max-width: 70%;
    }
    .sent {
        background: #dcf8c6;
        align-self: flex-end;
        text-align: right;
    }
    .received {
        background: #f1f1f1;
        align-self: flex-start;
    }
</style>
@endsection

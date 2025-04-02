@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Mes Conversations</h2>

    <ul>
        @foreach ($matches as $match)
            @php
                $otherUser = ($match->user1_id == auth()->id()) ? $match->user2 : $match->user1;
            @endphp
            <li>
                <a href="{{ route('messages.index', ['match_id' => $match->id]) }}">
                    Conversation avec {{ $otherUser->name }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
@endsection

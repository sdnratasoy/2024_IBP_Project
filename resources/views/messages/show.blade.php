@extends('layout')
@section('title', 'Mesajlaşma')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">{{ $user->name }} ile Mesajlaşma</div>
        <div class="card-body">
            <div class="messages">
                @foreach ($messages as $message)
                    <div class="message {{ $message->from_user_id == Auth::id() ? 'sent' : 'received' }}">
                        <p>{{ $message->content }}</p>
                        <small>{{ $message->created_at->diffForHumans() }}</small>
                        @if($message->from_user_id == Auth::id())
                            @if($message->is_read)
                                <i class="fas fa-check-double seen-icon"></i>
                            @else
                                <i class="fas fa-check single-icon"></i>
                            @endif
                        @endif
                    </div>
                @endforeach
            </div>
            <form action="{{ route('messages.store', $user) }}" method="POST">
                @csrf
                <input type="hidden" name="admin_id" value="{{ $user->id }}">
                <div class="form-group">
                    <textarea name="content" class="form-control" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Gönder</button>
            </form>
        </div>
    </div>
</div>
<style>
    .messages {
        max-height: 500px;
        overflow-y: auto;
        margin-bottom: 20px;
    }
    .message {
        margin-bottom: 10px;
        padding: 10px;
        border-radius: 5px;
    }
    .sent {
        background-color: #e0f7fa;
        text-align: right;
    }
    .received {
        background-color: #f1f8e9;
    }
    .message small {
        display: block;
        margin-top: 5px;
        color: #777;
    }
    .message i {
        margin-left: 5px;
    }
    .single-icon {
        color: grey;
    }
    .seen-icon {
        color: green;
    }
</style>
@endsection
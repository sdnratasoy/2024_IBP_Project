@extends('layout')
@section('title', 'Mesajlaşma')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Mesajlar</div>
        <div class="card-body">
            <a href="{{ route('messages.create') }}" class="btn btn-primary mb-3">Yeni Mesaj</a>
            @if ($messages->isEmpty())
                <p>Hiç mesajınız yok.</p>
            @else
                <ul class="list-group">
                    @foreach ($messages as $userId => $userMessages)
                        <li class="list-group-item">
                            <a href="{{ route('messages.show', $userId) }}">
                                {{ $userMessages->first()->from_user_id == Auth::id() ? $userMessages->first()->toUser->name : $userMessages->first()->fromUser->name }}
                                @if ($userMessages->where('is_read', false)->count() > 0)
                                    <i class="fas fa-envelope"></i>
                                @endif
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>
@endsection
@extends('layout')

@section('title', 'Yeni Mesaj')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Yeni Mesaj</div>
        <div class="card-body">
            <form action="{{ route('messages.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="admin">Admin Seç</label>
                    <select name="admin_id" id="admin" class="form-control" required>
                        @foreach ($admins as $admin)
                            <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="content">Mesaj</label>
                    <textarea name="content" id="content" class="form-control" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Gönder</button>
            </form>
        </div>
    </div>
</div>
@endsection
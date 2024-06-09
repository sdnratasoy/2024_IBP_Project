@extends('layout')

@section('title', 'Profil Sayfası')

@section('content')
<div class="container">
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
            <p class="text-muted text-center">{{ Auth::user()->email }}</p>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <div class="card card-primary card-outline mt-3">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('update-password') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="current_password">Mevcut Şifre</label>
                    <input type="password" name="current_password" id="current_password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="new_password">Yeni Şifre</label>
                    <input type="password" name="new_password" id="new_password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="new_password_confirmation">Yeni Şifre (Tekrar)</label>
                    <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Şifreyi Güncelle</button>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>


@endsection
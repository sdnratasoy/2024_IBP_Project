@extends('layout')
@section('title', 'Kullanıcı Düzenle')
@section('content')
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Kullanıcı Düzenle</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Yönetim Paneli</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin/users') }}">Kullanıcı Yönetimi</a></li>
            <li class="breadcrumb-item active">Kullanıcı Düzenle</li>
        </ol>
        </div>
    </div>
    </div>
</section>

<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Kullanıcı Düzenle</h3>
        </div>
        <form action="{{ route('admin.update', $user->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Ad:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label for="email">E-posta:</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Kaydet</button>
            </div>
        </form>
    </div>
</div>
@endsection
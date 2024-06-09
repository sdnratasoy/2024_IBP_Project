@extends('layout')
@section('title', 'Yeni Kullanıcı Tanımla')
@section('content')
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Yeni Kullanıcı Tanımla</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Yönetim Paneli</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin/users') }}">Kullanıcı Yönetimi</a></li>
            <li class="breadcrumb-item active">Yeni Kullanıcı Tanımla</li>
        </ol>
        </div>
    </div>
    </div>
</section>
<div class="container">
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Yeni Kullanıcı Tanımla</h3>
        </div>
        <form action="{{ route('admin.addUser') }}" method="POST">
            @csrf
            @method('POST')
            <div class="card-body">
                <div class="form-group">
                    <label for="name">İsim Soy İsim</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">E-posta</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Şifre</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Kaydet</button>
            </div>
        </form>
    </div>
</div>
@endsection
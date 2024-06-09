@extends('layout')

@section('title', 'Yeni Duyuru Ekle')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Yeni Duyuru Ekle</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Yönetim Paneli</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/admin/announcements') }}">Duyuru Yönetimi</a></li>
                    <li class="breadcrumb-item active">Yeni Duyuru Ekle</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <form action="{{ route('admin.announcements.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Başlık</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="content">İçerik</label>
            <textarea class="form-control" id="content" name="content" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kaydet</button>
    </form>
</div>
@endsection

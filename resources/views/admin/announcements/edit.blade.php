@extends('layout')

@section('title', 'Duyuru Düzenle')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Duyuru Düzenle</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Yönetim Paneli</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/admin/announcements') }}">Duyuru Yönetimi</a></li>
                    <li class="breadcrumb-item active">Duyuru Düzenle</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <form action="{{ route('admin.announcements.update', $announcement) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="title">Başlık</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $announcement->title }}" required>
        </div>
        <div class="form-group">
            <label for="content">İçerik</label>
            <textarea class="form-control" id="content" name="content" required>{{ $announcement->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Güncelle</button>
    </form>
</div>
@endsection

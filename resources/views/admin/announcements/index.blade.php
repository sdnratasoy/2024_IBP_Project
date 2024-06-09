@extends('layout')

@section('title', 'Duyuru Yönetimi')

@section('content')
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Duyuru Yönetimi</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Yönetim Paneli</a></li>
            <li class="breadcrumb-item active">Duyuru Yönetimi</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>
<div class="container">
    <a href="{{ route('admin.announcements.create') }}" class="btn btn-success mb-3">Yeni Duyuru Ekle</a>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Kayıtlı Duyurular</h3>
            <div class="card-tools">
                <form action="{{ route('admin.announcements.searchAnnouncements') }}" method="GET">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="search" class="form-control float-right" placeholder="Başlık veya İçerik Ara">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Başlık</th>
                            <th scope="col">İçerik</th>
                            <th scope="col">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($announcements as $announcement)
                        <tr>
                            <td>{{ $announcement->title }}</td>
                            <td style="max-width: 300px; word-wrap: break-word;">{{ $announcement->content }}</td>
                            <td>
                                <a href="{{ route('admin.announcements.edit', $announcement) }}" class="btn btn-warning">Düzenle</a>
                                <form action="{{ route('admin.announcements.delete', $announcement) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Sil</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">Duyuru bulunamadı.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layout')
@section('title', 'Kullanıcı Yönetimi')
@section('content')
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Kullanıcı Yönetimi</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Yönetim Paneli</a></li>
            <li class="breadcrumb-item active">Kullanıcı Yönetimi</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>
<div class="container">
    <a href="{{ route('admin.create') }}" class="btn btn-success mb-3">Yeni Kullanıcı Tanımla</a>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Kayıtlı Kullanıcılar</h3>
            <div class="card-tools">
                <form action="{{ route('admin.search') }}" method="GET">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="search" class="form-control float-right" placeholder="Ad Ara">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ad</th>
                        <th>E-posta</th>
                        <th>Roller</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach ($user->roles as $role)
                                    {{ $role->name }}<br>
                                @endforeach
                            </td>
                            <td>
                                <a class="btn btn-info" href="{{ route('admin.edit', $user->id) }}">Düzenle</a>
                            </td>
                            <td>
                                <form action="{{ route('admin.delete', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Sil</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">Kullanıcı bulunamadı.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
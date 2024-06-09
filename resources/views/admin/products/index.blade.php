@extends('layout')
@section('title', 'Ürün Yönetimi')
@section('content')
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Ürün Yönetimi</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Yönetim Paneli</a></li>
            <li class="breadcrumb-item active">Ürün Yönetimi</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>
<div class="container">
<a href="{{ route('admin.products.create') }}" class="btn btn-success mb-3">Yeni Ürün Ekle</a>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Kayıtlı Ürünler</h3>
        <div class="card-tools">
            <form action="{{ route('admin.products.searchProducts') }}" method="GET">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="search" class="form-control float-right" placeholder="Ürün Adı Ara">
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
                    <th>Ürün Adı</th>
                    <th>Açıklama</th>
                    <th>Fiyat</th>
                    <th>Fotoğraf</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td style="word-wrap: break-word;">{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <img src="{{ $product->imageurl }}" alt="{{ $product->name }}" style="max-width: 100px;">
                        </td>
                        <td>
                            <a class="btn btn-info" href="{{ route('admin.products.edit', $product->id) }}">Düzenle</a>
                        </td>
                        <td>
                            <form action="{{ route('admin.products.delete', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Sil</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">Ürün bulunamadı.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

</div>
@endsection
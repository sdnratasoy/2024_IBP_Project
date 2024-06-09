@extends('layout')
@section('title', 'Ürün Oluştur')
@section('content')
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Ürün Oluştur</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Yönetim Paneli</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/admin/products') }}">Ürün Yönetimi</a></li>
            <li class="breadcrumb-item active">Ürün Oluştur</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>
<div class="container">
    <form action="{{ route('admin.products.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" required>
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" required>
        </div>
        <div class="form-group">
            <label for="imageurl">Image URL</label>
            <input type="text" class="form-control" id="imageurl" name="imageurl" oninput="previewImage()">
            <img id="image-preview" src="#" alt="Image Preview" style="display: none; max-width: 200px; max-height: 200px;">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
<script>
function previewImage() {
    var imageUrl = document.getElementById('imageurl').value;
    var imagePreview = document.getElementById('image-preview');
    if (imageUrl.trim() !== '') {
        imagePreview.src = imageUrl;
        imagePreview.style.display = 'block';
    } else {
        imagePreview.style.display = 'none';
    }
}
</script>
@endsection
@extends('layout')
@section('title','Dashboard')
@section('content')
<div class="card card-default">
    <div class="card-header border-0">
        <h3 class="card-title">
            <i class="fas fas fa-bullhorn mr-1"></i>
            Duyurular
        </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        @foreach($announcements as $announcement)
            <div class="callout callout-danger">
                <h5>{{ $announcement->title }}</h5>

                <p>{{ $announcement->content }}</p>
            </div>
        @endforeach
    </div>
</div>
<!-- /.card -->

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Haftanın Ürünleri</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach($products as $key => $product)
                        <li data-target="#carouselExampleIndicators" style="color:black;" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @foreach($products as $key => $product)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }} text-center">
                            <img style="max-height:30vw;" src="{{ $product->imageurl }}" alt="{{ $product->name }}">
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-custom-icon" style="color:black;" aria-hidden="true">
                        <i class="fas fa-chevron-left"></i>
                    </span>
                    <span class="sr-only" style="color:black;">Önceki</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-custom-icon" style="color:black;" aria-hidden="true">
                        <i class="fas fa-chevron-right"></i>
                    </span>
                    <span class="sr-only" style="color:black;">Sonraki</span>
                </a>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<div class="container">
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ $product->imageurl }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text">Fiyat: {{ $product->price }}</p>
                        <p class="card-text">Stok: {{ $product->stock }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    $(document).ready(function(){
        // Carousel'ı başlat
        $('#carouselExampleIndicators').carousel();

        // Önceki ve sonraki slaytlar arasında geçiş yap
        $('.carousel-control-prev').click(function(){
            $('#carouselExampleIndicators').carousel('prev');
        });
        $('.carousel-control-next').click(function(){
            $('#carouselExampleIndicators').carousel('next');
        });
    });
</script>

@endsection
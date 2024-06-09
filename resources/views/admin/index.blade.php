@extends('layout')
@section('title', 'Admin Paneli')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Yönetim Paneli</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Ana Sayfa</a></li>
                            <li class="breadcrumb-item active">Yönetim Paneli</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $userCount }}</h3>
                                <p>Kayıtlı Kullanıcılar</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $productCount }}</h3>
                                <p>Ürünler</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $announcementCount }}</h3>
                                <p>Duyurular</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-speakerphone"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $totalUnseenMessageCount }}</h3>
                                <p>Görülmeyen Mesajlar</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <!-- Son 3 Duyuru -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Son 3 Duyuru</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Başlık</th>
                                            <th>Oluşturma Tarihi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($announcements as $announcement)
                                            <tr>
                                                <td>{{ $announcement->title }}</td>
                                                <td>{{ $announcement->created_at }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mesajlar -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Mesajlar</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Kullanıcı</th>
                                        <th>Son Mesaj</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($messages as $userId => $userMessages)
                                <tr>
                                    <td>
                                        <a href="{{ route('messages.show', $userId) }}">
                                        {{ $userMessages->first()->from_user_id == Auth::id() ? $userMessages->first()->toUser->name : $userMessages->first()->fromUser->name }}
                                            @if ($userMessages->where('is_read', false)->count() > 0)
                                                <i class="fas fa-envelope"></i>
                                            @endif
                                        </a>
                                    </td>
                                    <td>
                                        @if ($userMessages->last()->from_user_id == Auth::id())
                                            <b>You:</b> {{ $userMessages->last()->content }}
                                        @else
                                            <b>{{ $userMessages->first()->fromUser->name }}:</b> {{ $userMessages->last()->content }}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                                </tbody>
                            </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </section>
    </div>
@endsection
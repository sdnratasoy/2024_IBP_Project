<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ url('/') }}" class="brand-link">
    <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
    
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="/adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        @auth
          <a href="{{ route('profile') }}" class="d-block">{{ Auth::user()->name }}</a>
        @else
          <a href="#" class="d-block">Misafir</a>
        @endauth
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ url('/') }}" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>Ana Sayfa</p>
            </a>
        </li>
        @auth
          @if (Auth::user()->hasRole('admin'))
            <li class="nav-item">
                <a href="{{ url('/admin') }}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>Admin Panel</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.announcements') }}" class="nav-link">
                    <i class="nav-icon fas fa-bullhorn"></i>
                    <p>Duyuru Yönetimi</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.products') }}" class="nav-link">
                    <i class="nav-icon fas fa-box"></i>
                    <p>Ürün Yönetimi</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.users') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Kullanıcı Yönetimi</p>
                </a>
            </li>
            @else
            <li class="nav-item">
                <a href="{{ url('/dashboard') }}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>Dashboard</p>
                </a>
            </li>
          @endif
          <li class="nav-item">
                <a href="{{ route('messages.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-envelope"></i>
                    <p>Mesajlar</p>
                </a>
          </li>
        @endauth
        <!-- Add more menu items here -->
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
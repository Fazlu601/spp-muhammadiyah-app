<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #1ABC9C;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-graduation-cap"></i>
        </div>
        <div class="sidebar-brand-text text-mx-3">SMK Muhammadiyah</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->is('admin') ? 'active' : '' }}">
        <a class="nav-link" href="/admin">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-folder"></i>
            <span>Data Master</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">List</h6>
                <a class="collapse-item {{ request()->is('admin/tahun-ajaran') ? 'active' : '' }}" href="/admin/tahun-ajaran">Data Tahun Ajaran</a>
                <a class="collapse-item {{ request()->is('admin/kelas') ? 'active' : '' }}" href="/admin/kelas">Data Kelas</a>
                <a class="collapse-item {{ request()->is('admin/program-studi') ? 'active' : '' }}" href="/admin/program-studi">Data Prodi</a>
                <a class="collapse-item {{ request()->is('admin/jenis-pembayaran') ? 'active' : '' }}" href="/admin/jenis-pembayaran">Data Jenis Pembayaran</a>
                <a class="collapse-item {{ request()->is('admin/siswa') ? 'active' : '' }}" href="/admin/siswa">Data Siswa</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Pembayaran
    </div>

    <!-- Nav Item - Tables -->
    <li class="nav-item {{ request()->is('admin/pembayaran') ? 'active' : '' }}">
        <a class="nav-link" href="/admin/pembayaran">
            <i class="fas fa-fw fa-credit-card"></i>
            <span>Pembayaran</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item {{ request()->is('admin/laporan') ? 'active' : '' }}">
        <a class="nav-link" href="/admin/laporan">
            <i class="fas fa-fw fa-file"></i>
            <span>Laporan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><?= session('level') ?></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>
    <?php
    if (session('level') == 'admin') {
    ?>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="/petugas">
                <i class="fas fa-fw fa-user"></i>
                <span>Petugas</span>
            </a>
        </li>
    <?php
    }
    ?>
    <?php
    if (session('level') != "masyarakat") {
    ?>
        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="/masyarakat">
                <i class="fas fa-fw fa-users"></i>
                <span>Masyarakat</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/tanggapan">
                <i class="fas fa-fw fa-file"></i>
                <span>Tanggapan</span>
            </a>
        </li>
    <?php
    }
    ?>
    <li class="nav-item">
        <a class="nav-link" href="/pengaduan">
            <i class="fas fa-fw fa-comment"></i>
            <span>Pengaduan</span>
        </a>
    </li>
    <?php
    ?>
    <?php if (!empty(session()->get('log_in'))) : ?>
        <li class="nav-item">
            <a class="nav-link" href="/logout">
                <i class="fas fa-fw fa-table"></i>
                <span>Log Out</span>
            </a>
        </li>
    <?php endif  ?>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->


    <!-- Nav Item - Pages Collapse Menu -->


    <!-- Nav Item - Charts -->


    <!-- Nav Item - Tables -->


    <!-- Divider -->


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->


</ul>
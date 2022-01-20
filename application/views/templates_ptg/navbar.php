<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-warning border-right" id="sidebar-wrapper">
      <div class="sidebar-heading text-center"><i class="fa fa-fw fa-gavel"></i> Lelang Ind</div>
      <div class="list-group list-group-flush">
        <!-- Nav Item -->
        <a href="<?php echo base_url('petugas/dashboard_ptg') ?>" class="list-group-item list-group-item-action bg-warning text-dark"><i class="fa fa-fw fa-tachometer-alt"></i> Dashboard</a>

        <!-- Dropright -->
        <div class="list-group dropright">
            <a class="list-group-item list-group-item-action bg-warning text-dark dropdown-toggle text-dark" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-folder"></i> Data
            </a>
            <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item text-warning" href="<?php echo base_url('petugas/profil_ptg') ?>"><i class="fa fa-fw fa-user-tie"></i> Profil</a>
                <hr class="border-white">
                <a class="dropdown-item text-warning" href="<?php echo base_url('petugas/data/data_masyarakat') ?>"><i class="fa fa-fw fa-users" ></i> Data Masyarakat</a>
            </div>
        </div>

        <!-- Nav Item -->
        <a href="<?php echo base_url('petugas/lelang_barang') ?>" class="list-group-item list-group-item-action bg-warning text-dark"><i class="fa fa-fw fa-archive"></i> Barang</a>
        
        <!-- Nav Item -->
        <a href="<?php echo base_url('petugas/lelang_lelang') ?>" class="list-group-item list-group-item-action bg-warning text-dark"><i class="fa fa-fw fa-gavel"></i> Lelang</a>

        <hr>
      
      </div>
    </div>
    <!-- End of Sidebar -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

        <!-- Topbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom mb-3">
            <button class="btn btn-warning" id="menu-toggle"><i class="fa fa-bars"></i></button>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-warning" href="<?php echo base_url('auth/logout') ?>" onclick="javascript:return confirm('Yakin akan keluar?')"><i class="fa fa-fw fa-sign-out-alt"></i> Keluar</a>
                </li>
            </ul>
        </nav>
        <!-- End of Topbar -->
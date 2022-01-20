<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

<!-- Navbar -->
<nav class="navbar navbar-white bg-warning">
    
    <div class="container-fluid my-3">

        <span class="navbar-brand h1 text-dark ml-3"><h4><i class="fas fa-fw fa-gavel"></i> Lelang Ind</h4></span>
        
        
          <div class="form-inline">
              <form action="<?php echo base_url('dashboard') ?>" method="get"> 
                <input class="form-control mr-sm-2" type="search" placeholder="Cari..." name="keyword">
                <button class="btn btn-outline-dark my-2 my-sm-0 btn-sm" type="submit" name="cari" value="cari">
                  <i class="fas fa-sm fa-search mx-2"></i>
                </button>
              </form>

              <button class="btn btn-transparent my-2 my-sm-0 btn-sm ml-1" type="submit" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-sm fa-filter mx-2"></i></button>
          </div>
        
        <ul class="nav">
          <li class="nav-item">
            <?php if ($this->session->userdata('id_user')) {?>
               <a class="btn btn-outline-danger" href="<?php echo base_url('auth/logout') ?>" onclick="javascript:return confirm('Yakin akan keluar?')"><i class="fa fa-fw fa-sign-out-alt"></i> Keluar</a>
            <?php }else{ ?>
              <?php echo anchor('auth/login','<button type="button" class="btn btn-outline-success"><i class="fas fa-sign-in-alt"></i> Masuk</button>') ?>
            <?php } ?>  
          </li>
        </ul>
      
    </div>

</nav>

<!-- Sub-Navbar -->
<ul class="nav justify-content-center bg-dark">
  
  <li class="nav-item my-1">
    <a class="nav-link text-warning" href="<?php echo base_url('dashboard') ?>">Beranda</a>
  </li>

  <li class="nav-item my-1">
    <a class="nav-link text-warning" href="<?php echo base_url('profil') ?>">Profil</a>
  </li>

  <li class="nav-item my-1">
    <a class="nav-link text-warning" href="<?php echo base_url('riwayat') ?>">Riwayat</a>
  </li>

</ul>

<!-- Modal Filter-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="exampleModalLabel">Filter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form action="<?php echo base_url('dashboard') ?>" method="get">
          
          <div class="form-group">
            <label>Lokasi</label>
            <?php 
              if ($this->session->userdata('lokasi')) {
                $lokasi = $this->session->userdata('lokasi'); 
              }else{
                $lokasi = '';
              }
            ?>
              <input type="text" name="lokasi" class="form-control" placeholder="Semua" value="<?php echo $lokasi ?>">
          </div>

          <div class="form-group">
            <label>Kategori</label>
            <select name="kategori" id="inputState" class="form-control">
              <?php  
                if ($this->session->userdata('kategori')) {
                  $kategori = $this->session->userdata('kategori');
              ?>
                  <option value="<?php echo $kategori ?>"><?php echo $kategori ?></option> 
              <?php
                }
              ?>
                  <option value="">Semua</option>
                  <option value="Tanah">Tanah</option>
                  <option value="Bangunan">Bangunan</option>
                  <option value="Kendaraan">Kendaraan</option>
                  <option value="Mebel">Mebel</option>
                  <option value="Peralatan">Peralatan</option>
                  <option value="Elektronik">Elektronik</option>
                  <option value="Pakaian">Pakaian</option>
                  <option value="Lain-lain">Lain-lain</option>
            </select>
          </div>

          <div class="form-group">
            <label>Urutkan dari</label>
            <select name="urutkan" class="form-control">
              <?php  

              if ($this->session->userdata('urutkan')) {
                  $urutkan = $this->session->userdata('urutkan');
                  
                  if ($urutkan == 'DESC') {
                    ?>
                      <option value="DESC">Terbaru</option>
                      <option value="ASC">Terlama</option>
                      <option value="Termahal">Termahal</option>
                      <option value="Termurah">Termurah</option>
                    <?php
                  }else if($urutkan == 'ASC'){
                    ?>
                      <option value="ASC">Terlama</option>
                      <option value="DESC">Terbaru</option>
                      <option value="Termahal">Termahal</option>
                      <option value="Termurah">Termurah</option>

                    <?php  
                  }else if($urutkan == 'Termahal'){
                    ?>
                      <option value="Termahal">Termahal</option>
                      <option value="ASC">Terlama</option>
                      <option value="DESC">Terbaru</option>
                      <option value="Termurah">Termurah</option>

                    <?php  
                  }else if($urutkan == 'Termurah'){
                    ?>
                      <option value="Termurah">Termurah</option>
                      <option value="ASC">Terlama</option>
                      <option value="DESC">Terbaru</option>
                      <option value="Termahal">Termahal</option>
                    <?php  
                  }
                  ?>
              <?php }else{ ?>

              <option value="DESC">Terbaru</option>
              <option value="ASC">Terlama</option>
              <option value="Termahal">Termahal</option>
              <option value="Termurah">Termurah</option>

              <?php } ?>

            </select>
          </div>

          <div class="form-group mt-3">
            <button type="submit" class="btn btn-warning text-dark">Simpan</button>
            <?php echo anchor('dashboard/bersihkan_filter_lelang','<div class="btn btn-dark text-warning">Bersihkan Filter</div>'); ?>
            <button type="button" class="btn btn-transparent" data-dismiss="modal">Tutup</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
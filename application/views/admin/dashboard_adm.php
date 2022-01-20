<div class="container-fluid">

    <!-- Content Row -->
    <div class="row">

        <!-- Card 1 -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?php echo base_url('admin/dashboard_adm/report_msy') ?>" class="text-decoration-none">
            <div class="card border-left-primary shadow h-100 py-2 bg-dark">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                               MASYARAKAT
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-warning"><?php echo $jumlah_masyarakat ?></div>
                            <br>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-users fa-lg text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>

        <!-- Card 2 -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?php echo base_url('admin/dashboard_adm/report_ptg') ?>" class="text-decoration-none">
            <div class="card border-left-success shadow h-100 py-2 bg-warning">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                PETUGAS
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-dark"><?php echo $jumlah_petugas ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users-cog fa-lg text-dark"></i>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>

        <!-- Card 3 -->

        <div class="col-xl-3 col-md-6 mb-4">
            <a type="button" data-toggle="modal" data-target="#exampleModalBrg">
            <div class="card border-left-info shadow h-100 py-2 bg-dark">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                BARANG
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-warning"><?php echo $jumlah_barang ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-archive fa-lg text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>

        <!-- Card 4 -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a type="button" data-toggle="modal" data-target="#exampleModalLlg">
            <div class="card border-left-warning shadow h-100 py-2 bg-warning">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                LELANG
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-dark"><?php echo $jumlah_lelang ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-gavel fa-lg text-dark"></i>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>

    </div>

    <script src="<?php echo base_url()?>/assets/chartjs/Chart.js"></script>

    <div class="row">
        <div class="col-xl-7 mb-4">
            <div class="card border-left-warning shadow h-100">
                <div class="card-header bg-dark text-warning">
                    Penawaran Tahun 2020
                </div>
                <div class="card-body">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
            </a>
        </div>
        <div class="col-xl-5 mb-4">
            <div class="card border-left-warning shadow h-100">
                <div class="card-header bg-dark text-warning">
                    Pelelangan Terbaru
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>No.</th>
                            <th>Nama Barang</th>
                        </tr>

                        <?php 
                            if (empty($top_pelelangan)) {
                                ?>
                                <tr>
                                    <td colspan="2"><?php echo 'Data tidak tersedia' ?></td>
                                </tr>
                                <?php
                            }else{
                                $no=1;
                                foreach ($top_pelelangan as $tpl):
                        ?>
                                    <tr>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $tpl->nama_barang ?></td>
                                        </tr>
                                    </tr>   
                        <?php 
                                endforeach;
                            } 
                        ?>
                </div>
            </div>
            </a>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalBrg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Laporan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <a href="<?php echo base_url('admin/dashboard_adm/report_brg') ?>" type="button" class="btn btn-warning text-dark">Generate Laporan</a>
            <button type="button" class="btn btn-dark text-warning" data-toggle="modal" data-target="#modal_filter_brg">Filter</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal_filter_brg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header bg-warning text-dark">
            <h5 class="modal-title" id="exampleModalLabel">Laporan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?php echo base_url('admin/dashboard_adm/report_brg') ?>" method="post">
                <label>Dari Tanggal</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar"></i></span>
                    </div>
                    <input type="date" name="from" class="form-control" required>
                </div> 

                <label>Hingga Tanggal</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar"></i></span>
                    </div>
                    <input type="date" name="to" class="form-control" required>
                </div> 
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning text-dark">Generate Laporan</button>
                    <button type="button" class="btn btn-dark text-warning" data-dismiss="modal">Tutup</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalLlg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Laporan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <a href="<?php echo base_url('admin/dashboard_adm/report_llg') ?>" type="button" class="btn btn-warning text-dark">Generate Laporan</a>
            <button type="button" class="btn btn-dark text-warning" data-toggle="modal" data-target="#modal_filter_llg">Filter</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal_filter_llg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header bg-warning text-dark">
            <h5 class="modal-title" id="exampleModalLabel">Laporan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="<?php echo base_url('admin/dashboard_adm/report_llg') ?>" method="post">
                <label>Dari Tanggal</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar"></i></span>
                    </div>
                    <input type="date" name="from" class="form-control" required>
                </div> 

                <label>Hingga Tanggal</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar"></i></span>
                    </div>
                    <input type="date" name="to" class="form-control" required>
                </div> 
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning text-dark">Generate Laporan</button>
                    <button type="button" class="btn btn-dark text-warning" data-dismiss="modal">Tutup</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
        // The data for our dataset
        data: {
            labels: ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'],
            datasets: [{
                label:'Tampilkan',
                backgroundColor: ['black', 'orange', 'black','orange','black','orange','black','orange','black','orange','black','orange'],
                borderColor: ['transparent'],
                data: [<?php echo $jumlah_lelang_perbulan[0].','.$jumlah_lelang_perbulan[1].','.$jumlah_lelang_perbulan[2].','.$jumlah_lelang_perbulan[3].','.$jumlah_lelang_perbulan[4].','.$jumlah_lelang_perbulan[5].','.$jumlah_lelang_perbulan[6].','.$jumlah_lelang_perbulan[7].','.$jumlah_lelang_perbulan[8].','.$jumlah_lelang_perbulan[9].','.$jumlah_lelang_perbulan[10].','.$jumlah_lelang_perbulan[11] ?>]
            }]
        },
        // Configuration options go here
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
    </script>

    <!-- Content Row -->

</div>
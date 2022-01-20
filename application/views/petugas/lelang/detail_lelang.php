<div class="container-fluid">
	
	<h3 class="ml-2 mb-3">Detail Lelang</h3>

	<div class="row">
		<div class="col">
			<div class="card bg-white mb-3" style="height: 19rem;">
			  <div class="card-header bg-dark text-warning">Foto Barang</div>
			  <div class="card-body">
				<center>
					<img src="<?php echo base_url() ?>uploads/<?php echo $detail1->gambar ?>" width="200" height="200">
				</center>
			  </div>
			</div>  	
		</div>

		<div class="col">
			<div class="card bg-white mb-3" style="height: 19rem;">
			  <div class="card-header bg-dark text-warning">Data Barang</div>
			  <div class="card-body">
			    <table class="table h-100">
			    	<tr>
						<td>Nama</td>
						<td>: <?php echo $detail1->nama_barang; ?></td>
					</tr>
					<tr>
						<td>Lokasi</td>
						<td>: <?php echo $detail1->lokasi; ?></td>
					</tr>
					<tr>
						<td>Dilelang pada</td>
						<td>: <?php echo $detail1->tgl_lelang; ?></td>
					</tr>
					<?php if ($detail1->status == 'ditutup'): ?>
					<tr>
						<td>Ditutup pada</td>
						 
						<td>: <?php echo $detail1->tgl_tutup; ?></td>
					</tr>	
					<?php endif ?>
				</table>
			  </div>
			</div>	
		</div>
		
		<div class="col">
			<div class="card bg-white mb-3" style="height: 19rem;">
			  <div class="card-header bg-dark text-warning">Data Lelang</div>
			  <div class="card-body">
			    <table class="table h-100">
			    	<tr>
			    		<td>Pelelang</td>
						<td>: <?php echo $detail1->nama; ?></td>
			    	</tr>
					<tr>
						<td>Harga Awal</td>
						<td>: <?php echo rupiah($detail1->harga_awal); ?></td>
					</tr>
					<tr>
						<td>Harga Akhir</td>
						<td>: <?php echo rupiah($detail1->harga_akhir); ?></td>
					</tr>			
				</table>
			  </div>
			</div>	
		</div>
	</div>

	<div class="row">
		<div class="col">
			<div class="card bg-white mb-3">
			  <div class="card-header bg-dark text-warning">Daftar Penawaran</div>
			  <div class="card-body">
			    <table class="table table-bordered h-100" id="example">
					<thead>
						<tr>
							<td>No.</td>
							<td>Nama</td>
							<td>Penawaran</td>
							<td>Waktu Penawaran</td>
						</tr>
					</thead>
					<tbody>
						<?php 
							$no = 1;
							foreach ($detail2 as $dtl2): 
						?>	
								<tr>
									<?php 
										if ($dtl2->id_user == ''){ 
									?>
											<td>Belum ada penawaran</td>
											<td></td>
											<td></td>
											<td></td>
									<?php 
										}else{ 
									?>	
											<td><?php echo $no++ ?></td>
											<td><?php echo $dtl2->nama ?></td>
											<td><?php echo rupiah($dtl2->penawaran_harga) ?></td>
											<td><?php echo $dtl2->waktu_penawaran ?></td>
									<?php } ?>
								</tr>
						<?php 
							endforeach; 
						?>
					</tbody>
				</table>
			  </div>
			</div>	
		</div>
	</div>

	<?php echo anchor('petugas/lelang_lelang/index','<button type="button" class="btn btn-secondary ml-2 mb-3">Kembali</button>'); ?>

</div>	
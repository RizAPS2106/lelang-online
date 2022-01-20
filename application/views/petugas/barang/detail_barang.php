<div class="container-fluid">
	
	<h3 class="ml-1 mb-3">Detail Barang</h3>

	<hr>

	<div class="row">
		<div class="col">
			<div class="card bg-white mb-3" style="height: 30rem;">
			  <div class="card-header bg-dark text-warning">
			  	<h5 class="mt-1">Data Barang</h5>
			  </div>
			  
			  <div class="card-body">
			    <table class="table table-sm">
					<tr>
						<td>Nama</td>
						<td> : </td>
						<td><?php echo $detail->nama_barang; ?></td>
					</tr>
					<tr>
						<td>Lokasi</td>
						<td> : </td>
						<td><?php echo $detail->lokasi; ?></td>
					</tr>
					<tr>
						<td>Tanggal Masuk</td>
						<td> : </td>
						<td><?php echo $detail->tgl; ?></td>
					</tr>
					<tr>
						<td>Harga Awal</td>
						<td> : </td>
						<td><?php echo rupiah($detail->harga_awal); ?></td>
					</tr>
					<tr>
						<td>Deskripsi</td>
						<td> : </td>
						<td><?php echo $detail->deskripsi_barang; ?></td>
					</tr>
					<tr>
						<td>Kategori</td>
						<td> : </td>
						<td><?php echo $detail->kategori; ?></td>
					</tr>
				</table>
			  </div>
			</div>	
		</div>
				  		  	
		<div class="col">
			<div class="card bg-white mb-3" style="height: 30rem;">
				<div class="card-header bg-dark text-warning">
					<h5 class="mt-1">Foto Barang</h5>
				</div>
				  
				<div class="card-body">
					<center>
						<img src="<?php echo base_url() ?>uploads/<?php echo $detail->gambar ?>" width="400" height="300">
					</center>
				</div>
			</div>
			
		</div>
		
	</div>

	<?php echo anchor('petugas/lelang_barang/index','<button type="button" class="btn btn-secondary ml-1 mb-3">Kembali</button>'); ?>

</div>	
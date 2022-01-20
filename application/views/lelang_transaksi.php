<div class="container">
	
	<h3 class="ml-2 mb-3 mt-3"><?php echo $detail1->nama_barang ?></h3>

	<?php echo $this->session->flashdata('pesan') ?>

	<div class="row">
		<div class="col">
			<div class="card bg-white mb-3" style="height: 33rem;">
			  <div class="card-header bg-dark text-warning"><i class="fa fa-fw fa-camera"></i> Foto Barang</div>
			  <div class="card-body">
				<center>
					<img src="<?php echo base_url() ?>uploads/<?php echo $detail1->gambar ?>" width="500" height="430">
				</center>
			  </div>
			</div>  	
		</div>

		<div class="col">
			<div class="card bg-white mb-3" style="height: 33rem;">
			  <div class="card-header bg-dark text-warning"><i class="fa fa-fw fa-info"></i> Info Lelang</div>
			  <div class="card-body">
			    <table class="table table-sm">
					<tr>
						<td>Nama</td>
						<td> : </td>
						<td><?php echo $detail1->nama_barang; ?></td>
					</tr>
					<tr>
						<td>Lokasi</td>
						<td> : </td>
						<td><?php echo $detail1->lokasi; ?></td>
					</tr>
					<tr>
						<td>Deskripsi</td>
						<td> : </td>
						<td><?php echo $detail1->deskripsi_barang; ?></td>
					</tr>
					<tr>
						<td>Harga Awal</td>
						<td> : </td>
						<td><?php echo rupiah($detail1->harga_awal); ?></td>
					</tr>
					<tr>
						<td>Penawaran Terbesar</td>
						<td> : </td>
						<td><?php echo rupiah($detail1->harga_akhir); ?></td>
					</tr>
					<tr>
						<td>Tanggal Lelang</td>
						<td> : </td>
						<td><?php echo $detail1->tgl_lelang; ?></td>
					</tr>
					<tr>
						<td>Penyelenggara</td>
						<td> : </td>
						<td><?php echo $detail1->nama; ?></td>
					</tr>
					<tr>
						<td>Status</td>
						<td> : </td>
						<?php if ($detail1->status == "dibuka"){ ?>
							<td class="text-uppercase text-success"><b><?php echo $detail1->status; ?></b></td>
						<?php }else{ ?>
							<td class="text-uppercase text-danger"><b><?php echo $detail1->status; ?></b></td>
						<?php } ?>
						
					</tr>				
				</table>

				<?php if ($detail1->status == "dibuka"){ ?>
					<center>
						<a data-toggle="modal" data-target="#modal_edit<?php echo $detail1->id_user;?>"><button class="btn btn-success mt-1 w-75"><i class="far fa-fw fa-check-circle"></i> Ikut Lelang</button></a>
					</center>
				<?php }else{ ?>
					<center>
						<button class="btn btn-danger mt-1 w-75" disabled><i class="far fa-fw fa-times-circle"></i> Lelang Sudah Ditutup</button>
					</center>
				<?php } ?>
					
				
			  </div>
			</div>	
		</div>
	</div>

	<div class="row">
		<div class="col">
			<div class="card bg-white mb-3">
			  <div class="card-header bg-dark text-warning">Daftar Penawaran</div>
			  <div class="card-body">
			  	<div class="tabel_penawaran"></div>
			    <table class="table table-bordered" id="example">
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

	<a href="javascript:history.go(-1)"><button type="button" class="btn btn-secondary ml-2 mb-3">Kembali</button></a>

	<!-- Modal penawaran -->
    <div class="modal fade" id="modal_edit<?php echo $detail1->id_user;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelUbah" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabelUbah">Ikut Lelang</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>

	      <form id="transaksi_form" method="post">

	      	<div class="modal-body" id="transaksi_modal">
	        	<input type="hidden" name="id_lelang" value="<?php echo $detail1->id_lelang; ?>">

	        	<input type="hidden" name="id_barang" value="<?php echo $detail1->id_barang; ?>">

	        	<div class="form-group">
					<label>Nominal Penawaran Tertinggi</label>
					<div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">Rp.</span>
					  </div>
					  	<input type="hidden" name="harga_akhir" value="<?php echo $detail1->harga_akhir ?>">
						<input type="text" name="tampilan_harga_akhir" class="form-control" value="<?php echo rupiah_norp($detail1->harga_akhir) ?>" onkeypress="return isNumberKey(event)" readonly>
					</div>
				</div>

	        	<div class="form-group">
					<label>Tambah Nominal Penawaran</label>
					
					<div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1">Rp.</span>
					  </div>
					  <input id="penawaran" type="text" name="penawaran_harga" class="form-control uang" onkeypress="return isNumberKey(event)" required>
					</div>
				</div>

	        	<div class="modal-footer">
	        		<input id="transaksi_url" type="hidden" value="<?php echo base_url('lelang_transaksi/tambah_lelang_transaksi') ?>">
	        		<input id="transaksi" type="submit" class="btn btn-success" onclick="javascript: return confirm('Konfirmasi Penawaran')" value="Lakukan Penawaran">
	        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
	        	</div>
	        </div>

	      </form>

	    </div>
	  </div>
	</div>

</div>

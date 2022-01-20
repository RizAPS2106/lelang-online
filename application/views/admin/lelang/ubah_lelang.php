<div class="container-fluid">
	
	<h5>Ubah Data Lelang</h5>

	<hr>

	<form id="update_form" method="post">

		<input type="hidden" name="id_lelang" value="<?php echo $lelang->id_lelang ?>">
			
		<div class="form-group row">
			<div class="col-6">
				<label>Nama Barang</label>
				<input type="text" name="nama_barang" class="form-control mb-2" value="<?php echo $lelang->id_barang.' - '.$lelang->nama_barang ?>" readonly>
				
				<label>Tanggal Lelang</label>
				<div class="input-group mb-2">
				  <div class="input-group-prepend">
				    <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"></i></span>
				  </div>
				  <input type="date" name="tgl_lelang" class="form-control" value="<?php echo $lelang->tgl_lelang ?>" readonly required>
				</div>

				<label>Status</label>
				<select name="status" class="form-control">
					<?php 

						if ($lelang->status == "dibuka") {
							?>
								<option value="dibuka">Dibuka</option>
								<option value="ditutup">Ditutup</option>
							<?php
						}else if ($lelang->status == "ditutup") {
							?>
								<option value="ditutup">Ditutup</option>
								<option value="dibuka">Dibuka</option>
							<?php
						}

					?>
				</select>

				<input id="update_url" type="hidden" value="<?php echo base_url('admin/lelang_lelang/update_lelang') ?>">
				<input id="update" type="submit" class="btn btn-warning mt-3" value="Ubah">
				<?php echo anchor('admin/lelang_lelang/index','<button type="button" class="btn btn-transparent mt-3">Kembali</button>'); ?>   
			</div>
			
			<div class="col-6 ">
				<label>Foto Barang</label><br>
				<div class="img-thumbnail">
					<center>
						<img src="<?php echo base_url() ?>uploads/<?php echo $lelang->gambar ?>" width="400" height="260">
					</center>
				</div>
			</div>
		</div>
	
	</form>

</div>
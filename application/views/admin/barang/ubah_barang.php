<div class="container-fluid">
	
	<h3>Ubah Data Barang</h3>

	<hr>

	<?php foreach ($barang as $brg): ?>
		
	<form id="update_form" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id_barang" value="<?php echo $brg->id_barang?>">

		<div class="form-group row">
			<label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
			<div class="col-sm-5">
				<input type="text" name="nama_barang" id="nama_barang" class="form-control" value="<?php echo $brg->nama_barang ?>" required>
			</div>
			
			<div class="col-sm-5">
		      <select name="kategori" id="inputState" class="form-control">
		        <?php foreach ($barang as $brg1): ?>
		        	<option value="<?php echo $brg1->kategori; ?>"><?php echo $brg1->kategori; ?></option>	
		        <?php endforeach ?>
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
		</div>

		<div class="form-group row">
			<label for="lokasi" class="col-sm-2 col-form-label">Lokasi</label>
			<div class="col-sm-10">
				<input type="text" name="lokasi" id="lokasi" class="form-control" value="<?php echo $brg->lokasi ?>" required>
			</div>
		</div>
		
		<div class="form-group row">
			<label for="harga_awal" class="col-sm-2 col-form-label">Harga Awal</label>
			<div class="input-group col-sm-10">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">Rp.</span>
				</div>
	
				<input type="text" name="harga_awal" class="form-control uang" value="<?php echo $brg->harga_awal ?>" required>
			</div>
		</div>

		<div class="form-group row">
			<label for="deskripsi_barang" class="col-sm-2 col-form-label">Deskripsi Barang</label>
			<div class="col-sm-10">
				<textarea name="deskripsi_barang" id="deskripsi_barang" class="form-control" required><?php echo $brg->deskripsi_barang ?></textarea>
			</div>
		</div>
		
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Ubah Foto</label>

			<div class="col-sm-4 mt-2">
				<label>Foto Lama</label>
				<div class="img-thumbnail">
					<center>
						<img src="<?php echo base_url() ?>uploads/<?php echo $brg->gambar ?>" width="300" height="200">
					</center>
				</div>	
			</div>
			
			<div class="col-sm-5 mt-2">
				<label>Foto Baru</label><br>
				<div class="img-thumbnail">
					<center>
						<img id="preview" alt="*preview gambar" width="300" height="200">
					</center>
				</div>
				<input id="upload_gambar" type="file" name="gambar" class="form-control" accept="image/*"  onchange="tampilkanPreview(this,'preview')">
			</div>
		</div>

		<div class="form-group row">
			<div class="col-sm-2"></div>
			<div class="col-sm-5 mt-3"> 
				<input id="update_url" type="hidden" value="<?php echo base_url('admin/lelang_barang/update_barang') ?>">
				<button id="update" type="submit" class="btn btn-warning">Ubah Data Barang</button>
				<?php echo anchor('admin/lelang_barang/index','<button type="button" class="btn btn-transparent">Kembali</button>'); ?>
			</div>
		</div>

	</form>

	<?php endforeach; ?>

</div>
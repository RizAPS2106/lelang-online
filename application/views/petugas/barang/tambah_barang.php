<div class="container-fluid">
	
	<h4>Tambah Data Barang</h4>
	
	<hr>
	
	<form id="input_form" method="post" enctype="multipart/form-data">
		
		<div class="form-group row">
			<label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
			<div class="col-sm-5">
				<input type="text" name="nama_barang" class="form-control" required>
			</div>
			<div class="col-sm-5">
		      <select name="kategori" class="form-control" required>
		      	<option value="" disabled selected>Kategori</option>
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
				<input type="text" name="lokasi" class="form-control" required>
			</div>
		</div>
		
		<div class="form-group row">
			<label for="harga_awal" class="col-sm-2 col-form-label">Harga Awal</label>
			
			<div class="input-group col-sm-10">
			  <div class="input-group-prepend">
			    <span class="input-group-text" id="basic-addon1">Rp.</span>
			  </div>
			  <input type="text" name="harga_awal" class="form-control uang" onkeypress="return isNumberKey(event)" required>
			</div>
		</div>

		<div class="form-group row">
			<label for="deskripsi_barang" class="col-sm-2 col-form-label">Deskripsi Barang</label>
			<div class="col-sm-10">
				<textarea name="deskripsi_barang" class="form-control" required></textarea>
			</div>
		</div>
		
		<div class="form-group row">
			<label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
			<div class="col-sm-5">
				<input id="upload_gambar" type="file" name="gambar" class="form-control" required accept="image/*"  onchange="tampilkanPreview(this,'preview')">
				<div class="img-thumbnail">
					<center>
						<img id="preview" alt="*preview gambar" width="300" height="200">
					</center>
				</div>
			</div>
		</div>

		<div class="form-group row">
			<label for="button" class="col-sm-2 col-form-label"></label>
			<div class="col-sm-5 mt-3"> 
				<input id="input_url" type="hidden" value="<?php echo base_url('petugas/lelang_barang/input_barang') ?>">
				<input id="input" type="submit" class="btn btn-warning" value="Simpan">
				<button type="reset" class="btn btn-dark text-warning">Reset</button>
				<?php echo anchor('petugas/lelang_barang/index','<button type="button" class="btn btn-transparent">Kembali</button>'); ?>
			</div>
		</div>

	</form>

</div>
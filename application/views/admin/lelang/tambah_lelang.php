<div class="container-fluid">
	
	<h4>Buka Lelang</h4>
	
	<hr>

	<form id="input_form" method="post">
		
		<input type="hidden" name="id_user" value="0">

		<input type="hidden" name="status" value="dibuka">
		
		<div class="form-group">
			<label for="nama_barang" class="col-form-label">Nama Barang</label>
			
			<select name="id_barang" id="select_barang" class="selectpicker form-control" data-live-search="true">
			    <?php foreach ($barang as $brg) : ?>
			    	<option value="<?php echo $brg->id_brg ?>"><?php echo $brg->id_brg.' - '.$brg->nama_barang; ?></option>
			    <?php endforeach; ?>
			</select>
		</div>

		<!-- Detail Barang -->
		<div id="result_select_detail_tambah_lelang"></div>

		<div class="form-group row">
			<div class="col"> 
				<input id="input_url" type="hidden" value="<?php echo base_url('admin/lelang_lelang/input_lelang') ?>">
				<input type="submit" class="btn btn-warning" value="Buka Lelang">
				<?php echo anchor('admin/lelang_lelang/index','<button type="button" class="btn btn-secondary">Kembali</button>'); ?>
			</div>
		</div>

	</form>

</div>
<div class="container-fluid">
	
	<?php echo $this->session->flashdata('pesan'); ?>
	
	<h5><i class="fa fa-fw fa-user-tie"></i> Profil</h5>

	<hr>

	<form id="update_form" method="post">
		

		<input type="hidden" name="id_petugas" value="<?php echo $petugas->id_petugas ?>"></input>

		<div class="form-group">
			<label>Nama</label>
			<input type="text" name="nama" class="form-control" value="<?php echo $petugas->nama ?>" required>
		</div>

		<div class="form-group">
			<label>Username</label>
			<input type="text" name="username" class="form-control" value="<?php echo $petugas->username ?>" required>
		</div>

		<hr>
		<label id="ubah_password" type="button" class="w-100 dropdown-toggle mt-1">Ubah Password </label>
		<div class="form-group row" id="form_ubah_password" style="display: none">
			<div class="col">
				<input type="password" name="password" class="form-control" placeholder="Password Lama">
			</div>
			
			<div class="col">
				<input type="password" name="password_new" class="form-control" placeholder="Password Baru">
			</div>
		</div>
		<hr>

		<div class="form-group row">
			<div class="col">
				<input id="update_url" type="hidden" value="<?php echo base_url('admin/profil_adm/update_profil'); ?>">
				<input id="update" class="btn btn-warning" type="submit" value="Ubah">
				<?php echo anchor('admin/dashboard_adm','<button type="button" class="btn btn-secondary">Kembali</button>'); ?>
			</div>
		</div>

	</form>

</div>
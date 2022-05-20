<div class="container my-4">

	<?php echo $this->session->flashdata('pesan'); ?>

	<div class="card text-dark bg-white w-100">
		<div class="card-header text-warning bg-dark"><i class="fa fa-fw fa-user"></i> Profil</div>
		<div class="card-body">

			<div class="container">

				<form id="update_form" method="post">

					<input type="hidden" name="id_user" value="<?php echo $user->id_user ?>">

					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="nama" value="<?php echo $user->nama ?>" class="form-control" required>
					</div>

					<div class="form-group">
						<label>Nomor Telepon</label>
						<input type="text" name="telepon" value="<?php echo $user->telepon ?>" class="form-control" onkeypress="return isNumberKey(event)" required>
					</div>

					<div class="form-group">
						<label>Username</label>
						<input type="text" name="username" value="<?php echo $user->username ?>" class="form-control" required>
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

					<div class="form-group">
						<input id="update_url" type="hidden" value="<?php echo base_url('profil/update_profil'); ?>">
						<input id="update" type="submit" class="btn btn-dark text-warning mt-3" value="Ubah">
					</div>

				</form>

			</div>

		</div>
	</div>

</div>
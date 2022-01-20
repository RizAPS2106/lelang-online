<div class="container-fluid">
	
	<?php echo $this->session->flashdata('pesan'); ?>

	<h5 class="text-gray mb-3"><i class="fas fa-fw fa-table"></i> Data Masyarakat</h5>
	
	<hr>

	<table class="table table-dark table-borderless table-striped" id="example">
		<thead>
		<tr class="bg-warning text-dark">
			<th>No.</th>
			<th>Nama masyarakat</th>
			<th>Username</th>
			<th>Nomor Telepon</th>
		</tr>
		</thead>

		<tbody>
			<?php 
				$no=1;
				foreach ($masyarakat as $msy):
			?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $msy->nama ?></td>
				<td><?php echo $msy->username ?></td>
				<td><?php echo $msy->telepon ?></td>
			</tr>	
			<?php endforeach; ?>
		</tbody>
	</table>

	<!-- Modal Tambah masyarakat-->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      
	      <div class="modal-header bg-warning">
	        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Masyarakat</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      
	      <form id="input_form" method="post">
	        
	      	<div class="modal-body">
	        	
	        	<div class="form-group">
	        		<label>Nama</label>
	        		<input type="input" name="nama" class="form-control" required>
	        	</div>

	        	<div class="form-group">
	        		<label>Username</label>
	        		<input type="input" name="username" class="form-control" required>
	        	</div>

	        	<label>Password</label>
	        	<div class="form-group row">
	        		<div class="col">
	        			<input type="password" name="password" class="form-control" placeholder="Password" required>
	        		</div>
	        		<div class="col">
	        			<input type="password" name="password_confirm" class="form-control" placeholder="Konfirmasi" required>
	        		</div>
	        	</div>

	        	<div class="form-group">
	        		<label>Nomor Telepon</label>
	        		<input type="text" name="telepon" class="form-control" onkeypress="return isNumberKey(event)" required>
	        	</div>

	        	<div class="form-group mt-3">
	        		<input id="input_url" type="hidden" value="<?php echo base_url('petugas/data/tambah_masyarakat') ?>">
	        		<input id="input" type="submit" class="btn btn-dark text-warning" value="Simpan">
	        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
	        	</div>
	        
	      	</div>

	      </form>

	    </div>
	  </div>
	</div>

	<!-- Modal Ubah Data masyarakat -->
    <?php
        foreach($masyarakat as $msy):
    ?>

        <div class="modal fade" id="modal_edit<?php echo $msy->id_user;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelUbah" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      
		      <div class="modal-header bg-warning">
		        <h5 class="modal-title" id="exampleModalLabelUbah">Ubah Data Masyarakat</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>

		      <form id="update_form" method="post">

		      	<div class="modal-body">
		        	<input type="hidden" name="id_masyarakat" value="<?php echo $msy->id_user; ?>">

		        	<div class="form-group">
		        		<label>Nama</label>
		        		<input type="input" name="nama" class="form-control" value="<?php echo $msy->nama;?>" required>
		        	</div>

		        	<div class="form-group">
		        		<label>Username</label>
		        		<input type="input" name="username" class="form-control" value="<?php echo $msy->username;?>" required>
		        	</div>
		        	
		        	<label>Ubah Password</label>
					<div class="form-group row">
						<div class="col">
							<input type="password" name="password" class="form-control" placeholder="Password Lama">
						</div>
						
						<div class="col">
							<input type="password" name="password_new" class="form-control" placeholder="Password Baru">
						</div>
					</div>

		        	<div class="form-group">
		        		<label>Nomor Telepon</label>
		        		<input type="text" name="telepon" class="form-control" value="<?php echo $msy->telepon;?>" onkeypress="return isNumberKey(event)" required>
		        	</div>


		        	<div class="modal-footer">
		        		<input id="update_url" type="hidden" value="<?php echo base_url('petugas/data/ubah_masyarakat') ?>">
		        		<input id="update" type="submit" class="btn btn-dark text-warning" value="Ubah">
		        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
		        	</div>
		        </div>
		        
		      </form>

		    </div>
		  </div>
		</div>
	 
	<?php endforeach; ?>
	
</div>
<div class="container-fluid">
	
	<?php echo $this->session->flashdata('pesan'); ?>

	<h5 class="text-gray mb-3"><i class="fas fa-fw fa-table"></i> Data Petugas</h5>
	
	<hr>

	<!-- Button modal tambah-->
	<button type="button" class="btn btn-sm btn-warning mb-3" data-toggle="modal" data-target="#exampleModal">
	  <i class="fas fa-fw fa-sm fa-plus"></i>Tambah Data Petugas 
	</button>
	
	<table id="tabel_ptg" class="table table-dark table-borderless table-striped">
		<thead>
			<tr class="bg-warning text-dark">
				<th>No.</th>
				<th>Nama Petugas</th>
				<th>Username</th>
				<th>Akses</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php  
			if (empty($petugas)) {
			?>
				<tr>
					<td><?php echo 'Data tidak tersedia' ?></td>
				</tr>
			<?php
			}else{
				$no=1;
				foreach ($petugas as $ptg):
			?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $ptg->nama ?></td>
				<td><?php echo $ptg->username ?></td>
				<td><?php echo $ptg->level ?></td>

				<td>
					<a href="javascript:;" class="btn btn-sm btn-primary item_edit" data="<?php echo $ptg->id_petugas ?>"><i class="fa fa-edit"></i></a>
					
					<?php if ($ptg->id_petugas != $id_petugas) { ?>
							<a href="<?php echo base_url('admin/data/hapus_petugas/'.$ptg->id_petugas) ?>" onclick="javascript: return confirm('Yakin akan dihapus?')"><div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div></a>
					<?php }else{ ?>
							<div class="btn btn-sm btn-secondary" onclick="javascript: alert('Tidak bisa menghapus data sendiri')"><i class="fa fa-trash"></i></div>
					<?php } ?>
				</td>	
			</tr>	
			<?php
				endforeach; 
			}
			?>
		</tbody>
	</table>

	<!-- Modal Tambah Petugas-->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      
	      <div class="modal-header bg-warning">
	        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Petugas</h5>
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
	        		<label>Akses</label>
	        		<select name="level" class="form-control">
	        			<?php foreach ($level as $lvl): ?>
	        				<option value="<?php echo $lvl->id_level ?>"><?php echo $lvl->level ?></option>	
	        			<?php endforeach ?>	
	        		</select>
	        	</div>

	        	<div class="modal-footer mt-3">
	        		<input id="input_url" type="hidden" value="<?php echo base_url('admin/data/tambah_petugas') ?>">
	        		<input id="input" type="submit" class="btn btn-warning text-dark" value="Simpan">
	        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
	        	</div>
	        </div>

	      </form>  
	    
	    </div>
	  </div>
	</div>

	<!-- Modal Ubah Data Petugas -->
    <div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelUbah" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	       
	      <div class="modal-header bg-warning">
	        <h5 class="modal-title" id="exampleModalLabelUbah">Ubah Data Petugas</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>

	      <form id="update_form" method="post">
	      	
	      	<div class="modal-body">
	        	<input type="hidden" name="id_petugas" >

	        	<div class="form-group">
	        		<label>Nama</label>
	        		<input type="input" name="nama" class="form-control" required>
	        	</div>

	        	<div class="form-group">
	        		<label>Username</label>
	        		<input type="input" name="username" class="form-control" required>
	        	</div>
	        	
	        	<div class="form-group">
	        		<label>Akses</label>
	        		<select name="level" class="form-control">
	        			<?php if($ptg->id_level==1){ ?>
                            <option value="1" selected>admin</option>
                            <option value="2">petugas</option>
                        <?php }else if($ptg->id_level==2){ ?>
                            <option value="2" selected>petugas</option>
                            <option value="1">admin</option>
                        <?php } ?>
	        		</select>
	        	</div>
	        		
	        	<hr>

	        	<label id="ubah_password" type="button" class="w-100 dropdown-toggle">Ubah Password </label>
				<div class="form-group row" id="form_ubah_password" style="display: none">
					<div class="col">
						<input type="password" name="password" class="form-control" placeholder="Password Lama">
					</div>
					
					<div class="col">
						<input type="password" name="password_new" class="form-control" placeholder="Password Baru">
					</div>
				</div>

	        	<div class="modal-footer mt-2 ">
	        		<input id="update_url" type="hidden" value="<?php echo base_url('admin/data/ubah_petugas') ?>">
	        		<input id="update" type="submit" class="btn btn-warning text-dark" value="Ubah">
	        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
	        	</div>
	        </div>

	      </form>

	    </div>
	  </div>
	</div>
	
</div>
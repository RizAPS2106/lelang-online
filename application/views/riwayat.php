<div class="container">
	
	<?php
		$id_user = $this->session->userdata('id_user');

		if (empty($riwayat)) {
	?>
			<div class="card mb-3 mt-4 w-100">
			  <div class="row no-gutters">
			    <div class="col text-center">Data tidak tersedia</div>
			  </div>
			</div>
	<?php	
		} 
	?>

	<?php foreach ($riwayat as $rwy): ?>

		<?php 
			if ($rwy->status == 'dibuka') {
		?>
				<a href="<?php echo base_url().'lelang_transaksi/detail_lelang/'.$rwy->id_lelang ?>" class="text-decoration-none text-dark">
					<div class="card mb-3 mt-4 w-100">
					  <div class="row no-gutters">
					    <div class="col-md-3">
					      <img src="<?php echo base_url().'/uploads/'.$rwy->gambar ?>" height="230" class="card-img" alt="...">
					    </div>
					    <div class="col-md-9">
					      <div class="card-body">
					        <h5 class="card-title mb-4"><?php echo $rwy->nama_barang ?></h5>
					        <p class="card-text">
					        	<div class="row">
					        		<div class="col-3">Penawaran Tertinggi</div>
					        		:
					        		<div class="col-5"><?php echo rupiah($rwy->harga_akhir)?></div>
					        	</div>

					        	<div class="row">
					        		<div class="col-3">Oleh</div>
					        		:
					        		<?php if ($id_user == $rwy->id_pemenang) { ?>
					        			<div class="col-5"><?php echo $rwy->nama_user ?> (Anda)</div>
					        		<?php }else{ ?>
					        			<div class="col-5"><?php echo $rwy->nama_user ?></div>
					        		<?php } ?> 
					        	</div>

					        	<div class="row">
					        		<div class="col-3">Status Lelang</div>
					        		: 
					        		<div class="col-5">
						        		<?php 
							        		if ($rwy->status == 'dibuka') {
							        			?><font class="text-success text-uppercase"><b><?php echo $rwy->status ?></b></font><?php
							        		}else if ($rwy->status == 'ditutup') {
							        			?><font class="text-danger text-uppercase"><b><?php echo $rwy->status ?></b></font><?php
							        		}  
							        	?>
						        	</div>
					        	</div>
					        </p>
					        <p class="card-text"><small class="text-muted">Penyelenggara :  <?php echo $rwy->nama_petugas ?><br>Tanggal Lelang : <?php echo $rwy->tgl_lelang ?></small></p>
					      </div>
					    </div>
					  </div>
					</div>
				</a>
		<?php
			}else if ($rwy->status == 'ditutup') {
		?>
				<a href="<?php echo base_url().'lelang_transaksi/detail_lelang/'.$rwy->id_lelang ?>" class="text-decoration-none text-dark">
				<div class="card mb-3 mt-4 w-100">
				  <div class="row no-gutters">
				    <div class="col-md-3">
				      <img src="<?php echo base_url().'/uploads/'.$rwy->gambar ?>" height="230" class="card-img" alt="...">
				    </div>
				    <div class="col-md-9">
				      <div class="card-body">
				        <h5 class="card-title mb-4"><?php echo $rwy->nama_barang ?></h5>
				        <p class="card-text">
				        	<div class="row">
				        		<div class="col-3">Harga Akhir</div>
				        		:
				        		<div class="col-5"><?php echo rupiah($rwy->harga_akhir)?></div>
				        	</div>

				        	<div class="row">
				        		<div class="col-3">Pemenang</div>
				        		: 
				        		<?php if ($id_user == $rwy->id_pemenang) { ?>
				        			<div class="col-5"><?php echo $rwy->nama_user ?> (Anda)</div>
				        		<?php }else{ ?>
				        			<div class="col-5"><?php echo $rwy->nama_user ?></div>
				        		<?php } ?>
				        		
				        	</div>

				        	<div class="row">
				        		<div class="col-3">Status Lelang</div>
				        		: 
				        		<div class="col-5">
					        		<?php 
						        		if ($rwy->status == 'dibuka') {
						        			?><font class="text-success text-uppercase"><b><?php echo $rwy->status ?></b></font><?php
						        		}else if ($rwy->status == 'ditutup') {
						        			?><font class="text-danger text-uppercase"><b><?php echo $rwy->status ?></b></font><?php
						        		}  
						        	?>
					        	</div>
				        	</div>
				        </p>
				        <p class="card-text"><small class="text-muted">Penyelenggara :  <?php echo $rwy->nama_petugas ?><br>Tanggal Lelang : <?php echo $rwy->tgl_lelang ?></small></p>
				      </div>
				    </div>
				  </div>
				</div>
				</a>
		<?php
			} 
		?>

	<?php endforeach ?>
	
	<div class="row text-center mt-3 ml-5">
		<div class="col">
			<?php echo $pagination; ?>
		</div>
	</div>

</div>
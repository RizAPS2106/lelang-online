<!-- Dashboard -->
<div class="container">
	
	<?php if ($this->session->userdata('pencarian')){ ?>
		<label class="mt-3 pl-3 ml-5"><?php echo 'Hasil Pencarian dari : <b>'.$this->session->userdata('pencarian').'</b>' ?></label>
	<?php } ?>

	<?php 
		if ($this->session->userdata('lokasi') || $this->session->userdata('kategori') || $this->session->userdata('urutkan')){ 
			$lokasi = $this->session->userdata('lokasi');
			$kategori = $this->session->userdata('kategori');
			$urutkan = $this->session->userdata('urutkan');
			
			if ($lokasi == ''){
				$lokasi = 'Semua';
			}

			if ($kategori == ''){
				$kategori = 'Semua';
			}

			if ($urutkan == 'DESC') {
				$urutkan = 'Terbaru';
			}else if ($urutkan == 'ASC'){
				$urutkan = 'Terlama';
			} 	
	?>
			<label class="mt-3 pl-3 ml-5"><?php echo 'Lokasi : <b>'.$lokasi.'</b>' ?></label>
			<label class="mt-3 pl-3 ml-5"><?php echo 'Kategori : <b>'.$kategori.'</b>' ?></label>
			<label class="mt-3 pl-3 ml-5"><?php echo 'Urutkan dari : <b>'.$urutkan.'</b>' ?></label>
	<?php 
		} 
	?>

	<?php if ($this->session->userdata('pencarian') || ($this->session->userdata('lokasi') || $this->session->userdata('kategori') || $this->session->userdata('urutkan'))){ ?>
		<div class="row text-center ml-5">
	<?php }else{ ?>
		<div class="row text-center mt-3 ml-5">
	<?php } ?>

		<?php 
			if (empty($lelang)) {
				?>
					<div class="alert alert-secondary col" role="alert">
					  	Data Tidak Tersedia
					</div>
				<?php	
			} 
		?>

		<?php foreach ($lelang as $llg): ?>
				
			<a href="<?php echo base_url().'lelang_transaksi/detail_lelang/'.$llg->id_lelang; ?>" class="text-decoration-none text-dark">
			<div class="card ml-3 mb-3 shadow-sm mt-3" style="width: 15rem;height: 25rem;">
			  
			  <img src="<?php echo base_url().'uploads/'.$llg->gambar; ?>" height="160" class="card-img-top" alt="...">

			  <div class="card-body bg-warning">
			    <h5 class="card-title text-truncate"><b><?php echo $llg->nama_barang; ?></b></h5>
			    <p class="card-text text-truncate"><small><?php echo $llg->deskripsi_barang; ?></small></p>
			    <font class="mt-1"><b>Mulai dari </b></font>
			    <h5><span class="badge badge-success mb-1"><?php echo rupiah($llg->harga_akhir); ?></span></h5>
			    <font class="mt-1"><i class="fas fa-fw fa-map-marker-alt"></i> <?php echo $llg->lokasi ?></font><br>
			  </div>

			</div>
			</a>
		<?php endforeach ?>

	</div>

	<div class="row text-center mt-3 ml-5">
		<div class="col">
			<?php echo $pagination; ?>
		</div>		
	</div>

</div>
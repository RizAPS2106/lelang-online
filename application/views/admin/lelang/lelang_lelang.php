<div class="container-fluid">
	
	<?php echo $this->session->flashdata('pesan'); ?>

	<h5 class="text-gray mb-3"><i class="fas fa-fw fa-table"></i> Data Lelang</h5>
	
	<hr>
	
	<?php echo anchor('admin/lelang_lelang/tambah_lelang','<button class="btn btn-sm btn-warning mb-3"><i class="fas fa-fw fa-sm fa-plus"></i> Buka Lelang</button>') ?>

	<table class="table table-dark table-borderless table-striped" id="example">
		<thead>
			<tr class="bg-warning text-dark">
				<th>No.</th>
				<th>Nama Barang</th>
				<th>Tanggal Buka</th>
				<th>Harga Awal</th>
				<th>Harga Terbesar</th>
				<th>Status</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
		<?php 
			$no=1;
			foreach ($lelang as $llg):
		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $llg->nama_barang ?></td>
			<td><?php echo $llg->tgl_lelang ?></td>
			<td><?php echo rupiah($llg->harga_awal) ?></td>
			<td><?php echo rupiah($llg->harga_akhir) ?></td>
			<?php if ($llg->status == "dibuka") { ?>
				<td class="text-uppercase"><span class="badge badge-success"><?php echo $llg->status ?></span></td>	
			<?php }else if ($llg->status == "ditutup") { ?>
				<td class="text-danger text-uppercase"><span class="badge badge-danger"><?php echo $llg->status ?></span></td>
			<?php } ?>

			<td>
				<?php echo anchor('admin/lelang_lelang/detail_lelang/'.$llg->id_lelang,'<div class="btn btn-sm btn-success"><i class="fas fa-search-plus"></i></div>') ?>
			<?php if ($llg->status == "dibuka") { ?>
				<a href="<?php echo base_url('admin/lelang_lelang/ubah_lelang/'.$llg->id_lelang) ?>"><div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div></a>
			<?php }else if ($llg->status == "ditutup") { ?>
				<a href="" onclick="javascript: alert('Pelelangan sudah ditutup')"><div class="btn btn-sm btn-secondary"><i class="fa fa-edit"></i></div></a>
			<?php } ?>
				<a href="<?php echo base_url('admin/lelang_lelang/hapus_lelang/'.$llg->id_lelang) ?>" onclick="javascript: return confirm('Yakin akan di hapus?')"><div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div></a>
			</td>
		</tr>	
		<?php 
			endforeach; 
		?>
		</tbody>
	</table>
	
</div>
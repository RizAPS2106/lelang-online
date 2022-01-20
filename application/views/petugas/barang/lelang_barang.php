<div class="container-fluid">
	
	<?php echo $this->session->flashdata('pesan'); ?>

	<h5 class="text-gray mb-3"><i class="fas fa-fw fa-table"></i> Data Barang</h5>
	
	<hr>

	<?php echo anchor('petugas/lelang_barang/tambah_barang','<button class="btn btn-sm btn-warning mb-3"><i class="fas fa-fw fa-sm fa-plus"></i> Tambah Data Barang</button>') ?>

	<table class="table table-borderless table-striped table-dark" id="example">
		<thead>
			<tr class="bg-warning text-dark">
				<th>No.</th>
				<th>Nama Barang</th>
				<th>Lokasi</th>
				<th>Tanggal</th>
				<th>Harga Awal</th>
				<th>Kategori</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$no=1;
				foreach ($barang as $brg):
			?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td class="text-truncate"><?php echo $brg->nama_barang ?></td>
				<td><?php echo $brg->lokasi ?></td>
				<td><?php echo $brg->tgl ?></td>
				<td><?php echo rupiah($brg->harga_awal) ?></td>
				<td><?php echo $brg->kategori ?></td>
				
				<td>
					<?php echo anchor('petugas/lelang_barang/detail_barang/'.$brg->id_barang,'<div class="btn btn-success btn-sm"><i class="fa fa-search-plus"></i></div>'); ?>
					<a href="<?php echo base_url('petugas/lelang_barang/ubah_barang/'.$brg->id_barang) ?>"><div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div></a>
					<a href="<?php echo base_url('petugas/lelang_barang/hapus_barang/'.$brg->id_barang) ?>" onclick="javascript: return confirm('Yakin akan dihapus?')"><div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div></a>
				</td>
			</tr>	
			<?php 
				endforeach; 
			?>
		</tbody>
	</table>
</div>
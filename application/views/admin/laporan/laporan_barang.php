<!DOCTYPE html>
<html><head>
	<title>Laporan Barang</title>

	<style>
		#title {
			font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
		}

        #table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #label {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        }

        #table td, #table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #table tr:nth-child(even){background-color: #f2f2f2;}

        #table tr:hover {background-color: #ddd;}

        #table th {
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: left;
        }
    </style>

</head><body>

	<?php 

	    function rupiah($angka){
	        $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	        return $hasil_rupiah;
	    }   

	?>

	<center>
		<h3 id="title">DATA BARANG</h3>
		<?php if (isset($from) AND isset($to)){ ?>
			<label id="label"><?php echo date('d/m/Y', strtotime($from)) ?> - <?php echo date('d/m/Y', strtotime($to)) ?></label>
		<?php } ?>
	</center>
	
	<br>
	<br>

	<table id="table">
		
		<tr>
			<th>No.</th>
			<th>Nama</th>
			<th>Lokasi</th>
			<th>Tanggal Masuk</th>
			<th>Harga Awal</th>
			<th>Kategori</th>
		</tr>

		<?php 
			$no=1;

			if (empty($barang)) {
				?>
				<tr>
					<td colspan="6">Data Tidak tersedia</td>
				</tr>
				<?php
			}else{
				$total_harga_awal = 0;

				foreach ($barang as $brg):
					$total_harga_awal = $total_harga_awal + $brg->harga_awal;
		?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $brg->nama_barang ?></td>
						<td><?php echo $brg->lokasi ?></td>
						<td><?php echo $brg->tgl ?></td>
						<td><?php echo rupiah($brg->harga_awal) ?></td>
						<td><?php echo $brg->kategori ?></td>
					</tr>	
		<?php 
				endforeach;
					?>
					<tr align="center">
						<td colspan="6"><b>Jumlah Data : <?php echo --$no; ?></b></td>
					</tr>
					<tr align="center">
						<td colspan="6"><b>Total Harga Awal : <?php echo rupiah($total_harga_awal); ?></b></td>
					</tr>	
					<?php
			} 
		?>

	</table>

</body></html>

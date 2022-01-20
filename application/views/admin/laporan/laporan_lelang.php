<!DOCTYPE html>
<html><head>
	<title>Laporan Lelang</title>
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
		<h3 id="title">DATA LELANG</h3>
		<?php if (isset($from) AND isset($to)){ ?>
			<label id="label"><?php echo date('d/m/Y', strtotime($from)) ?> - <?php echo date('d/m/Y', strtotime($to)) ?></label>
		<?php } ?>
	</center>
	
	<br>
	<br>

	<table id="table">
		
		<tr>
			<th>No.</th>
			<th>Nama Barang</th>
			<th>Tanggal Lelang</th>
			<th>Tanggal Tutup</th>
			<th>Harga Awal</th>
			<th>Harga Akhir</th>
			<th>Penawar Tertinggi</th>
			<th>Penyelenggara</th>
			<th>Status</th>
		</tr>

		<?php 
			$no=1;

			if (empty($lelang)) {
				?>
				<tr>
					<td colspan="9">Data tidak tersedia</td>
				</tr>
				<?php
			}else{
				$total_harga_akhir = 0;
				
				foreach ($lelang as $llg):
					$total_harga_akhir = $total_harga_akhir + $llg->harga_akhir;
		?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $llg->nama_barang ?></td>
						<td><?php echo $llg->tgl_lelang ?></td>
						<?php if ($llg->tgl_tutup == ''){ ?>
							<td> - </td>
						<?php }else{ ?>
							<td><?php echo $llg->tgl_tutup ?></td>
						<?php } ?>	
						<td><?php echo rupiah($llg->harga_awal) ?></td>
						<td><?php echo rupiah($llg->harga_akhir) ?></td>
						<?php  
							if ($llg->nama_msy == '') {
								?><td>-</td><?php
							}else{
								?><td><?php echo $llg->nama_msy ?></td><?php
							}
						?>
						<td><?php echo $llg->nama_ptg ?>
						<td><?php echo $llg->status ?></td>
					</tr>	
		<?php 
				endforeach;
					?>
					<tr align="center">
						<td colspan="9"><b>Jumlah Data : <?php echo --$no; ?></b></td>
					</tr>
					<tr align="center">
						<td colspan="9"><b>Total Harga Akhir : <?php echo rupiah($total_harga_akhir); ?></b></td>
					</tr>	
					<?php
			} 
		?>

	</table>

</body></html>

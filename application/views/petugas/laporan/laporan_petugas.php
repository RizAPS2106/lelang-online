<!DOCTYPE html>
<html><head>
	<title>Laporan Petugas</title>
	<style>
		#title {
			font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
		}

        #table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
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

	<center><h3 id="title">DATA PETUGAS</h3></center>
	
	<br>
	<br>

	<table id="table">
		
		<tr>
			<th>No.</th>
			<th>Nama Petugas</th>
			<th>Username</th>
		</tr>

		<?php 
			$no=1;

			if (empty($petugas)) {
				?>
				<tr>
					<td colspan="3">Data Tidak Tersedia</td>
				</tr>
				<?php
			}else{
				foreach ($petugas as $ptg):
		?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $ptg->nama ?></td>
						<td><?php echo $ptg->username ?></td>
					</tr>	
		<?php 
				endforeach;
					?>
					<tr align="center">
						<td colspan="9"><b>Jumlah Data : <?php echo --$no; ?></b></td>
					</tr>	
					<?php
			} 
		?>

	</table>

</body></html>

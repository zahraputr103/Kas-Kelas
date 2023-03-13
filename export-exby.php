<?php 

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan-Kas.xls"); 


require 'function.php';
$bayar = query("SELECT * FROM pemasukan");
?>


<p align="center" style="font-weight:bold;font-size:16pt">Laporan Pembayaran Kas</p>

<table border="1" cellspacing="0" cellpadding="10" align="center">
			<tr bgcolor="a8a8a8">
				<th>No</th>
				<th>Tanggal</th>
				<th>Nama Siswa</th>
                <th>Bulan</th>
				<th>Minggu</th>
                <th>Bayar</th>
			<?php $i = 1; ?>
         	<?php foreach( $bayar as $row) :?>
			</tr>
			<tr>
            	<td><?= $i; ?></td>
            	<td><?= $row["tanggal"];?></td>
            	<td><?= $row["nama"];?></td>
				<td><?= $row["bulan"];?></td>
                <td><?= $row["minggu"];?></td>
                <td><?= $row["bayar"];?></td>
       		</tr>
			<?php $i++?>
    		<?php endforeach;?>
		</table>

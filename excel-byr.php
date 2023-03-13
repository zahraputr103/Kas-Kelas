<?php 
require 'functions.php';
$data = query("SELECT * FROM pemasukan");
?>


<p align="center" style="font-weight:bold;font-size:16pt">Laporan Pembayaran Kas</p>

<table border="1" cellspacing="0" cellpadding="10" align="center">
			<tr  bgcolor="a8a8a8">
				<th>No</th>
				<th>Tannggal Bayar</th>
				<th>Nama Siswa</th>
                <th>Bulan</th>
                <th>Minggu</th>
                <th>Bayar</th>
			<?php $i = 1; ?>
         	<?php foreach( $data as $row) :?>
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

<p align="center">
<input type="button" value="Export Excel" onclick="window.open('export-exby.php')">
<input type="button" value="Export PDF" onclick="window.open('export-pdf.php')">
</p>
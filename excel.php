<?php 
require 'functions.php';
$data = query("SELECT * FROM namasiswa");
?>


<p align="center" style="font-weight:bold;font-size:16pt">DATA SISWA</p>

<table border="1" cellspacing="0" cellpadding="10" align="center">
			<tr  bgcolor="a8a8a8">
				<th>No</th>
				<th>Nisn</th>
				<th>Nama Siswa</th>
                <th>Jenis Kelamin</th>
			<?php $i = 1; ?>
         	<?php foreach( $data as $row) :?>
			</tr>
			<tr>
            	<td><?= $i; ?></td>
            	<td><?= $row["nisn"];?></td>
            	<td><?= $row["nama_siswa"];?></td>
                <td><?= $row["jk"];?></td>
       		</tr>
			<?php $i++?>
    		<?php endforeach;?>
		</table>

<p align="center">
<input type="button" value="Export Excel" onclick="window.open('export-excel.php')">
<input type="button" value="Export PDF" onclick="window.open('export-pdf.php')">
</p>
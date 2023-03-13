<?php


use Dompdf\Dompdf;

require 'vendor/autoload.php';

require 'function.php';

$db = query("SELECT * FROM namasiswa ");

$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>
</head>
<body>
    <table border="1" cellspacing="1" cellpadding="10">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nisn</th>
                <th>Nama</th>
                <th>Jenis kelamin</th>
            </tr>';
            $i = 1;
            foreach($db as $d) {
                $html .= '<tr>
                            <td>'. $i++.'</td>
                            <td>'.$d["nisn"].'</td>
                            <td>'. $d["nama_siswa"].'</td>
                            <td>'. $d["jk"].'</td>
                        </tr>';
            }
 $html .='       </thead>
    </table>
</body>
</html>';

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4','portrait');
$dompdf->render();
$dompdf->stream('Siswa.pdf',array('Attachment'=>false));

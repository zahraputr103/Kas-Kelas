<?php


use Dompdf\Dompdf;

require 'vendor/autoload.php';

require 'function.php';

$db = query("SELECT * FROM pemasukan ");

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
                <th>Tanggal Bayar</th>
                <th>Nama</th>
                <th>Bulan</th>
                <th>Minggu</th>
                <th>Bayar</th>
            </tr>';
            $i = 1;
            foreach($db as $d) {
                $html .= '<tr>
                            <td>'. $i++.'</td>
                            <td>'. $d["tanggal"].'</td>
                            <td>'. $d["nama"].'</td>
                            <td>'. $d["bulan"].'</td>
                            <td>'. $d["minggu"].'</td>
                            <td>'. $d["bayar"].'</td>
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
$dompdf->stream('Pembayaran.pdf',array('Attachment'=>false));
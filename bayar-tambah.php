<?php
session_start();

if( !isset($_SESSION["login"]) ) {
    header ("Location: login.php");
    exit;
 }
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <style type="text/css">
        ul{
            list-style-type: none;
            margin : 0px;
            padding: 0px
            ;
            overflow: hidden;
        }

        li{
            float: left;
        }
        li a{
            display: block;
            text-align: center;
            padding: 14px;
            text-decoration: none;
        }
        body{
            margin: 0;
            padding: 0;
            font-family: 'Oswald', sans-serif;
            background-image: url("images/p.jpg");  
            font-size: 19px; 
        }
    </style>
</head>



<br><br>
<h3 style="text-align: center ; margin-bottom:30px; font-size: 35px; font-family:Xanh Mono;">Tambah Pembayaran<h3>
   <form action="" method="post" >
       <table style="displa:block;margin:auto; font-size:25px;"><br>
            <tr>
                <td> Tanggal </td>
                <td><input type="date" name="tanggal">
                </td>
            </tr>
            <tr>
                <td> Nama </td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td> Bulan </td>
                <td><select  name="mon">
                    <option value=""></option>
                    <option value="Jan">Januari</option>
                    <option value="Feb">Februari</option>
                    <option value="MarCH">Maret</option>
                    <option value="Aprl">April</option>
                    <option value="Mei">Mei</option>
                    <option value="jun">Juni</option>
                    <option value="July">Juli</option>
                    <option value="August">Agustus</option>
                    <option value="Sep">September</option>
                    <option value="Oct">Oktober</option>
                    <option value="Nov">November</option>
                    <option value="Des">Desember</option>
                </td>
            </tr>
            <tr>
                <td> Minggu </td>
                <td><select name="wek">
                    <option value="pilih"></option>
                    <option value="1">Ke 1</option>
                    <option value="2">Ke 2</option>
                    <option value="3">Ke 3</option>
                    <option value="4">Ke 4</option>
                    <option value="5">Ke 5</option>
                    <option value="6">Ke 6</option>
                    <option value="7">Ke 7</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td> Bayar </td>
                <td><input type="text" name="sok"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan" name="proses"></td>
            </tr>
</table>
</form>

<?php
include "koneksi.php";
$no=1;
if (isset($_POST['proses'])){
    mysqli_query($koneksi, "insert into pemasukan set
    tanggal= '$_POST[tanggal]',
    nama= '$_POST[nama]',
    bulan= '$_POST[mon]',
    minggu= '$_POST[wek]',
    bayar= '$_POST[sok]'
    ");
$no++;
    echo "Data Tersimpan.";
    echo "<meta http-equiv=refresh content=1;URL='pembayaran.php'>";
}
?>
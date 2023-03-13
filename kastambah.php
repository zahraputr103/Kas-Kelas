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
<h3 style="text-align: center ; margin-bottom:30px; font-size: 35px; font-family:Xanh Mono;">Tambah Kas<h3>
   <form action="" method="post" >
       <table style="displa:block;margin:auto; font-size:25px;"><br>
            <tr>
                <td>Keterangan </td>
                <td><input type="text" name="ket">
                </td>
            </tr>
            <tr>
                <td> Masuk</td>
                <td><input type="text" name="in"></td>
            </tr>
            <tr>
                <td> Keluar</td>
                <td><input type="text" name="out"></td>
               
            </tr>
            <tr>
                <td> Saldo </td>
                <td><input type="text" name="saldo"></td>
                
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
    mysqli_query($koneksi, "insert into kas set
    keterangan = '$_POST[ket]',
    masuk = '$_POST[in]',
    keluar = '$_POST[out]',
    saldo = '$_POST[saldo]'
    ");
$no++;
    echo "Data Tersimpan.";
    echo "<meta http-equiv=refresh content=1;URL='kas.php'>";
}
?>
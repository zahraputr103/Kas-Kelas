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
    <title>Ubah Data</title>
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
            font-size: 25px; 
        }
    </style>
</head>


<?php
include 'koneksi.php';
$qsl= mysqli_query($koneksi, "SELECT * FROM namasiswa WHERE no='$_GET[ds]'");
$rp= mysqli_fetch_array($qsl);

?>

<br><br><br>
<h3 style="text-align: center ; margin-bottom:30px; font-size: 33px; font-family:Xanh Mono;">EDIT DATA</h3>

<form action="" method="post">
    <table style= "displa:block ; margin:auto; font-size: 20px; "><br>
        <tr>
            <td> NISN </td>
            <td> <input type="text" name="nisn" value= "<?php echo $rp['nisn'];?>"> </td>
        </tr>
        <tr>
            <td> Nama Siswa </td>
            <td> <input type="text" name="nama_siswa" value= "<?php echo $rp['nama_siswa'];?>"> </td>
        </tr>
        <tr>
            <td> Jenis Kelamin </td>
            <td> <select name="jk" value= "<?php echo $rp['jk'];?>">
            <option value=""></option>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option></select></td>
        </tr>
        <tr> 
            <td></td>
            <td><input type="submit" value= "simpan" name= "proses"></td>
        </tr>
</table>
</form>

<?php
include "koneksi.php";
$no=1;
if(isset($_POST['proses'])){
    mysqli_query($koneksi, "UPDATE namasiswa set 
    nisn = '$_POST[nisn]',
    nama_siswa= '$_POST[nama_siswa]',
    jk = '$_POST[jk]'
    WHERE no = '$_GET[ds]' ");
    $no++;

    echo "Data Baru telah di edit!";
    echo "<meta http-equiv=refresh content=2;URL='siswa.php'>";
}

?>



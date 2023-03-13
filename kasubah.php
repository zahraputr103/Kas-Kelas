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
    <title>KAS XI RPL</title>
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

        
<?php
include 'koneksi.php';
$pp = mysqli_query($koneksi, "SELECT * FROM kas WHERE id='$_GET[ks]'");
$pq= mysqli_fetch_array($pp);


?>

<body>
    <br><br><br>
<h3 style="text-align: center ; margin-bottom: 20px; font-size: 33px; font-family:Xanh Mono;"> Edit Data <h3>

    <form action="" method="post">
        <table STYLE= "displa:block; margin:auto; font-siz: 20px"><br>
            <tr>
                <td> Keterangan </td>
                <td> <input type="text" name="ket" value = "<?php echo $pq['keterangan'];?>"></td>
            </tr>
            <tr>
                <td> Masuk </td>
                <td><input type="text" name="in" value = "<?php echo $pq['masuk'];?>" ></td>
            </tr>
            <tr>
                <td> Keluar </td>
                <td><input type="text" name="out" value = "<?php echo $pq['keluar'];?>">
                </td>
            </tr>
            <tr>
                <td> Saldo </td>
                <td><input type="text" name="saldo" value = "<?php echo $pq['saldo'];?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan" name="proses"></td>
            </tr>
</table>
</form>
</body>
<?php
include "koneksi.php";
$id=1;
if (isset($_POST['proses'])){
    mysqli_query($koneksi, "UPDATE kas SET
    
    keterangan= '$_POST[ket]',
    masuk= '$_POST[in]',
    keluar= '$_POST[out]',
    saldo= '$_POST[saldo]',
    WHERE id= '$_GET[ks]'");
$id++;

    echo "Data Telah Di Ubah !";
    echo "<meta http-equiv=refresh content=2;URL='kas.php'>";
}
?>
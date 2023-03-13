<?php
    include "koneksi.php";
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
            font-family: Times , Helvetica, sans-serif;
        }

        table{
            border-collapse: collapse;
            font-size: 14pt;
            border: 1px solid black;
        }

        td{
            padding: 5px;
            height: 25px;
            font-family: 'Cabin';
        }
        
        th{
            background-color: #FF9F9F;
            color: black;
            height: 25px;
           
        }
        
        .btn-delete{
            border:1px ;
            height: 25px;
            width: 25px;
            
           
        }

        .btn-edit{
            border:1px;
            width: 25px;
            height: 25px;
           
        }

        * {
                margin: 0;
                padding:0;
            }
            body{
                font-family: 'montserrat', sans-serif;
            }

            .b{
                float: left;
                display:block;
            }

            nav {
                display: flex;
                background-color: #AD8B73;
                justify-content: space-around;
                padding: 0px 0;
                color: black;
            }
            .b{
                font-family: 'Playfair Display';
                font-size: 25px;
                margin-top: 10px;
            }
            nav ul{
                display: flex;
                list-style-type: none;
                widht: 30%;
                justify-content: space-around;
                font-size: 20px;
                margin-left:40%;
                color: black;
                text-decoration: none;
                font-family: 'Dancing Script';
            }
            
            
            nav ul li a:hover {
                color: black;
                font-size: 18px;
                font-family: 'Poor Story';
            }
            .konten {
                display:grid;
                margin:8px 250px 20px 250px;
                font-family: 'Poor Story';
                font-size: 22px;
            }
           
    
    </style>
</head>
<body bgcolor= "F5EFE6">

    <nav class=a>
        <h3 class="b">KAS KELAS XI RPL </h3>
<ul>
    <li><a href = "index.php" style="color:#000000;"> Home </a></li>
    <li><a href = "siswa.php" style="color:#000000;"> &ensp;Data Siswa</a></li>
    <li><a href = "pembayaran.php" style="color:#000000;">&ensp;Pembayaran </a></li>
    <li><a href = "kas.php" style="color:#000000;">&ensp;Data Kas</a></li>
    <li><a href = "logout.php" style="color:#000000; float: right;" >Log Out</a></li>
    
</ul>
    </nav>
 <br><br> 
 <a href="kastambah.php" style="font-size: 24px; margin-left: 300px; color:#000000;">Tambah Data  </a>
    <br><br>

    
    <form action="" method="get">
            <input type="text" name="cari" placeholder="&ensp;&ensp;Masukan kata kunci.." style="border:2px solid black; 
            margin-left: 300px; border-radius:10px; widht: 30px; height:28px">
            <button type="submit" value="cari" style="border:2px solid black;
            border-radius:5px; widht: 30px; height:28px">&ensp;Search&ensp;</button>
 </form>
<br>
 <?php
 if(isset($_GET['cari'])){
    $cari = $_GET ['cari'];
 }
 ?>
 

 
<div class="konten">
     <table border="1" cellpadding="10" cellspacling=""  >
        <div class="th">

        <tr >
            <th>No</th>
            <th>KETERANGAN</th>
            <th>MASUK</th>
            <th>KELUAR</th>
            <th>SALDO</th>
            <th colspan="2"> Aksi</th>
            
        </tr>
</div>

<style>
    .th {
        font-size = 22px;
    }
    </style>
 
        <?php
        if (isset($_GET['cari'])){
             $ambildata = mysqli_query($koneksi, "select * from kas where
             keterangan like '%".$cari."%' or
             masuk like '%".$cari."%' or
             keluar like '%".$cari."%' or
             saldo like '%".$cari."%' ");
        }
        else {
            $ambildata = mysqli_query($koneksi, "SELECT * FROM kas");
        }
       $no = 1;
        while($tampil = mysqli_fetch_array($ambildata)){
            ?>
            <tr > 
            <td><?php echo $no++;?></td>
            <td><?php echo $tampil['keterangan'];?></td>
            <td><?php echo $tampil['masuk'];?></td>
            <td><?php echo $tampil['keluar'];?></td>
            <td><?php echo $tampil['saldo'];?></td>
            <td><a href= 'kasubah.php?ks=<?= $tampil['id']?>' ><img src='images/edit.jpg' class='btn-edit'></a></td>
            <td><a href='?ks=$tampil[id]' id="ks"><img src='images/delete.jpg' class='btn-delete'> </a></td>
            </tr>        
       <?php }?>
</table>
</div>
<a href="print.php" style="display:flex; margin-left: 370px; text-decoration:none;  font-size: 25px;">PDF</a>
<a href="export-excel.php" style="display:flex; justify-content:center; text-decoration:none;  font-size: 25px;">EXCEL</a>

<?php
if (isset($_GET['ks'])){
    mysqli_query($koneksi, "DELETE FROM kas WHERE id='$_GET[ks]'");

    echo "Data telah terhapus";
    echo "<meta http-equiv=refresh content=2;URL='kas.php'>";
}

?>
    </body>
    </html>

        
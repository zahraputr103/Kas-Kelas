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
    <title>KAS XI RPL</title>
    <meta charset="UTF-8">
    <meta name="description" contents="Niagahoster">
    
    <style type="text/css">
            ul{
                list-style-type: none;
                margin : 0px;
                padding: 0px
                ;
                overflow: hidden;
                display: flex;
            }
            .p p {
                font-size : 43px;
                font-family : georgia;
                text-align : center;
                color : black;
                margin-top: 250px;
            }
            
            .a a{
                display: block;
                text-align: center;
                padding: 14px;
                text-decoration: none;
                
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
        </style>
</head>
<body bgcolor="F5EFE6">



    <nav class=a>
        <h2 class="b">KAS KELAS XI RPL</h2>
<ul>
    <li><a href = "index.php" style="color:#000000;">Home</a></li>
    <li><a href = "siswa.php" style="color:#000000;">&ensp;Data Siswa</a></li>
    <li><a href = "pembayaran.php" style="color:#000000;">&ensp;Pembayaran</a></li>
    <li><a href = "kas.php" style="color:#000000;">&ensp;Data Kas</a></li>
    <li><a href = "logout.php" style="color:#000000; float: right;" >Log Out</a></li>
        </ul>
        </nav>
 
       


<div class="p">
    <p>SELAMAT DATANG DI <br> DATA KAS XI RPL</p>
</div>
<style>
    
    </style>
</body>
</html>

        
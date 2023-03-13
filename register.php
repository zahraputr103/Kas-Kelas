<?php

require 'function.php';

if(isset($_POST["register"])) {

    if(registrasi($_POST) > 0) {
   
        echo "<script>
                alert('user baru berhasil di tambahkan');
                document.location.href = 'login.php';
                </script>";
    }
} else {
    echo mysqli_error($conn);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <style>
        
        ul {
            list-style-type: none;
                margin : 0px 0px 10px;
                padding: 10px;
                overflow: hidden;
                text-align: center;
                font-size: 30px;
                font-family: 'Cabin';
               
        }
        body{
            margin: 0;
            padding: 0;
            font-family: 'Oswald', sans-serif;
            background-image: url("images/p.jpg");
            
        }
        li{
            font-size:10
        }
        
    </style>
    <link rel="stylesheet" href="regist.css">
</head>

<body>
<br><br><br><br><br>

<div class="container">
    <form  action="" method="POST">

    <h1 class="title" style="text-align: center; font-size:38px; font-family: 'Timmana'">Registrasi</h1>
    
    <ul>
        <li>
            <div class="user">
                <label for="username" style="font-size: 20px;">Username :</label>
                <input type="text" name="username" id="username" placeholder="Masukan Username">
            </div>
        </li> 
       
        <li>
            <div class="password">
                <label for="password" style="font-size: 20px;">Password :</label>
                <input type="password" name="password" id="password" placeholder="Masukan Password">
            </div>
        </li>
        
        <li>
            <div class="password1">
                <label for="password2" style="font-size: 20px;">Konfirmasi Password :</label>
                <input type="password" name="password2" id="password2" placeholder="Konfirmasi Password">
            </div>
        </li>
        <br>
        <li> 
            <div class="submit">
                <button type="submit" name="register" value="Daftar" style="font-size: 15px;">DAFTAR</button>
            </div>
        </li> 
    </ul>
 
    </form>
</div>

</body>
</html>
<?php
session_start();

if (isset($_SESSION["login]"])){
    header ("Location: index.php");
    exit;
}

include 'function.php';

if (isset ($_POST["login"]) ) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username'" );

    //cek username
    if( mysqli_num_rows($result) === 1 ) {

        //cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row ["password"])) {
            //set session
            $_SESSION["login"] = true;
            
            header ("Location: index.php");
            exit;
        }
    }

    $error = true;  
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOG IN</title>
    <style>
        ul {
            list-style-type: none;
                margin : 0px;
                padding: 0px;
                overflow: hidden;
                text-align: center;
                font-size: 30px;
               
        }
        body{
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background-image: url("images/p.jpg");
            
        }
        li{
            font-size:10
        }

    </style>
</head>
<body>
<br><br><br><br>
    <h1 style="text-align: center; font-size:38px; font-family: 'Timmana'">LOG IN</h1>

    <?php if (isset ($error)): ?>
        <p style = "color: black; font-style: italic; text-align: center; ">Username / password salah</p>
    <?php endif; ?>
    <form action = "" method = "POST">

    <ul>
        <li>
            <label for="username">Username :</label>
            <input type="text" name="username" id="username">
        </li>
        <br>
        <li>
            <label for="password">Password :</label>
            <input type="password" name="password" id="password">
        </li>
        <br>
        <p style="font-size:18px;">Belum punya akun? &ensp;<a href="register.php" style="font-size:18px;">Buat Akun</a>
        </p>
        <li>
            <button type="submit" name="login" style="font-size: 20px;">Log in</button>
        </li>
    </ul>
        
    
    </form>
</body>
</html>
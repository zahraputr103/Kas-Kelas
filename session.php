<?php

session_start();
if(!isset($_SESSION['username'])){
    hrader("location:login.php");
}
?>
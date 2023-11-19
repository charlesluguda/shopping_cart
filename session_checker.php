<?php 
session_start();

if(empty($_SESSION['Sno'])){
    header("location:login.php");
    die();
}
?>
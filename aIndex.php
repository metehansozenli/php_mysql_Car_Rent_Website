<!DOCTYPE html>
<html>
    <head>
        <title>Anasayfa</title>
        <meta charset="UTF-8">
    </head>
    <body class="bg">
    <style>
        /*Arkaplanın ekrana tam olarak sığması için*/
        .bg {background-image: url("imgs/adminbg.webp"); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            width: 100vw;
            height: 100vh;
        }
    </style>
    </body>
<?php
    session_start();
    if(!isset($_SESSION['adminName'])) {
        header("Location: adminLogin.php");
        exit();
    }    
    else {
        require_once "config.php";
        require_once "navbarAdmin.html";
    }
?>
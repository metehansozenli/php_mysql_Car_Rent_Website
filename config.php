<?php
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'epiz_34228418_arac_kiralama';

    $connect = mysqli_connect($server,$user,$password,$db);
    mysqli_set_charset($connect, "utf8mb4");
    if (!$connect) {
        echo "MySQL sunucu ile baglanti kurulamadi! </br>";
        echo "HATA: " . mysqli_connect_error();
        exit;
    }

    
?>

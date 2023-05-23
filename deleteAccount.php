<?php
    require_once("config.php");
    session_start();
    if(!isset($_SESSION['userID']))
        header("Location: login.php");
    else{
        $id = $_SESSION['userID'];
        $sql = "DELETE FROM `kullanici` WHERE `Kullanici_ID`= '$id'";

        $result = mysqli_query($connect,$sql);

        if(!$result)
            echo '<br>Hata:' . mysqli_error($connect);
        else//kullanici silindikten sonra anasayfaya dön
            header("Location: logout.php");
        mysqli_close($connect);
    }
?>
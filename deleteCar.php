<?php
    require_once("config.php");
    session_start();
    if(!isset($_SESSION['adminName']))
        header("Location: adminLogin.php");
    else{
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql = "DELETE FROM `arac` WHERE `Arac_ID`= '$id'";

            $result = mysqli_query($connect,$sql);

            if(!$result)
                echo '<br>Hata:' . mysqli_error($connect);
            else
                header("Location: adminListCars.php");
            mysqli_close($connect);
        }
        else // arac_id get ile alinmadiysa anasayfaya don
            header("Location: adminIndex.php");
    }
?>
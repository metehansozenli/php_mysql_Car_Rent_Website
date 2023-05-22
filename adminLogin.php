<!DOCTYPE html>
<html>
    <head>
        <title>Admin Girişi</title>
        <meta charset="UTF-8">
    </head>
    <body>
<?php
    session_start();
    require_once "config.php";
    require_once "navbar.html";
    
    if(isset($_POST["adminName"]) && isset($_POST["adminPassword"])){
        $adminName = $_POST["adminName"];
        $adminPass = $_POST["adminPassword"];
        $pass_hash = hash("sha256", $adminPass);

        $sql = "SELECT * FROM `admin` WHERE `Kullanici_Adi` = '$adminName' AND `Sifre` = '$pass_hash'";
        $q = mysqli_query($connect, $sql);

        
        if(!$q){
            echo "Bir Hata meydana geldi";
            exit;
        }
        $login = mysqli_num_rows($q);

        if ($login==1)
            $_SESSION['adminName'] = $adminName;
        else
            $message = "<label class='text-danger'>Kullanıcı adı veya şifre yanlış</label>";
    }
    if(isset($_SESSION['adminName'])) 
        header("Location: aIndex.php");
    else {
?>
    <div class="container col-md-4 mt-2">
        <form action="adminLogin.php"  method="POST">
            <p class="display-4 text-center">Giriş Yapın</p>
            <?php if(isset($message)) echo $message; ?>
            <div class="form-group">
            <label for="name">Kullanıcı Adı</label>
            <input type="text" class="form-control" id="name" name="adminName">
            </div>
            <div class="form-group">
            <label for="pass">Şifre</label>
            <input type="password" class="form-control" id="pass" name="adminPassword">
            </div>
            <button type="submit" class="btn btn-primary">Giriş Yap</button>
        </form>
        <hr>
        <a href="login.php">Kullanıcı Girişi</a>
    </div>
    
<?php
    }
    mysqli_close($connect);
?>
</html>
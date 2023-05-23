<!DOCTYPE html>
<html>
    <head>
        <title>Üye Girişi</title>
        <meta charset="UTF-8">
    </head>
    <body>
<?php
    session_start();
    require_once "config.php";
    require_once "navbar.html";
    
    if(isset($_POST["userEmail"]) && isset($_POST["userPassword"])){
        $email = $_POST["userEmail"];
        $pass = $_POST["userPassword"];
        $pass_hash = hash("sha256", $pass);

        $sql = "SELECT * FROM `kullanici` WHERE `eposta` = '$email' AND `Sifre` = '$pass_hash'";
        $result = mysqli_query($connect, $sql);

        
        if(!$result){
            echo "Bir Hata meydana geldi";
            exit;
        }
        $login = mysqli_num_rows($result);
        //login olmus ise 
        if ($login==1){
            $sql = "SELECT `Kullanici_ID` FROM `kullanici` WHERE `eposta` = '$email'";
            $result2 = mysqli_query($connect, $sql);
            $row = mysqli_fetch_assoc($result2);
            $_SESSION['userEmail'] = $email;
            $_SESSION['userID'] = $row["Kullanici_ID"];
        }    
        else
            $message = "<label class='text-danger'>Kullanıcı adı veya şifre yanlış</label>";
    }
    //session baslamıssa login ekran gelmemesi
    if(isset($_SESSION['userEmail'])) 
        header("Location: index.php");
    else {
?>
    <div class="container col-md-4 mt-2">
        <form action="login.php"  method="POST">
            <p class="display-4 text-center">Giriş Yapın</p>
            <?php if(isset($message)) echo $message; ?>
            <div class="form-group">
            <label for="email">Email address</label>
            <input type="text" class="form-control" id="email" name="userEmail" placeholder="email@example.com">
            </div>
            <div class="form-group">
            <label for="pass">Password</label>
            <input type="password" class="form-control" id="pass" name="userPassword" placeholder="Şifre">
            </div>
            <button type="submit" class="btn btn-primary">Giriş Yap</button>
        </form>
        <hr>
        <a href="register.php">Üye değil misin? Kayıt Ol</a></br>
        <a href="adminLogin.php">Admin Girişi</a>
    </div>
    
<?php
    }
    mysqli_close($connect);
?>
</html>
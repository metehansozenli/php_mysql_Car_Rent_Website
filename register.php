<!DOCTYPE html>
<html>
    <head>
        <title>Kayıt Ol</title>
        <meta charset="UTF-8">
    </head>
    <body>
<?php
    require_once "config.php";
    require_once "navbar.html";
    //dogum tarihininin sinirlandirilmasi icin zaman dilimi secimi
    date_default_timezone_set('Europe/Istanbul');
    if(isset($_POST["name"])){
        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $userID = $_POST["userID"];
        $dob = $_POST["DOB"];
        $phone = $_POST["phoneNumber"];
        $mail = $_POST["email"];
        $lisence = $_POST["dLisence"];
        $pass = $_POST["password"];

        $pass_hash = hash("sha256", $pass); 

        $sql = "INSERT INTO `kullanici` (`TC_No`, `Isim`, `Soyisim`, `DogumTarihi`, `Eposta`, `Tel_No`, `Sifre`, `Ehliyet_Yas`) " .
            "VALUES ('$userID', '$name', '$surname', '$dob', '$mail', '$phone', '$pass_hash', '$lisence')";

        $q = mysqli_query($connect, $sql);

        //Eger cevap FALSE ise hata yazdiriyoruz.
        if(!$q){
            echo '<br>Hata:' . mysqli_error($connect);
        }
        //Kayit islemi tamamlandiginda ekrana yazdiriyoruz.
        else {
            ?>
            <div class="container col-3 mt-5">
                <p class="display-3 text-center">Hesabınız Oluşturuldu.</p>
                <a href="login.php" class="btn btn-success btn-lg btn-block mt-5">Üye Girişi Yapın</a>
            </div>
            <?php
        }
    }
    else {     
?>
    <div class="container col-md-5">
    <form action="register.php" method="POST" class="mt-2">
        <p class="display-4 text-center">Kayıt Olun</p>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">İsim:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group col-md-6">
                <label for="surname">Soyisim:</label>
                <input type="text" class="form-control" id="surname" name="surname" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="userID">T.C. No:</label>
                <input type="text" class="form-control" id="userID" name="userID" maxlength="11" required>
            </div>
            <div class="form-group col-md-6">
                <label for="DOB">Doğum Tarihi:</label>
                <?php
                //dogum tarihinin suanki tarihden ileride secilmesini engellemek icin date fonskiyonu kullanilmistir.
                echo '<input type="date" class="form-control" id="DOB" name="DOB" max="'.date("Y-m-d").'" required>'
                ?>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="phoneNumber">Telefon Numarası:</label>
                <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" maxlength="10" placeholder="'-' İşareti kullanmadan giriniz! " pattern="\d{3}\d{3}\d{4}" required>
                <small class="form-text text-muted">Örnek format: 555-555-5555</small>
            </div>
            <div class="form-group col-md-6">
                <label for="email">E-Posta:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com" required>
            </div>
            
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="dLisence">Ehliyet Yaşınız:</label>
                <input type="text" class="form-control" id="dLisence" name="dLisence" required>
                <small class="form-text text-muted">Ehliyetinizi aldığınız günden itibaren geçen yıl sayısı</small>
            </div>
            <div class="form-group col-md-6">
                <label for="password">Şifre:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Kayıt Ol</button>
    </form>
    </div>
<?php
} 
mysqli_close($connect);   
echo "</html>";

?>
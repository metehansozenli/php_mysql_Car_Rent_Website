<!DOCTYPE html>
<html>
    <head>
        <title>Kiralık Araçlar</title>
        <meta charset="UTF-8">
    </head>
    <body>
<?php
    require_once("config.php");
    //Giris yapilmissa navbar'in degismesi 
    session_start();
    if(!isset($_SESSION['userEmail']))
        require_once "navbar.html";
    else
        require_once "navbarLogged.html";

    if (isset($_GET['tur'])) {
        $tur = $_GET['tur'];
        $sql = "SELECT * FROM `arac` WHERE `Arac_Kategori`= '$tur' ORDER BY `arac`.`Arac_MarkaModel` ASC";
        echo '<div class="container display-4 text-primary text-center mt-4">'.ucfirst($tur).' Kiralık Araçlar </div>';
    }
    else{
        $sql = "SELECT * FROM `arac` ORDER BY `arac`.`Arac_MarkaModel` ASC";
        echo '<div class="container display-4 text-primary text-center mt-4">Tüm Kiralık Araçlar</div>';
    }

    $result = mysqli_query($connect,$sql);
    $counter = 0;
    
    while ($list = mysqli_fetch_array($result)) {    
        if ($counter % 3 == 0) {//her sirada uc adet veri gorunmesi icin kosul
            echo '<div class="container col-sm-11 mt-4 mb-4">';
            echo '<div class="row">';
        }
        echo '
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title display-5 text-primary"><b>' .ucfirst($list["Arac_Kategori"]) . ' Kiralık Araçlar</b></p>
                        <h5 class="card-title">' . $list["Arac_MarkaModel"] . '</h5>
                    </div>
                    <img class="card-img-top" src="' . $list["Arac_IMG"] . '">
                    <div class="card-body row">
                        <ul class="list-group list-group-flush ml-2 col-sm">
                            <li class="list-group-item"><b>Özellikler</b></li>
                            <li class="list-group-item">' . $list["Vites_Turu"] . '</li>
                            <li class="list-group-item">' . $list["Yakit_Turu"] . '</li>
                        </ul>
                        <ul class="list-group list-group-flush ml-2 col-sm">
                            <li class="list-group-item"><b>Koşullar</b></li>
                            <li class="list-group-item">' . $list["Kiralama_Yas"] . ' Yaş ve Üzeri</li>
                            <li class="list-group-item">Ehliyet Yaşı ' . $list["Ehliyet_Yas"] . ' ve Üzeri</li>
                            <li class="list-group-item">Depozito ' . $list["Depozito_Ucret"] . ' ₺</li>
                        </ul>
                    </div>
                    <div class="card-body row">
                        <div class="col-sm">
                            <b>'.$list["Kiralama_Ucret"].' ₺</b><font class="text-muted">/Günlük</font>    
                        </div>
                        <div class="col-sm">
                            <a href="index.php#rent" type="button" class="btn btn-primary float-right">Hemen Kirala</a>
                        </div>
                    </div>
                </div>
            </div>
            
        ';
        $counter++;
        if (($counter) % 3 == 0) {//3 adet veri yazdirildiktan sonra alt satira gecmek icin satir kapatiliyor
            echo '</div>'; // Satır div'inin kapatılması 
            echo '</div>'; // Container div'inin kapatılması
        }
    }
    if ($counter % 3 != 0) {
        echo '</div>'; // Satır div'inin kapatılması 
        echo '</div>'; // Container div'inin kapatılması
    }
    
    mysqli_close($connect);
?>
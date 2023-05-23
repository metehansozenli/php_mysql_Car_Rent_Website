<?php
    session_start();
    if(!isset($_SESSION['userEmail'])){
        header("Location: login.php");
        exit();
    }  
    require_once "config.php";
    require_once "navbarLogged.html";

    if(isset($_POST["receivePoint"]) && isset($_POST["returnPoint"])){
        //formdan gelen teslim noktasi degerlerine gore adlandirma yapiliyor.
        if ($_POST["receivePoint"] == 0) $receivePoint = "Bursa/Nilüfer";
        else if ($_POST["receivePoint"] == 1) $receivePoint = "Bursa/Osmangazi";
        else if ($_POST["receivePoint"] == 2) $receivePoint = "İstanbul/Kadıköy";
        else if ($_POST["receivePoint"] == 3) $receivePoint = "İstanbul/Beşiktaş";
        else if ($_POST["receivePoint"] == 4) $receivePoint = "Ankara/Söğütözü";
        //formdan gelen iade noktasi degerlerine gore adlandirma yapiliyor.
        if ($_POST["returnPoint"] == 0) $returnPoint = "Bursa/Nilüfer";
        else if ($_POST["returnPoint"] == 1) $returnPoint = "Bursa/Osmangazi";
        else if ($_POST["returnPoint"] == 2) $returnPoint = "İstanbul/Kadıköy";
        else if ($_POST["returnPoint"] == 3) $returnPoint = "İstanbul/Beşiktaş";
        else if ($_POST["returnPoint"] == 4) $returnPoint = "Ankara/Söğütözü";

        $receiveDate = $_POST["receiveDate"];
        $returnDate = $_POST["returnDate"];
    }
    if(isset($_GET["carID"])){
        $carID = $_GET["carID"];
        $userID = $_SESSION['userID'];
        $receiveDate = $_GET["recD"];
        $returnDate = $_GET["retD"];
        $receivePoint = $_GET["recP"];
        $returnPoint = $_GET["retP"];
        $priceR = mysqli_query($connect,"SELECT `Kiralama_Ucret` FROM `arac` WHERE `Arac_ID` = $carID");
        $row = mysqli_fetch_assoc($priceR);//cekilen satir
        $price = $row['Kiralama_Ucret'];
        $sql = "INSERT INTO `kiralama` (`Kullanici_ID`, `Arac_ID`, `Teslim_Tarih`, `Iade_Tarih`, `Teslim_Yeri`, `Iade_Yeri`, `Ucret`) " .
        "VALUES ('$userID', '$carID', ' $receiveDate', '$returnDate','$receivePoint', '$returnPoint','$price')";

        $q = mysqli_query($connect, $sql);

        //Eger cevap FALSE ise hata yazdiriyoruz.
        if(!$q){
            echo '<br>Hata:' . mysqli_error($connect);
        }
        //Kayit islemi tamamlandiginda ekrana yazdiriyoruz.
        else {
            ?>
            <div class="container col-3 mt-5">
                <p class="display-2 text-center text-success">Kiralama İşleminiz Gerçekleşti</p></br>
                <p class="text-center">Hesabım Kısmından Görüntüleyebilirsiniz!</p>
            </div>
            <?php
        }
    }
    //Get metodu ile arac id alinmadi ise araclari listele
    else {
        
        $sql = "SELECT * FROM `arac`ORDER BY `arac`.`Arac_MarkaModel` ASC";
        $result = mysqli_query($connect,$sql);
        $counter = 0;//bir satirda listelenen arac sayisini hesaplayip alt satira gecmek icin sayac

        //araclar listeleniyor
        while ($list = mysqli_fetch_array($result)) {    
            if ($counter % 3 == 0) {
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
                                <a href="rent.php?carID='.$list["Arac_ID"].'&recD='.$receiveDate.'&retD='.$returnDate.'&recP='.$receivePoint.'&retP='.$returnPoint.'" type="button" class="btn btn-primary float-right">Hemen Kirala</a>
                            </div>
                        </div>
                    </div>
                </div>
                
            ';
            $counter++;
            if (($counter) % 3 == 0) {
                echo '</div>'; // Satır div'inin kapatılması 
                echo '</div>'; // Container div'inin kapatılması
            }
        }
        if ($counter % 3 != 0) {
            echo '</div>'; // Satır div'inin kapatılması 
            echo '</div>'; // Container div'inin kapatılması
        }
        
        mysqli_close($connect);
    }
?>
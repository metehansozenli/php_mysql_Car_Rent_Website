<!DOCTYPE html>
<html>
    <head>
        <title>Profil Güncelle</title>
        <meta charset="UTF-8">
    </head>
    <body>
<?php
    session_start();
    if(!isset($_SESSION['userEmail'])){
        header("Location: login.php");
        exit();
    }
    require_once "config.php"; 
    require_once "navbarLogged.html"; 

    $userID = $_SESSION['userID'];
    //kullanici tablosundan bilgiler cekiliyor.
    $sql = "SELECT * FROM `kullanici` WHERE `Kullanici_ID`= '$userID'";
    $result = mysqli_query($connect,$sql);

    while ($list = mysqli_fetch_array($result)) { 
        //Bilgiler ekrana yazdiriliyor.
        echo '
        <div class="jumbotron mt-5 mx-5 bg-light">
            <div class="row">
                <div class="col-sm-3 ml-3">
                    <img src="imgs/profile.png" class="rounded mx-auto d-block mb-4" width="70">
                    <p class="text-center text-primary"><b>'.mb_strtoupper($list["Isim"]).''." ".''.mb_strtoupper($list["Soyisim"]).'</b></p>
                    <p class="text-center font-weight-light">'.$list["Eposta"].'</p>    
                </div>
                <div class="col-sm-8 ml-5 d-flex justify-content-end">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Hesap Bilgileri</h5>
                        </div>
                        <div class="card-body row">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><b>İsim Soyisim</b></li>
                                <li class="list-group-item"><b>Eposta</b></li>
                                <li class="list-group-item"><b>Telefon</b></li>
                                <li class="list-group-item"><b>TC No</b></li>
                                <li class="list-group-item"><b>Doğum Tarihi</b></li>
                            </ul>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">'.mb_strtoupper($list["Isim"]).''." ".''.mb_strtoupper($list["Soyisim"]).'</li>
                                <li class="list-group-item">'.$list["Eposta"].'</li>
                                <li class="list-group-item">'.$list["Tel_No"].'</li>
                                <li class="list-group-item">'.$list["TC_No"].'</li>
                                <li class="list-group-item">'.$list["DogumTarihi"].'</li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <a href="updateProfile.php" class="btn btn-primary">Bilgileri Güncelle</a>
                            <a href="deleteAccount.php" class="btn btn-danger float-right">Hesabı Sil</a>
                        </div>
                    </div>
                </div>  
            </div>
        </div>

        <div class="container col-sm-11 mt-5 mb-5">     
            <div class="row mt-3">
            <h5 class="card-title text-primary">Kiralanmış Araçlar</h5>
            <table class="table table-hover text-center">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Araç Marka Model</th>
                    <th scope="col">Teslim Yeri</th>
                    <th scope="col">İade Yeri</th>
                    <th scope="col">Teslim Tarihi</th>
                    <th scope="col">İade Tarihi</th>
                    <th scope="col">Kiralama Ücreti</th>
                </tr>
            </thead>
        ';
        //kullanici id sine gore kiralama tablosundan veriler getiriliyor
        $sql2 = "SELECT * FROM `kiralama` WHERE `Kullanici_ID`= '$userID'";
        $result2 = mysqli_query($connect,$sql2);
        $i = 1;//kiralanmis arac sayisini gostermek icin
        
        while(($list2 = mysqli_fetch_array($result2))){
            $carID = $list2['Arac_ID'];
            //arac id'si ile marka modeli cekmek
            $result3 = mysqli_query($connect,"SELECT `Arac_MarkaModel` FROM `arac` WHERE `Arac_ID` = $carID");
            $row = mysqli_fetch_assoc($result3);//cekilen satir
            echo '
            <tbody>
                <tr>
                    <th scope="row">'.$i++.'</th>
                    <td>'.$row["Arac_MarkaModel"].'</td>
                    <td>'.$list2["Teslim_Yeri"].'</td>
                    <td>'.$list2["Iade_Yeri"].'</td>
                    <td>'.$list2["Teslim_Tarih"].'</td>
                    <td>'.$list2["Iade_Tarih"].'</td>
                    <td>'.$list2["Ucret"].'</td>
                    </tr>
                </tbody>
            </div>
        </div>
        ';
        }
    }
    ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Anasayfa</title>
        <meta charset="UTF-8">
    </head>
<?php
    require_once "config.php";
    session_start();
    if(!isset($_SESSION['userEmail']))
        require_once "navbar.html";
    else
        require_once "navbarLogged.html";

    //rastgele 4 adet arac resmi gostermek icin once satir sayisi hesaplaniyor
    $row = mysqli_fetch_row(mysqli_query($connect, "SELECT COUNT(*) From `arac` WHERE `Arac_Kategori`='ekonomik'"));
    $rowCount = $row[0];
    $carArray = array();
    //rastgele veri secerek carArray dizisinde ID'ler tutuluyor
    while(1){
        if(count($carArray) == 4)
            break;
        else {
            $randomID = rand(1,$rowCount);
            if(!in_array($randomID,$carArray))//daha onceden eklenmediyse
                array_push($carArray,$randomID);
        }
    }

?>

<a name="rent"></a>
<p class="display-3 text-center text-primary mt-3">Hemen Aracınızı Kiralayın</p>
<div class="container d-flex align-items-center justify-content-center mt-5">
    <div class="row">
        <div class="col-sm">
            <div style="width: 200px; height: 50px; background-color: #ebf5fd; text-align: center; font-size: 25px; padding-top: 5px ">
                Teslim Noktası
            </div>
            <div class="form-group">
                <form action="" style="width: 400px;">
                    <select class="form-control form-control-lg" id="receivePoint">
                        <option value="0">Bursa/Nilüfer</option>
                        <option value="1">Bursa/Osmangazi</option>
                        <option value="2">İstanbul/Kadıköy</option>
                        <option value="3">İstanbul/Beşiktaş</option>
                        <option value="4">Ankara/Söğütözü</option>
                    </select> 
                </form>
            </div>
        </div>
        <div class="col-sm">
            <div style="width: 140px; height: 50px; background-color: #ebf5fd; text-align: center; font-size: 25px; padding-top: 5px ">
                Teslim Tarihi
            </div>
            <div class="form-group">
                <form action="" style="width: 225px;">
                    <input type="datetime-local" class="form-control form-control-lg" id="receiveDate" >
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container d-flex align-items-center justify-content-center mt-3">
    <div class="row">
        <div class="col-sm">
            <div style="width: 200px; height: 50px; background-color: #ebf5fd; text-align: center; font-size: 25px; padding-top: 5px ">
                İade Noktası
            </div>
            <div class="form-group">
                <form action="" style="width: 400px;">
                    <select class="form-control form-control-lg" id="returnPoint">
                        <option value="0">Bursa/Nilüfer</option>
                        <option value="1">Bursa/Osmangazi</option>
                        <option value="2">İstanbul/Kadıköy</option>
                        <option value="3">İstanbul/Beşiktaş</option>
                        <option value="4">Ankara/Söğütözü</option>
                    </select> 
                </form>
            </div>
        </div>
        <div class="col-sm">
            <div style="width: 140px; height: 50px; background-color: #ebf5fd; text-align: center; font-size: 25px; padding-top: 5px ">
                İade Tarihi
            </div>
            <div class="form-group">
                <form action="" style="width: 225px;">
                    <input type="datetime-local" class="form-control form-control-lg" id="returnDate" >
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container col-5">
    <button type="submit" class="btn btn-primary btn-block">Kirala</button>
</div>

<p class="display-4 text-center text-primary mt-5">Popüler Kiralama Seçenekleri</p>
<!-- Popüler arac card'lari -->
<div class="container col-sm-10 mt-5 mb-5 ">
    <div class="row">
        <?php
            //4 adet arac card'i yazdiriyor
            for($i=0;$i<4;$i++){
                $sql = "SELECT * FROM `arac` WHERE `Arac_ID`= $carArray[$i]";
                $car = mysqli_fetch_array(mysqli_query($connect,$sql));
                echo'
                <div class="col-sm-3">
                    <div class="card">
                        <img class="card-img-top" src="'.$car["Arac_IMG"].'">
                        <div class="card-body">
                            <h5 class="card-title">'.$car["Arac_MarkaModel"].'</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">'.$car["Vites_Turu"].'</li>
                            <li class="list-group-item">'.$car["Yakit_Turu"].'</li>
                            <li class="list-group-item"><b>'.$car["Kiralama_Ucret"].' ₺</b></li>
                        </ul>
                        <div class="card-body">
                            <a href="index.php#rent" class="card-link">Kirala</a>
                        </div>
                    </div>
                </div>
                ';
            }
            mysqli_close($connect);
        ?>
    </div>
</div>

<div >
    <p align="center">Kiralama A.Ş.
    <br> Her Hakkı Saklıdır. Copyrigt &copy 2023</p>
</div>
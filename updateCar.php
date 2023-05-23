<?php
    session_start();
    if(!isset($_SESSION['adminName']))
        header("Location: adminLogin.php");
    else{
        require_once("config.php");
        require_once("navbarAdmin.html");
        
        if(isset($_POST["car_brand"])){
            //post metodu ile alinan veriler degiskenlere ataniyor
            $car_ID = $_GET['id'];
            $car_img = $_POST["car_img"];
            $car_category = $_POST["car_category"];
            $car_brand = $_POST["car_brand"];
            $gear_type = $_POST["gear_type"];
            $fuel_type = $_POST["fuel_type"];
            $deposit = $_POST["deposit"];
            $rent_fee = $_POST["rent_fee"];
            $rent_age = $_POST["rent_age"];
            $lisence_age = $_POST["lisence_age"];
            $capacity = $_POST["capacity"];

            $sql2 = "UPDATE `arac` 
                    SET `Arac_IMG`= '$car_img', `Arac_MarkaModel`= '$car_brand', `Arac_Kategori`= '$car_category',
                    `Vites_Turu`= '$gear_type', `Yakit_Turu`= '$fuel_type', `Depozito_Ucret`= '$deposit',
                    `Kiralama_Ucret`= '$rent_fee', `Kiralama_Yas`= '$rent_age', `Ehliyet_Yas`= '$lisence_age',`Kapasite`= '$capacity'                    
                    WHERE `Arac_ID` = '$car_ID'";

            $result2 = mysqli_query($connect, $sql2);

            //Eger cevap FALSE ise hata yazdiriyoruz.
            if(!$result2){
                echo '<br>Hata:' . mysqli_error($connect);
            }
            //Kayit islemi tamamlandiginda ekrana yazdiriyoruz.
            else {
                ?>
                <div class="container col-3 mt-5">
                    <p class="display-3 text-center">Bilgiler Güncellendi.</p>
                    <a href="adminListCars.php" class="btn btn-success btn-lg btn-block mt-5">Listelemeye Geri Dön</a>
                </div>
                <?php
            }
        }
        else{
        //get metodu ile alinmis arac id si degiskene atanip tabloda araniyor
        $id = $_GET['id'];
        $sql = "SELECT * FROM `arac` WHERE `Arac_ID`= '$id'";

        $result = mysqli_query($connect,$sql);

        if(!$result)
            echo '<br>Hata:' . mysqli_error($connect);
        else{
            $car = mysqli_fetch_array($result);
        ?>
        <!-- Araç bilgi düzenleme ekrani , aracin daha onceki verileri veritabanindan cekilerek forma ataniyor -->
        <div class="container col-sm-5">
        <form action="updateCar.php?id=<?php echo $car["Arac_ID"]?>" method="POST" class="mt-2">
            <p class="h3 text-primary mt-5 mb-4">Araç Bilgilerini Güncelle</p>
            <img src="<?php echo $car["Arac_IMG"]?>" >
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="img">Araç Resim URL veya Dosya Yolu:</label>
                    <input type="text" class="form-control" id="img" name="car_img" value="<?php echo $car["Arac_IMG"]?>" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="brand">Araç Marka Model:</label>
                    <input type="text" class="form-control" id="brand" name="car_brand" value="<?php echo $car["Arac_MarkaModel"]?>" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="category">Araç Kategorisi:</label>
                    <input type="text" class="form-control" id="category" name="car_category" value="<?php echo $car["Arac_Kategori"]?>" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="gear_type">Vites Türü:</label>
                    <input type="text" class="form-control" id="gear_type" name="gear_type" value="<?php echo $car["Vites_Turu"]?>" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="fuel_type">Yakıt Türü:</label>
                    <input type="text" class="form-control" id="fuel_type" name="fuel_type" value="<?php echo $car["Yakit_Turu"]?>" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="deposit">Depozito Ücreti:</label>
                    <input type="text" class="form-control" id="deposit" name="deposit" value="<?php echo $car["Depozito_Ucret"]?>" required>
                </div>
                
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="rent_age">Kiralama Ücreti:</label>
                    <input type="text" class="form-control" id="rent_fee" name="rent_fee" value="<?php echo $car["Kiralama_Ucret"]?>" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="rent_age">En Düşük Kiralama Yaşı:</label>
                    <input type="text" class="form-control" id="rent_age" name="rent_age" value="<?php echo $car["Kiralama_Yas"]?>" required>
                </div>
            </div>
            <div class="form-row ">
                <div class="form-group col-sm-6">
                    <label for="lisence_age">Ehliyet Yaşı:</label>
                    <input type="text" class="form-control" id="lisence_age" name="lisence_age" value="<?php echo $car["Ehliyet_Yas"]?>" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="capacity">Yolcu Kapasite:</label>
                    <input type="text" class="form-control" id="capacity" name="capacity" value="<?php echo $car["Kapasite"]?>" required>
                </div>
            </div>
            <div class="container">
                <button type="submit" class="btn btn-success btn-block">Aracı Güncelle</button>
            </div>
        </form>
        </div>
        <div class="mb-5"></div>
        <?php   
        }
    }
    }
    mysqli_close($connect);
?>
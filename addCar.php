<?php
    require_once("config.php");
    session_start();
    if(!isset($_SESSION['adminName']))
        header("Location: adminLogin.php");
    else{
        require_once("config.php");
        require_once("navbarAdmin.html");
        
        if(isset($_POST["car_brand"])){ 
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

            $sql = "INSERT INTO `arac`(`Arac_IMG`,`Arac_MarkaModel`,`Arac_Kategori`,`Vites_Turu`, `Yakit_Turu`,
                    `Depozito_Ucret`,`Kiralama_Ucret`,`Kiralama_Yas`,`Ehliyet_Yas`,`Kapasite`)
                    VALUES ('$car_img','$car_brand','$car_category','$gear_type','$fuel_type','$deposit',
                    '$rent_fee','$rent_age','$lisence_age','$capacity')";

            $result = mysqli_query($connect, $sql);

            //Eger cevap FALSE ise hata yazdiriyoruz.
            if(!$result){
                echo '<br>Hata:' . mysqli_error($connect);
            }
            //Kayit islemi tamamlandiginda ekrana yazdiriyoruz.
            else {
                ?>
                <div class="container col-3 mt-5">
                    <p class="display-3 text-center">Araç Eklendi.</p>
                    <a href="adminListCars.php" class="btn btn-success btn-lg btn-block mt-5">Listelemeye Geri Dön</a>
                </div>
                <?php
            }
        }
        else{
        ?>
        <!-- Araç bilgileri girme ekrani ve formlari -->
        <div class="container col-sm-5">
        <form action="addCar.php" method="POST" class="mt-2">
            <p class="h3 text-primary mt-5 mb-4">Araç Ekle</p>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="img">Araç Resim URL veya Dosya Yolu:</label>
                    <input type="text" class="form-control" id="img" name="car_img" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="brand">Araç Marka Model:</label>
                    <input type="text" class="form-control" id="brand" name="car_brand" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="category">Araç Kategorisi:</label>
                    <input type="text" class="form-control" id="category" name="car_category" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="gear_type">Vites Türü:</label>
                    <input type="text" class="form-control" id="gear_type" name="gear_type" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="fuel_type">Yakıt Türü:</label>
                    <input type="text" class="form-control" id="fuel_type" name="fuel_type" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="deposit">Depozito Ücreti:</label>
                    <input type="text" class="form-control" id="deposit" name="deposit" required>
                </div>
                
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="rent_age">Kiralama Ücreti:</label>
                    <input type="text" class="form-control" id="rent_fee" name="rent_fee" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="rent_age">En Düşük Kiralama Yaşı:</label>
                    <input type="text" class="form-control" id="rent_age" name="rent_age" required>
                </div>
            </div>
            <div class="form-row ">
                <div class="form-group col-sm-6">
                    <label for="lisence_age">Ehliyet Yaşı:</label>
                    <input type="text" class="form-control" id="lisence_age" name="lisence_age" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="capacity">Yolcu Kapasite:</label>
                    <input type="text" class="form-control" id="capacity" name="capacity" value="<?php echo $car["Kapasite"]?>" required>
                </div>
            </div>
            <div class="container">
                <button type="submit" class="btn btn-success btn-block">Aracı Kaydet</button>
            </div>
        </form>
        </div>
        <div class="mb-5"></div>
        <?php   
        }
    }
    mysqli_close($connect);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Araç Bilgileri</title>
        <meta charset="UTF-8">
    </head>
    <body>
<?php
    session_start();
    if(!isset($_SESSION['adminName']))
        header("Location: adminLogin.php");
    else{
        require_once("config.php");
        require_once("navbarAdmin.html");
?>
    
    <div class="container col-sm-11 mt-5">
        <h3 class="text-primary mb-3">Araç Bilgileri</h3>
        <button class="btn btn-success mb-2">Araç Ekle</button>
        <table class="table table-hover text-center">
            <thead>
                <tr>
                <th scope="col"></th>
                <th scope="col">ID</th>
                <th scope="col">Resim</th>
                <th scope="col">Marka Model</th>
                <th scope="col">Kategori</th>
                <th scope="col">Vites Türü</th>
                <th scope="col">Yakıt Türü</th>
                <th scope="col">Depozito Ücreti</th>
                <th scope="col">Kiralama Ücreti</th>
                <th scope="col">Kiralama Yaşı</th>
                <th scope="col">Ehliyet Yaşı</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <?php
            $sql = "SELECT * FROM `arac`";
            $result = mysqli_query($connect,$sql);
            while(($list = mysqli_fetch_array($result))){
            echo '
            <tbody>
                <tr>
                    <th scope="row"></th>
                    <td>'.$list["Arac_ID"].'</td>
                    <td><img src="'.$list["Arac_IMG"].'" style="width: 100px ; height: 45px"></td>
                    <td>'.$list["Arac_MarkaModel"].'</td>
                    <td>'.$list["Arac_Kategori"].'</td>
                    <td>'.$list["Vites_Turu"].'</td>
                    <td>'.$list["Yakit_Turu"].'</td>
                    <td>'.$list["Depozito_Ucret"].'</td>
                    <td>'.$list["Kiralama_Ucret"].'</td>    
                    <td>'.$list["Kiralama_Yas"].'</td>
                    <td>'.$list["Ehliyet_Yas"].'</td>
                    <td>
                        <button class="btn btn-primary mb-2">Güncelle</button>
                        <button class="btn btn-danger mb-2">Sil</button>
                    </td>
                </tr>
                </tr>
            </tbody>
            ';
            }
            ?>
        </table>
    </div>
        

<?php
    }
    mysqli_close($connect);
?>
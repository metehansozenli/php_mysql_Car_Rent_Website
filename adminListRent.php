<!DOCTYPE html>
<html>
    <head>
        <title>Araç Listesi</title>
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
    <div class="container col-sm-10 mt-5">
        <h3 class="text-primary mb-3">Kiralama Listesi</h3>
        <table class="table table-hover text-center">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Müşteri ID</th>
                    <th scope="col">Araç ID</th>
                    <th scope="col">Teslim Yeri</th>
                    <th scope="col">İade Yeri</th>
                    <th scope="col">Teslim Tarihi</th>
                    <th scope="col">İade Tarihi</th>
                    <th scope="col">Kiralama Ücreti</th>
                </tr>
            </thead>
        <?php
        $sql = "SELECT * FROM `kiralama`";//kiralanmis listesi veritabnindan aliniyor
        $result = mysqli_query($connect,$sql);
        $i = 1;//kiralanmis arac sayisini gostermek icin
        while(($list = mysqli_fetch_array($result))){
            echo '
            <tbody>
                <tr>
                    <th scope="row">'.$i++.'</th>
                    <td>'.$list["Kullanici_ID"].'</td>
                    <td>'.$list["Arac_ID"].'</td>
                    <td>'.$list["Teslim_Yeri"].'</td>
                    <td>'.$list["Iade_Yeri"].'</td>
                    <td>'.$list["Teslim_Tarih"].'</td>
                    <td>'.$list["Iade_Tarih"].'</td>
                    <td>'.$list["Ucret"].'</td>
                    </tr>
                </tbody>
            </div>
        </div>
        ';
        }
        ?>
        </table>
    </div>
<?php
    }
    mysqli_close($connect);
?>
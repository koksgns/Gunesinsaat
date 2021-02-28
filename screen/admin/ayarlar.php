<?php
session_start();
$UserID = $_SESSION["id"];
if($UserID != ""){
  require("../../PHP/gereksinimler.php");
  if(isset($_REQUEST["Pasword"]) && ($_REQUEST["Pasword"] == "1")){
      if(isset($_REQUEST["Pass"])){
          $SORGU		=	$VeritabaniBaglantisi->prepare("SELECT * FROM  users WHERE id = '$UserID' "); 
          $SORGU->execute();
          $SORGUSAYISI		=	$SORGU->rowCount();
          $SORGULAR	=	$SORGU->fetch(PDO::FETCH_ASSOC);
          if($SORGUSAYISI>0){
              $MevcutPass = $SORGULAR["password"];
          }
          $Pass   =  Filtrele($_REQUEST["Pass"]);
          if(isset($_REQUEST["NewPass"])){
              $message = "Beklenmedik bir hata oluştu daha sonra tekrar deneyiniz";
              $NewPass   =  Filtrele($_REQUEST["NewPass"]);
              if(isset($_REQUEST["NewPassRep"])){
                  $NewPassRep   =  Filtrele($_REQUEST["NewPassRep"]);
                  if(($Pass == $MevcutPass) && ($NewPass == $NewPassRep)){
                      $UyeGuncellemeSorgusu2		=	$VeritabaniBaglantisi->prepare("UPDATE users SET password = '$NewPass' WHERE id = '$UserID'");
                      $UyeGuncellemeSorgusu2->execute();
                      $Kontrol2		=	$UyeGuncellemeSorgusu2->rowCount();
                      if($Kontrol2>0){
                        $message = "Parola değişikliği başarılı";
                      }else{
                          $message = "Hataoluştu";
                      }
                  }else{
                      $message = "Hatalı bilgi girdiniz lütfen kontrol ederek tekrar deneyiniz";
                  }
              }              
              echo "<script type='text/javascript'>alert('$message');</script>";
          }
      }      
  }
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Güneş İnşaat  | Ayarlar</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../css/main.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
</head>
<body>

  <!--Navbar-->
  <nav class="navbar navbar-expand-lg navbar-light p-3" style="background-color: #529dd3;">
    <div class="container-fluid">
      <a class="navbar-brand" href="../index.php">Güneş İnşaat</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="home.php">Admin Paneli</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="projeler.php">Projeler</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="fotograflar.php">Fotoğraflar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="ayarlar.php">Ayarlar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cikis.php">Çıkış Yap</a>
          </li>
        </ul>
        <span class="navbar-text">
            Hayallerinizi süsleyen yapıların <b>Güneş İnşaat</b> ile canlandırmaya ne dersiniz?
        </span>
      </div>
    </div>
  </nav>
  <div class="container my-5">
    <div class="text-center my-auto giris bg-dark">
        <a href="../"><img src="../../images/logo/logo.png" alt="logo" class="my-5"></a>
    </div>
    <br><br>
    <div class="text-center  p-5">
        <form action="ayarlar.php?Pasword=1" method="POST">
            <h2>Parola Değiştir</h2>
            <div class="form-group">
              <input type="password" required name="Pass" placeholder="Mevcut Parolanızı Giriniz *" class="w-50 m-auto form-control">
            </div>
            <br>
            <div class="form-group">
                <input type="password" required name="NewPass" placeholder="Yeni Parolanızı Giriniz *" class="w-50 m-auto form-control">
            </div>
            <br>
            <div class="form-group">
              <input type="password" required name="NewPassRep" placeholder="Yeni Parolanızı Tekrar Giriniz *" class="w-50 m-auto form-control">
            </div>
            <br>
            <button type="submit" class="btn btn-primary w-25">Parolayı Değiştir</button>
        </form>
    </div>
</div>

  <?php
require("footer.php");
  ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</body>
</html>
<?php
}else{
    header("Location:../");
}
?>
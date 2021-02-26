<?php
session_start();
$UserID = $_SESSION["id"];
if($UserID != ""){
  
  if(isset($_REQUEST["DetayID"])){
      $DetayID   =  $_REQUEST["DetayID"];

    require("../../PHP/gereksinimler.php");
    $SORGU		=	$VeritabaniBaglantisi->prepare("SELECT * FROM  projeler WHERE id = '$DetayID' "); 
    $SORGU->execute();
    $SORGUSAYISI		=	$SORGU->rowCount();
    $SORGULAR	=	$SORGU->fetch(PDO::FETCH_ASSOC);
    if($SORGUSAYISI>0){
        $baslik = $SORGULAR["baslik"];
        $baslamaTarih = $SORGULAR["baslamaTarih"];
        $bitisTarih = $SORGULAR["bitisTarih"];
        $il = $SORGULAR["il"];
        $ilçe = $SORGULAR["ilçe"];
        $aciklama = $SORGULAR["aciklama"];
        $projeimg1 = $SORGULAR["projeimg1"];
    }
  
?>


<!DOCTYPE html>
<html lang="TR-tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Güneş İnşaat</title>

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
            <a class="nav-link active" aria-current="page" href="home.php">Admin Paneli</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="projeler.php">Projeler</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="fotograflar.php">Fotoğraflar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ayarlar.php">Ayarlar</a>
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

    <br><br>
    <div class="container projedetaybaslik text-center p-1">
      <h1><?=$baslik?></h1>
    </div>
    <br> <br>
    <div class="container">
      <div class="row projedetayfotolar">
        <div class="col-12 ">
          <marquee direction="right" >
            <img src="../../images/proje/<?=$projeimg1?>">          
          </marquee>
        </div>
      </div>
    </div>
    <br>

    <div class="container mb-5">
      <h3 class="my-5">Proje Detayları</h3>
      <div class="row justify-content-center">
        <div class="col-10 col-md-4">
          <h5>Yer</h5>
          <p><?=$il?> / <?=$ilçe?></p>
          <br>
          <h5>Başlama Tarihi</h5>
          <p><?=$baslamaTarih?></p>
          <br>
          <h5>Bitirme Tarihi</h5>
          <p><?=$bitisTarih?></p>
        </div>
        <div class="col-10 col-md-4">
          <h5>Proje Açıklaması</h5>
          <p><?=$aciklama?></p>
        </div>
        <div class="col-10 col-md-3 mb-5 AdminKapakFoto">
          <h5>Kapak Resmi</h5>
          <img src="../../images/proje/<?=$projeimg1?>">      
        </div>
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
  }else{
      header("Location:../");
  }
?>
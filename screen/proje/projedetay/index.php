<?php
  
  if(isset($_REQUEST["PID"])){
    require("../../../PHP/gereksinimler.php");
    $PID   =  $_REQUEST["PID"];
  $SORGU		=	$VeritabaniBaglantisi->prepare("SELECT * FROM  projeler WHERE id= $PID"); 
  $SORGU->execute();
  $SORGUSAYISI		=	$SORGU->rowCount();
  $SORGULAR	=	$SORGU->fetch(PDO::FETCH_ASSOC);
  if($SORGUSAYISI>0){
        
    $image  =   $SORGULAR["projeimg1"];
    $baslik  =   $SORGULAR["baslik"];
    $baslamaTarih  =   $SORGULAR["baslamaTarih"];
    $bitisTarih  =   $SORGULAR["bitisTarih"];
    $il  =   $SORGULAR["il"];
    $ilce  =   $SORGULAR["ilçe"];
    $aciklama  =   $SORGULAR["aciklama"];
    $projeFotolari  =   $SORGULAR["projeFotolari"];
    
}   
if($projeFotolari != ""){
$projeFotolar = explode(",",$projeFotolari);
array_pop($projeFotolar);
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
    <link rel="stylesheet" type="text/css" href="../../../css/main.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
</head>
<body>

    <!--Navbar-->
    <nav class="navbar navbardetay navbar-expand-lg navbar-light p-3" style="background-color: #778f9b;">
        <div class="container-fluid">
          <a class="navbar-brand text-light" href="index.php">Güneş İnşaat</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link text-light" aria-current="page" href="../../index.php">Anasayfa</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light active" href="../"><b>Projeler</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="../../hizmetlerimiz.php">Hizmetlerimiz</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="../../hakkinda.php">Hakkımızda</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="../../iletisim.php">İletişim</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="../../admin/">Giriş Yap</a>
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
      <h1><?= $baslik ?></h1>
    </div>
    <br> 

    <div class="container mb-5">
      <h3 class="my-5">Proje Detayları</h3>
      <div class="row justify-content-center">
        <div class="col-10 col-md-4">
          <h5>Yer</h5>
          <p><?=$il ?> / <?=$ilce ?></p>
          <br>
          <h5>Başlama Tarihi</h5>
          <p><?=$baslamaTarih ?> </p>
          <br>
          <h5>Bitirme Tarihi</h5>
          <p><?=$bitisTarih ?></p>
        </div>
        <div class="col-10 col-md-7">
          <h5>Proje Açıklaması</h5>
          <p><?=$aciklama ?><p>
        </div>
      </div>
    </div>
    <br>
    <br>
    
     
    
    <div class="container mb-5">
      <h3>Kayıtlı Fotoğraflar</h3>
      <div class="row text-center ">
        <div class="col-12 col-sm-6 col-md-4 projedetayfotolar my-3">
          <img src="../../../images/proje/<?=$image?>" class= "projeimgDetay" alt="">
        </div>
        <?php
          if($projeFotolari!= null){
            foreach($projeFotolar as $Foto){
          ?>
        <div class="col-12 col-sm-6 col-md-4 projedetayfotolar my-3">
          <img src="../../../images/proje/<?=$Foto?>" class= "projeimgDetay" alt="ProjeFotografi"> <br> <br>
        </div>
        <?php 
          }
        }
      ?>
      </div> 
    </div>

    <div class="container-fluid  my-5 text-center" style="background-color: #778f9b;">
        &nbsp;
    </div>
    <!--FOOTER-->
 <?php
  $SORGUFooter		=	$VeritabaniBaglantisi->prepare("SELECT * FROM  projeler"); 
  $SORGUFooter->execute();
  $SORGUSAYISIFooter		=	$SORGUFooter->rowCount();
  $SORGULARFooter	=	$SORGUFooter->fetchAll(PDO::FETCH_ASSOC);
  $SORGULARFooter = array_reverse($SORGULARFooter);
  $sayacFooter =1;
?>
<footer class=" pt-5" style="background-color: #778f9b;">
    <div class="container text-white">
        <div class="row">
            <div class="col-md-4">
               <a href="../../" class="navbar-brand footer-brand"><img src="../../../images/logo/logo.png"></a>
            </div>
            <div class="col-md-3 mt-3">
                <ul class="list-unstyled">
                    <li class="mb-3"><small>Şirket</small></li>
                    <li><a href="../../index.php" class=" footer-text altcizgikaldir"> Anasayfa</li></a>
                    <li><a href="../" class="footer-text altcizgikaldir"> Projeler</li></a>
                    <li><a href="../../hizmetlerimiz.php" class="footer-text altcizgikaldir"> Hizmetlerimiz</li></a>
                    <li><a href="../../hakkinda.php" class="footer-text altcizgikaldir"> Hakkımızda</li></a>
                    <li><a href="../../iletisim.php" class="footer-text altcizgikaldir"> İletişim</li></a>
                </ul>
            </div>
            <div class="col-md-3 mt-3">
                <ul class="list-unstyled">
                    <li class="mb-3"><small>Projeler</small></li>
                    <?php
                        foreach($SORGULARFooter as $Sorgu){
                            if($sayacFooter == 6){
                                break;
                            }
                    ?>
                        <li><a href="index.php?PID=<?=$Sorgu["id"]?>" class="footer-text altcizgikaldir"> <?php echo substr($Sorgu["baslik"],0,20); if(strlen($Sorgu["baslik"])>20){echo"...";} ?></li></a>
                    <?php
                            $sayacFooter++;
                        }
                    ?>
                </ul>
            </div>
            <div class="col-md-2 mt-3 text-end social-logo">
                <a target="_blank" href="https://www.facebook.com/GÜNEŞ-Insaat-650970248400529/" class="text-white footer-text"><i class="fab fa-facebook-f fa-2x me-3"></i></a>                
                <a target="_blank" href="https://www.instagram.com/muratgunes522/" class="text-white footer-text"> <i class="fab fa-instagram fa-2x me-3"></i></a>
                <a target="_blank" href="https://wa.me/905419346709?text=Merhaba%20Güneş%20İnşaat" class="text-white footer-text"> <i class="fab fa-whatsapp fa-2x me-3"></i></a>
            </div>
            <div class="clearfix text-muted text-center">
            <p style="font-size: 14px; color: black; margin-top: 10px;" class="mb-3 ">Güneş İnşaat © Tüm Hakları Saklıdır. - Design: by <a href="https://www.instagram.com/koksgns/" class="altcizgikaldir text-white">KOKSGNS</a></p>
            </div>
        </div>
    </div>
</footer>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</body>
</html>

<?php
  }else{
    echo "mereha";
    header("Location:../");
  }
?>
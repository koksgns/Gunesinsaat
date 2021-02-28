<?php
session_start();
$UserID = $_SESSION["id"];
if($UserID != ""){
  require("../../PHP/gereksinimler.php");

if(isset($_REQUEST["KID"])){
    $KID   =  $_REQUEST["KID"];
    $fotoSayi   = 0;
    
    $SORGU2		=	$VeritabaniBaglantisi->prepare("SELECT * FROM  projeler WHERE id= '$KID'"); 
    $SORGU2->execute();
    $SORGUSAYISI2		=	$SORGU2->rowCount();
    $SORGULAR2	=	$SORGU2->fetch(PDO::FETCH_ASSOC);

    if($SORGUSAYISI2>0){
        
        $image  =   $SORGULAR2["projeimg1"];
        $baslik  =   $SORGULAR2["baslik"];
        $baslamaTarih  =   $SORGULAR2["baslamaTarih"];
        $bitisTarih  =   $SORGULAR2["bitisTarih"];
        $il  =   $SORGULAR2["il"];
        $ilçe  =   $SORGULAR2["ilçe"];
        $aciklama  =   $SORGULAR2["aciklama"];
        $projeFotolari  =   $SORGULAR2["projeFotolari"];
        
    }   
    if($projeFotolari != ""){
    $projeFotolar = explode(",",$projeFotolari);    
    array_pop($projeFotolar);
    $projeFotolar = array_reverse($projeFotolar);
    $fotoSayi = count($projeFotolar);
    }
}

?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Güneş İnşaat | Projeler</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../css/main.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

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
            <a class="nav-link active" href="projeler.php">Projeler</a>
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
    <div class="container">
     <h1 class="text-center my-5"><?=$baslik ?></h1>
      
      <hr class="w-75 mt-5 mb-4 m-auto justify-content-center">
      <p class="w-75 m-auto text-warning"><i class="fas fa-exclamation-triangle"></i> Fotoğrafı seçtikten sonra yükle butonuna basınız.</p>
      <p class="w-75 m-auto text-warning"><i class="fas fa-exclamation-triangle"></i> Her proje için kapak fotoğrafı hariç 10 fotoğraf yüklenebilir.</p>
        <div class="row m-5">
          <form action="../../PHP/projeFotoğrafEkleKayit.php?KID=<?=$KID ?>" enctype="multipart/form-data" method="POST">
              <div class="drop-zone m-auto">
                  
                  <span class="drop-zone__prompt">Dosyayı buraya sürükle ya da yüklemek için tıkla</span>
                  <input type="file" id="kapakFoto" accept="image/*" name="myFile" class="drop-zone__input">
              </div>
               
              <div class="form-group text-center my-3 col-12">
               <?php if($fotoSayi < 10 ){ ?>
                  <button type="submit" class="btn btn-primary w-25">Yükle</button>
                 <?php }else{ ?>
                    <p class="btn btn-primary w-25"> 10 fotoğraf yüklendi</p>
                <?php } ?>
              </div> 
          </form>
        </div>
    </div>
    <h1 class="text-center my-5">Kayıtlı Fotoğraflar</h1>
      
      <hr class="w-75 mt-5 mb-4 m-auto justify-content-center">
    
    <div class="container">
      <?php
        if($projeFotolari!= null){
          
      ?>
      <div class="row text-center justify-content-center">
          <?php
            foreach($projeFotolar as $Foto){
          ?>
        <div class="col-4 projedetayfotolar my-3">
          <img src="../../images/proje/<?=$Foto?>" alt=""> <br> <br>
          <a href="../../PHP/projeFotografSil.php?KID=<?=$KID?>&IMG=<?=$Foto?>" class="altcizgikaldir text-dark"><p><i class="far fa-trash-alt" ></i> Sil</p></a>
        </div>
        <?php }?>
      </div>      
      <?php
        }else{
          echo "<p class='text-center my-5'>Kaydedilmiş fotoğraf bulunmamaktadır!</p>";
        }
      ?>
    </div>
    

  <?php
require("footer.php");
  ?>
    <script src="../../js/index.js"></script>
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
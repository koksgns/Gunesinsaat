<?php
session_start();
$UserID = $_SESSION["id"];
if($UserID != ""){
  require("../../PHP/gereksinimler.php");

  if(isset($_REQUEST["PID"])){
    $PID   =  $_REQUEST["PID"];

    
    $SORGU2		=	$VeritabaniBaglantisi->prepare("SELECT * FROM  fotograflar WHERE IMG= '$PID'"); 
    $SORGU2->execute();
    $SORGUSAYISI2		=	$SORGU2->rowCount();
    $SORGULAR2	=	$SORGU2->fetch(PDO::FETCH_ASSOC);

    if($SORGUSAYISI2>0){        
        $id  =   $SORGULAR2["id"];
        $KayitSil   =   $VeritabaniBaglantisi->query("DELETE FROM fotograflar WHERE id = '$id'");
        if($KayitSil){
            $message = "Kayıt Silindi";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }

        
    }   
  }

  $SORGU		=	$VeritabaniBaglantisi->prepare("SELECT * FROM  fotograflar "); 
  $SORGU->execute();
  $SORGUSAYISI		=	$SORGU->rowCount();
  $SORGULAR	=	$SORGU->fetchAll(PDO::FETCH_ASSOC);
  $SORGULAR = array_reverse($SORGULAR);
?>

<!DOCTYPE html>
<html lang="tr">
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
            <a class="nav-link active" href="fotograflar.php">Fotoğraflar</a>
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
    <h1 class="text-center my-5">Fotoğraf Yükle</h1>
     
     <hr class="w-75 mt-5 mb-4 m-auto justify-content-center">
     <p class="w-75 m-auto text-warning"><i class="fas fa-exclamation-triangle"></i> Fotoğrafı seçtikten sonra fotoğraf için kısa açıklama giriniz ardından yükle butonuna basınız.</p>
       <div class="row m-5">
         <form action="../../PHP/fotografKayit.php" enctype="multipart/form-data" method="POST">
             <div class="drop-zone m-auto">
                 <span class="drop-zone__prompt">Dosyayı buraya sürükle ya da yüklemek için tıkla</span>
                 <input type="file" id="kapakFoto" accept="image/*" name="myFile" class="drop-zone__input" >
             </div>
             <br>
             <div class="form-group w-50 m-auto">
              <label for="fotoAciklama" >Bir Başlık Giriniz</label>
              <input type="text" name="fotoAciklama" maxlength="100" class="form-control"  id="fotoAciklama" required>
            </div>
            <br>
             <div class="form-group text-center my-3 col-12">
                 <button type="submit" class="btn btn-primary w-25">Yükle</button>
             </div> 
         </form>
       </div>
   </div>
   <br>
   <div class="container my-5">
    <h1 class="text-center">Son Paylaşımlar</h1>
    <hr class="w-75 mt-5 mb-4 m-auto justify-content-center">
      <div class="row text-center justify-content-center">        
        <?php
            foreach($SORGULAR as $Sorgu){ 
              $img=$Sorgu["IMG"];
          ?>
        <div class="col-12 col-sm-6 col-md-4 projedetayfotolar my-3">
          <img src="../../images/photo/<?=$Sorgu["IMG"] ?>" class= "projeimgDetay" alt="<?=$Sorgu["fotoAciklama"]; ?>"> <br> <br>
          <p><?=$Sorgu["fotoAciklama"]; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="far fa-trash-alt" onclick="deletePhoto('<?=$img?>')">Sil</i></p> <br>
        </div><?php } ?>
      </div> 
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
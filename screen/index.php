<?php
  require("../PHP/gereksinimler.php");
  $SORGU		=	$VeritabaniBaglantisi->prepare("SELECT * FROM  fotograflar"); 
  $SORGU->execute();
  $SORGUSAYISI		=	$SORGU->rowCount();
  $SORGULAR	=	$SORGU->fetchAll(PDO::FETCH_ASSOC);
  $SORGULAR = array_reverse($SORGULAR);
  $sayac =1;

  $SORGU1		=	$VeritabaniBaglantisi->prepare("SELECT * FROM  projeler"); 
  $SORGU1->execute();
  $SORGUSAYISI1		=	$SORGU1->rowCount();
  $SORGULAR1	=	$SORGU1->fetchAll(PDO::FETCH_ASSOC);
  $SORGULAR1 = array_reverse($SORGULAR1);
  $sayac1=1;
?>


<!DOCTYPE html>
<html lang="TR-tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Güneş İnşaat</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/main.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
</head>
<body>
  <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light p-3"  style=" background-color: #778f9b">
        <div class="container-fluid">
          <a class="navbar-brand text-light" href="index.php">Güneş İnşaat</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
              <li class="nav-item">
                <a class="nav-link text-light active" aria-current="page" href="index.php"><b>Anasayfa</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="proje/">Projeler</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="hizmetlerimiz.php">Hizmetlerimiz</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="hakkinda.php">Hakkımızda</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="iletisim.php">İletişim</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="admin/">Giriş Yap</a>
              </li>
            </ul>
            <span class="navbar-text">
                Hayallerinizi süsleyen yapıların <b>Güneş İnşaat</b> ile canlandırmaya ne dersiniz?
            </span>
          </div>
        </div>
      </nav>



      <section class="AnsayfaSlider">
        <div class="caption">
            <h1>GÜNEŞ İNŞAAT</h1>
            <p>Hayallerinizi süsleyen yapıların <b>Güneş İnşaat</b> ile canlandırmaya ne dersiniz?</p>
        </div>
    </section>
      <br><br><br>
      <div class="container-fluid mb-5 text-center"  style=" background-color: #778f9b">
        &nbsp;
      </div>

      <div class="container ">
        <div >
          <h1 class="text-center">Son Projeler</h1>
          <?php
              if($SORGUSAYISI1 > 10){ 
          ?>
               <p class="dahaFazla pt-2">Daha fazlası için <a href="proje">tıklayınız</a>.</p>
          <?php
              }
          ?>
          
        </div>

        <?php
            foreach($SORGULAR1 as $Sorgu){
              if($sayac1 == 10){
                break;
              }
        ?>


        <hr class="w-75 mt-5 mb-4 m-auto justify-content-center">
        <a href="proje/projedetay/index.php?PID=<?=$Sorgu["id"]?>" class="altcizgikaldir text-dark">
          <div class="row w-75 mx-auto" >
            <div class="col-md-2 AnsayafaSonYapilar">
              <img class="rounded mx-auto d-block" src="../images/proje/<?=$Sorgu["projeimg1"] ?>" alt="Generic placeholder image">
            </div>
            <div class="col-md-10">
              <h5 class="mt-0"><?php echo substr($Sorgu["baslik"],0,50); if(strlen($Sorgu["baslik"])>50){echo" ...";} ?></h5>
              <?=substr($Sorgu["aciklama"],0,100); if(strlen($Sorgu["aciklama"])>100){echo" ...";} ?>
            </div>
          </div>
        </a>
        <?php
            $sayac1++;
            }
        ?>
        
      </div>

    <br><br>

    <div class="container my-5">
    <h1 class="text-center">Son Paylaşımlar</h1>
    <hr class="w-75 mt-5 mb-4 m-auto justify-content-center">
    <?php
        if($SORGUSAYISI > 10){ 
    ?>
          <p class="dahaFazla pt-2">Daha fazlası için <a href="fotograflar.php">tıklayınız</a>.</p>
    <?php
        }
    ?>
        
      <div class="row text-center justify-content-center">        
        <?php
            foreach($SORGULAR as $Sorgu){ 
              if($sayac == 10){
                break;
              }
          ?>
        <div class="col-12 col-sm-6 col-md-4 projedetayfotolar my-3">
          <img src="../images/photo/<?=$Sorgu["IMG"] ?>" class= "projeimgDetay" alt="<?=$Sorgu["fotoAciklama"]; ?>"> <br> <br>
        </div><?php $sayac++; } ?>
      </div> 
    </div>

    <div class="container-fluid my-5" style="background-color: #ffab91">
      <div class="row justify-content-around p-5">
        <div class="col-3 text-center">
          <h3>İstihdam</h3>
          <p class="py-3">500</p>
        </div>
        <div class="col-3 text-center">
          <h3>Gerçekleşen Projeler</h3>
          <p class="py-3"><?=$SORGUSAYISI1?></p>
        </div>
        <div class="col-3 text-center">
          <h3>Toplam İnşaat Alanı</h3>
          <p class="py-3">5 000 m²</p>
        </div>
      </div>

    </div>
    <br>
    <div class="container-fluid mb-5 text-center"  style=" background-color: #778f9b">
        &nbsp;
    </div>

    <!--FOOTER-->
    <?php
    require("footer.php");
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</body>
</html>
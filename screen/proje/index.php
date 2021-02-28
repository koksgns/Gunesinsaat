<?php
  require("../../PHP/gereksinimler.php");
  $SORGU		=	$VeritabaniBaglantisi->prepare("SELECT * FROM  projeler WHERE durum = 0"); 
  $SORGU->execute();
  $SORGUSAYISI		=	$SORGU->rowCount();
  $SORGULAR	=	$SORGU->fetchAll(PDO::FETCH_ASSOC);
  $SORGULAR = array_reverse($SORGULAR);
  $sayac =1;

  $SORGU1		=	$VeritabaniBaglantisi->prepare("SELECT * FROM  projeler WHERE durum = 1"); 
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
          <a class="navbar-brand" href="index.php">Güneş İnşaat</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="../index.php">Anasayfa</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="index.php">Projeler</a>
              </li>              
              <li class="nav-item">
                <a class="nav-link" href="../hizmetlerimiz.php">Hizmetlerimiz</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../hakkinda.php">Hakkımızda</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../iletisim.php">İletişim</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../admin/">Giriş Yap</a>
              </li>
            </ul>
            <span class="navbar-text">
                Hayallerinizi süsleyen yapıların <b>Güneş İnşaat</b> ile canlandırmaya ne dersiniz?
            </span>
          </div>
        </div>
    </nav>


    <section class="slider projelerSlider">
        <div class="caption">
            <h1>GÜNEŞ İNŞAAT</h1>
            <p>Hayallerinizi süsleyen yapıların <b>Güneş İnşaat</b> ile canlandırmaya ne dersiniz?</p>
        </div>
    </section>
    <div class="container-fluid bg-dark my-5 text-center">
        &nbsp;
      </div>
    
    <div class="container">
     
      <div class="row m-5 justify-content-between">
        <h1 class="text-center">Devam Eden Projeler</h1>

        <?php
          foreach($SORGULAR as $Sorgu){
        ?>
       
        <div class="col-11 col-md-5 m-3 projelercerceve" style="background-color: coral;">
          <a class="altcizgikaldir" href="projedetay/index.php?PID=<?=$Sorgu["id"]?>">
          <div class="row p-2">
            <div class="col-12 text-center text-lg-left  col-xl-6">
              <img class= "projeimg" src="../../images/proje/<?=$Sorgu["projeimg1"]?>" class="projeimages" alt="">
            </div>
            <div class="col-12 col-xl-6 text-center p-3 text-dark">
              <h2><?php echo substr($Sorgu["baslik"],0,15); if(strlen($Sorgu["baslik"])>15){echo"...";} ?></h2>
              <p><?php echo substr($Sorgu["aciklama"],0,80); if(strlen($Sorgu["aciklama"])>80){echo"...";} ?></p>
            </div>
          </div>
        </a>
        </div>
        <?php
          }
        ?>


      </div>
    </div>



    <div class="container">
      
      <div class="row m-5 justify-content-between">
        <h1 class="text-center">Tamamlanmış Projeler</h1>
        
        
        <?php
          foreach($SORGULAR1 as $Sorgu){
        ?>
       
        <div class="col-11 col-md-5 m-3 projelercerceve" style="background-color: coral;">
          <a class="altcizgikaldir" href="projedetay/index.php?PID=<?=$Sorgu["id"]?>">
          <div class="row p-2">
            <div class="col-12 text-center text-lg-left  col-xl-6">
              <img class= "projeimg" src="../../images/proje/<?=$Sorgu["projeimg1"]?>" class="projeimages" alt="">
            </div>
            <div class="col-12 col-xl-6 text-center p-3 text-dark">
              <h2><?php echo substr($Sorgu["baslik"],0,15); if(strlen($Sorgu["baslik"])>15){echo"...";} ?></h2>
              <p><?php echo substr($Sorgu["aciklama"],0,80); if(strlen($Sorgu["aciklama"])>80){echo"...";} ?></p>
            </div>
          </div>
        </a>
        </div>
        <?php
          }
        ?>

        

      </div>
    </div>


    <div class="container-fluid my-5" style="background-color: rgb(236, 185, 118);">
      <div class="row justify-content-around p-5">
        <div class="col-5 text-center">
          <h3>Gerçekleşen Projeler</h3>
          <p class="py-3"><?=$SORGUSAYISI+$SORGUSAYISI1?></p>
        </div>
        <div class="col-5 text-center">
          <h3>Toplam İnşaat Alanı</h3>
          <p class="py-3">5 000 m²</p>
        </div>
      </div>

    </div>
    <div class="container-fluid bg-dark my-5 text-center">
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
<footer class="bg-dark pt-5 ">
    <div class="container text-white">
        <div class="row">
            <div class="col-md-4">
               <a href="../" class="navbar-brand footer-brand"><img src="../../images/logo/logo.png"></a>
            </div>
            <div class="col-md-3 mt-3">
                <ul class="list-unstyled">
                    <li class="mb-3 text-muted"><small>Şirket</small></li>
                    <li><a href="../index.php" class="text-white footer-text altcizgikaldir"> Anasayfa</li></a>
                    <li><a href="../proje/" class="text-white footer-text altcizgikaldir"> Projeler</li></a>
                    <li><a href="../hizmetlerimiz.php" class="text-white footer-text altcizgikaldir"> Hizmetlerimiz</li></a>
                    <li><a href="../hakkinda.php" class="text-white footer-text altcizgikaldir"> Hakkımızda</li></a>
                    <li><a href="../iletisim.php" class="text-white footer-text altcizgikaldir"> İletişim</li></a>
                </ul>
            </div>
            <div class="col-md-3 mt-3">
                <ul class="list-unstyled">
                    <li class="mb-3 text-muted"><small>Projeler</small></li>
                    <?php
                        foreach($SORGULARFooter as $Sorgu){
                            if($sayacFooter == 6){
                                break;
                            }
                    ?>
                        <li><a href="projedetay/index.php?PID=<?=$Sorgu["id"]?>" class="text-white footer-text altcizgikaldir"> <?php echo substr($Sorgu["baslik"],0,20); if(strlen($Sorgu["baslik"])>20){echo"...";} ?></li></a>
                    <?php
                            $sayacFooter++;
                        }
                    ?>
                </ul>
            </div>
            <div class="col-md-2 mt-3 text-end social-logo">
                <<a target="_blank" href="https://www.facebook.com/GÜNEŞ-Insaat-650970248400529/" class="text-white footer-text"><i class="fab fa-facebook-f fa-2x me-3"></i></a>                
                <a target="_blank" href="https://www.instagram.com/muratgunes522/" class="text-white footer-text"> <i class="fab fa-instagram fa-2x me-3"></i></a>
                <a target="_blank" href="https://wa.me/905419346709?text=Merhaba%20Güneş%20İnşaat" class="text-white footer-text"> <i class="fab fa-whatsapp fa-2x me-3"></i></a>
            </div>
            <div class="clearfix text-muted text-center">
                <p style="font-size: 14px; margin-top: 10px;" class="mb-3 ">Güneş İnşaat © Tüm Hakları Saklıdır. - Design: by <a href="https://www.instagram.com/koksgns/" class="altcizgikaldir text-success">KOKSGNS</a></p>
            </div>
        </div>
    </div>
</footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</body>
</html>
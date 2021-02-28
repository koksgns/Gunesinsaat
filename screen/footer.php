<?php
  require_once("../PHP/gereksinimler.php");
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
               <a href="index.php" class="navbar-brand footer-brand"><img src="../images/logo/logo.png"></a>
            </div>
            <div class="col-md-3 mt-3">
                <ul class="list-unstyled">
                    <li class="mb-3 text-muted"><small>Şirket</small></li>
                    <li><a href="index.php" class="text-white footer-text altcizgikaldir"> Anasayfa</li></a>
                    <li><a href="proje/" class="text-white footer-text altcizgikaldir"> Projeler</li></a>
                    <li><a href="hizmetlerimiz.php" class="text-white footer-text altcizgikaldir"> Hizmetlerimiz</li></a>
                    <li><a href="hakkinda.php" class="text-white footer-text altcizgikaldir"> Hakkımızda</li></a>
                    <li><a href="iletisim.php" class="text-white footer-text altcizgikaldir"> İletişim</li></a>
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
                        <li><a href="proje/projedetay/index.php?PID=<?=$Sorgu["id"]?>" class="text-white footer-text altcizgikaldir"> <?php echo substr($Sorgu["baslik"],0,20); if(strlen($Sorgu["baslik"])>20){echo"...";} ?></li></a>
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
                <p style="font-size: 14px; margin-top: 10px;" class="mb-3 ">Güneş İnşaat © Tüm Hakları Saklıdır. - Design: by <a href="https://www.instagram.com/koksgns/" class="altcizgikaldir text-success">KOKSGNS</a></p>
            </div>
        </div>
    </div>
</footer>
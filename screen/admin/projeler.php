<?php
session_start();
$UserID = $_SESSION["id"];
if($UserID != ""){
  require("../../PHP/gereksinimler.php");

if(isset($_REQUEST["KID"])){
    $KID   =  $_REQUEST["KID"];

    
    $SORGU2		=	$VeritabaniBaglantisi->prepare("SELECT * FROM  projeler WHERE projeimg1= '$KID'"); 
    $SORGU2->execute();
    $SORGUSAYISI2		=	$SORGU2->rowCount();
    $SORGULAR2	=	$SORGU2->fetch(PDO::FETCH_ASSOC);

    if($SORGUSAYISI2>0){
        
        $image  =   $SORGULAR2["projeimg1"];
        $dosya = "../../images/proje/".$image;
        
        if(file_exists($dosya)){
            unlink($dosya);
            //echo '<img src="'.$dosya.'" alt="logo" class="m-auto" >';
            //echo "Belirlenen dosya silindi.";
        }else{
            //echo "Belirlenen dosya bu dizinde değildir.";
        }    
    
        $KayitSil   =   $VeritabaniBaglantisi->query("DELETE FROM projeler WHERE projeimg1 = '$KID'");
        if($KayitSil){
            $message = "Kayıt Silindi";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }   
}

if(isset($_REQUEST["tamamlandi"])){
  $tamamlandi   =  $_REQUEST["tamamlandi"];
  $UyeGuncellemeSorgusu2		=	$VeritabaniBaglantisi->prepare("UPDATE projeler SET durum = 0 WHERE id = '$tamamlandi'");
  $UyeGuncellemeSorgusu2->execute();
  $Kontrol2		=	$UyeGuncellemeSorgusu2->rowCount();
  if($Kontrol2>0){
    $message = "Projenin durumu devam ediyor olarak güncellendi";
  }else{
    $message = "Beklenmedik bir hata oluştu lütfen daha sonra tekrar deneyiniz";
  }  
  echo "<script type='text/javascript'>alert('$message');</script>";
}

if(isset($_REQUEST["DevamEdiyor"])){
  $devamEdiyor   =  $_REQUEST["DevamEdiyor"];
  $UyeGuncellemeSorgusu2		=	$VeritabaniBaglantisi->prepare("UPDATE projeler SET durum = 1 WHERE id = '$devamEdiyor'");
  $UyeGuncellemeSorgusu2->execute();
  $Kontrol2		=	$UyeGuncellemeSorgusu2->rowCount();
  if($Kontrol2>0){
    $message = "Projenin durumu tamamlandı olarak güncellendi";
  }else{
    $message = "Beklenmedik bir hata oluştu lütfen daha sonra tekrar deneyiniz";
  }  
  echo "<script type='text/javascript'>alert('$message');</script>";
}


  $SORGU1		=	$VeritabaniBaglantisi->prepare("SELECT * FROM  projeler"); 
  $SORGU1->execute();
  $SORGUSAYISI1		=	$SORGU1->rowCount();
  $SORGULAR1	=	$SORGU1->fetchAll(PDO::FETCH_ASSOC);
  $SORGULAR1 = array_reverse($SORGULAR1);
  $sayac=1;
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
  <br>
    <h1 class="text-center my-5">Yeni Proje Kayıt</h1>
    <hr class="w-75 mt-5 mb-4 m-auto justify-content-center">
    <div class="container text-center my-5">
      <form action="../../PHP/projeKayit.php" enctype="multipart/form-data" method="POST">
        <div class="row justify-content-center">
            <div class="col-11 col-md-6 p-5">
              <div class="form-group">
                <label for="baslik" >Bir Başlık Giriniz</label>
                <input type="text" name="baslik" maxlength="80" class="form-control" id="baslik" required>
              </div>
              <br>
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label for="baslamaTarih" >Başlama Tarihi</label>
                    <input type="date" name="baslamaTarih" class="form-control" id="baslamaTarih" required>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="bitisTarih" >Bitiş Tarihi</label>
                    <input type="date" name="bitisTarih" class="form-control" id="bitisTarih" required>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label for="il" >İl</label>
                    <select name="il" id="il" class="form-select" aria-label="Default select example">
                      <option value="0">------</option>
                      <option value="Adana">Adana</option>
                      <option value="Adıyaman">Adıyaman</option>
                      <option value="Afyonkarahisar">Afyonkarahisar</option>
                      <option value="Ağrı">Ağrı</option>
                      <option value="Amasya">Amasya</option>
                      <option value="Ankara">Ankara</option>
                      <option value="Antalya">Antalya</option>
                      <option value="Artvin">Artvin</option>
                      <option value="Aydın">Aydın</option>
                      <option value="Balıkesir">Balıkesir</option>
                      <option value="Bilecik">Bilecik</option>
                      <option value="Bingöl">Bingöl</option>
                      <option value="Bitlis">Bitlis</option>
                      <option value="Bolu">Bolu</option>
                      <option value="Burdur">Burdur</option>
                      <option value="Bursa">Bursa</option>
                      <option value="Çanakkale">Çanakkale</option>
                      <option value="Çankırı">Çankırı</option>
                      <option value="Çorum">Çorum</option>
                      <option value="Denizli">Denizli</option>
                      <option value="Diyarbakır">Diyarbakır</option>
                      <option value="Edirne">Edirne</option>
                      <option value="Elazığ">Elazığ</option>
                      <option value="Erzincan">Erzincan</option>
                      <option value="Erzurum">Erzurum</option>
                      <option value="Eskişehir">Eskişehir</option>
                      <option value="Gaziantep">Gaziantep</option>
                      <option value="Giresun">Giresun</option>
                      <option value="Gümüşhane">Gümüşhane</option>
                      <option value="Hakkâri">Hakkâri</option>
                      <option value="Hatay">Hatay</option>
                      <option value="Isparta">Isparta</option>
                      <option value="Mersin">Mersin</option>
                      <option value="İstanbul">İstanbul</option>
                      <option value="İzmir">İzmir</option>
                      <option value="Kars">Kars</option>
                      <option value="Kastamonu">Kastamonu</option>
                      <option value="Kayseri">Kayseri</option>
                      <option value="Kırklareli">Kırklareli</option>
                      <option value="Kırşehir">Kırşehir</option>
                      <option value="Kocaeli">Kocaeli</option>
                      <option value="Konya">Konya</option>
                      <option value="Kütahya">Kütahya</option>
                      <option value="Malatya">Malatya</option>
                      <option value="Manisa">Manisa</option>
                      <option value="Kahramanmaraş">Kahramanmaraş</option>
                      <option value="Mardin">Mardin</option>
                      <option value="Muğla">Muğla</option>
                      <option value="Muş">Muş</option>
                      <option value="Nevşehir">Nevşehir</option>
                      <option value="Niğde">Niğde</option>
                      <option value="Ordu">Ordu</option>
                      <option value="Rize">Rize</option>
                      <option value="Sakarya">Sakarya</option>
                      <option value="Samsun">Samsun</option>
                      <option value="Siirt">Siirt</option>
                      <option value="Sinop">Sinop</option>
                      <option value="Sivas">Sivas</option>
                      <option value="Tekirdağ">Tekirdağ</option>
                      <option value="Tokat">Tokat</option>
                      <option value="Trabzon">Trabzon</option>
                      <option value="Tunceli">Tunceli</option>
                      <option value="Şanlıurfa">Şanlıurfa</option>
                      <option value="Uşak">Uşak</option>
                      <option value="Van">Van</option>
                      <option value="Yozgat">Yozgat</option>
                      <option value="Zonguldak">Zonguldak</option>
                      <option value="Aksaray">Aksaray</option>
                      <option value="Bayburt">Bayburt</option>
                      <option value="Karaman">Karaman</option>
                      <option value="Kırıkkale">Kırıkkale</option>
                      <option value="Batman">Batman</option>
                      <option value="Şırnak">Şırnak</option>
                      <option value="Bartın">Bartın</option>
                      <option value="Ardahan">Ardahan</option>
                      <option value="Iğdır">Iğdır</option>
                      <option value="Yalova">Yalova</option>
                      <option value="Karabük">Karabük</option>
                      <option value="Kilis">Kilis</option>
                      <option value="Osmaniye">Osmaniye</option>
                      <option value="Düzce">Düzce</option>
                  </select>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="ilce" >İlçe</label>
                    <input type="text" name="ilce" class="form-control" id="ilce" required>
                  </div>
                </div>
              </div>
              <br>
            </div>
            <div class="col-11 col-md-6">
                <label for="kapakFoto" >Kapak Resmi Yükleyin</label>
                <div class="drop-zone m-auto">
                    <span class="drop-zone__prompt">Dosyayı buraya sürükle ya da yüklemek için tıkla</span>
                    <input type="file" id="kapakFoto" accept="image/*" name="myFile" class="drop-zone__input">
                </div>
            </div>
            <div class="col-11 col-md-12 m-auto">
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Açıklama Giriniz</label>
                <textarea class="form-control" name="aciklama" id="exampleFormControlTextarea1" rows="7"></textarea>
              </div>
            </div>
            <div class="col-11 col-md-12 my-5">
                <button type="submit" class="btn btn-primary w-25">Kaydet</button>
            </div>
        </div>
      </form>
    </div>
    <br>
    <h1 class="text-center my-5">Kayıtlı Projeler</h1>
    <hr class="w-75 mt-5 mb-4 m-auto justify-content-center">
    <p class="w-75 m-auto text-warning"><i class="fas fa-exclamation-triangle fa-2x"></i> Buton Klavuzu.</p> <br>
    <p  class="w-75 m-auto "><i class="far fa-images fa-2x text-primary" ></i> Proje sayfasına projeyle ilgili daha fazla görsel eklemek için kullanılır.</p> <br>
    <p  class="w-75 m-auto "><i class="far fa-edit fa-2x text-info" ></i> Proje hakkında girilen bilgileri için kullanılır.</p> <br>
    <p  class="w-75 m-auto "><i class="fas fa-check  fa-2x text-success"></i> Projenin tamamlandığını belirtir tekrar tıklanıldığında tamamlanma durumundan devam ediliyor durmuna geçer.</p> <br>
    <p  class="w-75 m-auto "><i class="fas fa-times fa-2x text-secondary" ></i> Projenin devam ettiğini belirtir tekrar tıklanıldığında devam ediliyor durumundan tamamlanma durmuna geçer.</p> <br>
    <p  class="w-75 m-auto "><i class="far fa-trash-alt fa-2x text-danger" ></i> Projeyi silmek için kullanılır.</p> <br>
    
    <div class="container mb-5">
      <div class="justify-content-center">
          <div class="table-responsive">          
              <table class="table projelerTablosu  table-hover text-center">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th colspan="4">İşlemler</th>
                          <th>Foto</th>
                          <th>Başlık</th>
                          <th>Başlama Tarihi</th>
                          <th>Bitiş Tarihi</th>
                          <th>İl</th>
                          <th>ilçe</th>
                          <th>Açıklama</th>                          
                      </tr>
                  </thead>
                  <tbody>
                      <?php 
                      if($SORGUSAYISI1 == 0 ){
                        echo"<tr><td colspan='10' class='p-3'>Kayıt Yok</td></tr>";
                      }
                      
                      
                      foreach($SORGULAR1 as $Sorgu1){ 
                        $durum = $Sorgu1['durum'];
                        ?>
                          
                      <tr>
                        <td><?= $sayac?></td>
                        <td><i class="far fa-images fa-2x text-primary" onclick="AddIMG(<?=$Sorgu1['id']?>)"></i></td>
                        <td><i class='far fa-edit fa-2x text-info' onclick="Edit(<?=$Sorgu1['id']?>)"></i></td>
                        <td><?php if($durum == 0){ ?><i class="fas fa-times fa-2x text-secondary" onclick="devamEdiyor(<?=$Sorgu1['id']?>)" ></i> <?php }else{ ?><i class="fas fa-check fa-2x text-success" onclick="tamamlandı(<?=$Sorgu1['id']?>)"></i><?php } ?></td>
                        <td><i class='far fa-trash-alt fa-2x text-danger' onclick="Delete('<?=$Sorgu1['projeimg1']?>')"></i></td>
                        <td onclick="OpenProject(<?=$Sorgu1['id']?>)"><img src="<?="../../images/proje/".$Sorgu1["projeimg1"]?>" alt="logo" class="m-auto" ></td>                        
                        <td onclick="OpenProject(<?=$Sorgu1['id']?>)"><?=$Sorgu1["baslik"]?></td>
                        <td onclick="OpenProject(<?=$Sorgu1['id']?>)"><?=$Sorgu1["baslamaTarih"]?></td>
                        <td onclick="OpenProject(<?=$Sorgu1['id']?>)"><?=$Sorgu1["bitisTarih"]?></td>
                        <td onclick="OpenProject(<?=$Sorgu1['id']?>)"><?=$Sorgu1["il"]?></td>
                        <td onclick="OpenProject(<?=$Sorgu1['id']?>)"><?=$Sorgu1["ilçe"]?></td>
                        <td onclick="OpenProject(<?=$Sorgu1['id']?>)"><?php echo substr($Sorgu1["aciklama"],0,80); if(strlen($Sorgu1["aciklama"])>80){echo"...";}?></td>
                      </tr>                         
                      <?php $sayac++; } ?>                 
                  </tbody>
              </table>
          </div>
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
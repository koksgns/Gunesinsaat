<?php
session_start();
$UserID = $_SESSION["id"];
if($UserID != ""){
  require("../../PHP/gereksinimler.php");

if(isset($_REQUEST["KID"])){
    $KID   =  $_REQUEST["KID"];

    
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
  <br>
    <h1 class="text-center my-5">Kayıtlı Proje Güncelle</h1>
    <hr class="w-75 mt-5 mb-4 m-auto justify-content-center">
    <div class="container text-center my-5">
      <form action="../../PHP/projeDuzenleKaydet.php?KID=<?=$KID ?>" enctype="multipart/form-data" method="POST">
        <div class="row justify-content-center">
            <div class="col-11 col-md-6 p-5">
              <div class="form-group">
                <label for="baslik" >Bir Başlık Giriniz</label>
                <input type="text" name="baslik" maxlength="80" class="form-control" value="<?=$baslik?>" id="baslik" required>
              </div>
              <br>
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label for="baslamaTarih" >Başlama Tarihi</label>
                    <input type="date" name="baslamaTarih" class="form-control" value="<?=$baslamaTarih?>"id="baslamaTarih" required>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="bitisTarih" >Bitiş Tarihi</label>
                    <input type="date" name="bitisTarih" class="form-control" value="<?=$bitisTarih?>" id="bitisTarih" required>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label for="il" >İl</label>                    
                    <select name="il" id="il" class="form-select"  aria-label="Default select example">
                      <option <?php if($il=="") { echo ' selected="selected"'; } ?> value="0">------</option>
                      <option <?php if($il=="Adana") { echo ' selected="selected"'; } ?> value="Adana">Adana</option>
                      <option <?php if($il=="Adıyaman") { echo ' selected="selected"'; } ?> value="Adıyaman">Adıyaman</option>
                      <option <?php if($il=="Afyonkarahisar") { echo ' selected="selected"'; } ?> value="Afyonkarahisar">Afyonkarahisar</option>
                      <option <?php if($il=="Ağrı") { echo ' selected="selected"'; } ?> value="Ağrı">Ağrı</option>
                      <option <?php if($il=="Amasya") { echo ' selected="selected"'; } ?> value="Amasya">Amasya</option>
                      <option <?php if($il=="Ankara") { echo ' selected="selected"'; } ?> value="Ankara">Ankara</option>
                      <option <?php if($il=="Antalya") { echo ' selected="selected"'; } ?> value="Antalya">Antalya</option>
                      <option <?php if($il=="Artvin") { echo ' selected="selected"'; } ?> value="Artvin">Artvin</option>
                      <option <?php if($il=="Aydın") { echo ' selected="selected"'; } ?> value="Aydın">Aydın</option>
                      <option <?php if($il=="Balıkesir") { echo ' selected="selected"'; } ?> value="Balıkesir">Balıkesir</option>
                      <option <?php if($il=="Bilecik") { echo ' selected="selected"'; } ?> value="Bilecik">Bilecik</option>
                      <option <?php if($il=="Bingöl") { echo ' selected="selected"'; } ?> value="Bingöl">Bingöl</option>
                      <option <?php if($il=="Bitlis") { echo ' selected="selected"'; } ?> value="Bitlis">Bitlis</option>
                      <option <?php if($il=="Bolu") { echo ' selected="selected"'; } ?> value="">Bolu</option>
                      <option <?php if($il=="Burdur") { echo ' selected="selected"'; } ?> value="Burdur">Burdur</option>
                      <option <?php if($il=="Bursa") { echo ' selected="selected"'; } ?> value="Bursa">Bursa</option>
                      <option <?php if($il=="Çanakkale") { echo ' selected="selected"'; } ?> value="Çanakkale">Çanakkale</option>
                      <option <?php if($il=="Çankırı") { echo ' selected="selected"'; } ?> value="Çankırı">Çankırı</option>
                      <option <?php if($il=="Çorum") { echo ' selected="selected"'; } ?> value="Çorum">Çorum</option>
                      <option <?php if($il=="Denizli") { echo ' selected="selected"'; } ?> value="Denizli">Denizli</option>
                      <option <?php if($il=="Diyarbakır") { echo ' selected="selected"'; } ?> value="Diyarbakır">Diyarbakır</option>
                      <option <?php if($il=="Edirne") { echo ' selected="selected"'; } ?> value="Edirne">Edirne</option>
                      <option <?php if($il=="Elazığ") { echo ' selected="selected"'; } ?> value="Elazığ">Elazığ</option>
                      <option <?php if($il=="Erzincan") { echo ' selected="selected"'; } ?> value="Erzincan">Erzincan</option>
                      <option <?php if($il=="Erzurum") { echo ' selected="selected"'; } ?> value="Erzurum">Erzurum</option>
                      <option <?php if($il=="Eskişehir") { echo ' selected="selected"'; } ?> value="Eskişehir">Eskişehir</option>
                      <option <?php if($il=="Gaziantep") { echo ' selected="selected"'; } ?> value="Gaziantep">Gaziantep</option>
                      <option <?php if($il=="Giresun") { echo ' selected="selected"'; } ?> value="Giresun">Giresun</option>
                      <option <?php if($il=="Gümüşhane") { echo ' selected="selected"'; } ?> value="Gümüşhane">Gümüşhane</option>
                      <option <?php if($il=="Hakkâri") { echo ' selected="selected"'; } ?> value="Hakkâri">Hakkâri</option>
                      <option <?php if($il=="Hatay") { echo ' selected="selected"'; } ?> value="Hatay">Hatay</option>
                      <option <?php if($il=="Isparta") { echo ' selected="selected"'; } ?> value="Isparta">Isparta</option>
                      <option <?php if($il=="Mersin") { echo ' selected="selected"'; } ?> value="Mersin">Mersin</option>
                      <option <?php if($il=="İstanbul") { echo ' selected="selected"'; } ?> value="İstanbul">İstanbul</option>
                      <option <?php if($il=="İzmir") { echo ' selected="selected"'; } ?> value="İzmir">İzmir</option>
                      <option <?php if($il=="Kars") { echo ' selected="selected"'; } ?> value="Kars">Kars</option>
                      <option <?php if($il=="Kastamonu") { echo ' selected="selected"'; } ?> value="Kastamonu">Kastamonu</option>
                      <option <?php if($il=="Kayseri") { echo ' selected="selected"'; } ?> value="Kayseri">Kayseri</option>
                      <option <?php if($il=="Kırklareli") { echo ' selected="selected"'; } ?> value="Kırklareli">Kırklareli</option>
                      <option <?php if($il=="Kırşehir") { echo ' selected="selected"'; } ?> value="Kırşehir">Kırşehir</option>
                      <option <?php if($il=="Kocaeli") { echo ' selected="selected"'; } ?> value="Kocaeli">Kocaeli</option>
                      <option <?php if($il=="Konya") { echo ' selected="selected"'; } ?> value="Konya">Konya</option>
                      <option <?php if($il=="Kütahya") { echo ' selected="selected"'; } ?> value="Kütahya">Kütahya</option>
                      <option <?php if($il=="Malatya") { echo ' selected="selected"'; } ?> value="Malatya">Malatya</option>
                      <option <?php if($il=="Manisa") { echo ' selected="selected"'; } ?> value="Manisa">Manisa</option>
                      <option <?php if($il=="Kahramanmaraş") { echo ' selected="selected"'; } ?> value="Kahramanmaraş">Kahramanmaraş</option>
                      <option <?php if($il=="Mardin") { echo ' selected="selected"'; } ?> value="Mardin">Mardin</option>
                      <option <?php if($il=="Muğla") { echo ' selected="selected"'; } ?> value="Muğla">Muğla</option>
                      <option <?php if($il=="Muş") { echo ' selected="selected"'; } ?> value="Muş">Muş</option>
                      <option <?php if($il=="Nevşehir") { echo ' selected="selected"'; } ?> value="Nevşehir">Nevşehir</option>
                      <option <?php if($il=="Niğde") { echo ' selected="selected"'; } ?> value="Niğde">Niğde</option>
                      <option <?php if($il=="Ordu") { echo ' selected="selected"'; } ?> value="Ordu">Ordu</option>
                      <option <?php if($il=="Rize") { echo ' selected="selected"'; } ?> value="Rize">Rize</option>
                      <option <?php if($il=="Sakarya") { echo ' selected="selected"'; } ?> value="Sakarya">Sakarya</option>
                      <option <?php if($il=="Samsun") { echo ' selected="selected"'; } ?> value="Samsun">Samsun</option>
                      <option <?php if($il=="Siirt") { echo ' selected="selected"'; } ?> value="Siirt">Siirt</option>
                      <option <?php if($il=="Sinop") { echo ' selected="selected"'; } ?> value="Sinop">Sinop</option>
                      <option <?php if($il=="Sivas") { echo ' selected="selected"'; } ?> value="Sivas">Sivas</option>
                      <option <?php if($il=="Tekirdağ") { echo ' selected="selected"'; } ?> value="Tekirdağ">Tekirdağ</option>
                      <option <?php if($il=="Tokat") { echo ' selected="selected"'; } ?> value="Tokat">Tokat</option>
                      <option <?php if($il=="Trabzon") { echo ' selected="selected"'; } ?> value="Trabzon">Trabzon</option>
                      <option <?php if($il=="Tunceli") { echo ' selected="selected"'; } ?> value="Tunceli">Tunceli</option>
                      <option <?php if($il=="Şanlıurfa") { echo ' selected="selected"'; } ?> value="Şanlıurfa">Şanlıurfa</option>
                      <option <?php if($il=="Uşak") { echo ' selected="selected"'; } ?> value="Uşak">Uşak</option>
                      <option <?php if($il=="Van") { echo ' selected="selected"'; } ?> value="Van">Van</option>
                      <option <?php if($il=="Yozgat") { echo ' selected="selected"'; } ?> value="Yozgat">Yozgat</option>
                      <option <?php if($il=="Zonguldak") { echo ' selected="selected"'; } ?> value="Zonguldak">Zonguldak</option>
                      <option <?php if($il=="Aksaray") { echo ' selected="selected"'; } ?> value="Aksaray">Aksaray</option>
                      <option <?php if($il=="Bayburt") { echo ' selected="selected"'; } ?> value="Bayburt">Bayburt</option>
                      <option <?php if($il=="Karaman") { echo ' selected="selected"'; } ?> value="Karaman">Karaman</option>
                      <option <?php if($il=="Kırıkkale") { echo ' selected="selected"'; } ?> value="Kırıkkale">Kırıkkale</option>
                      <option <?php if($il=="Batman") { echo ' selected="selected"'; } ?> value="Batman">Batman</option>
                      <option <?php if($il=="Şırnak") { echo ' selected="selected"'; } ?> value="Şırnak">Şırnak</option>
                      <option <?php if($il=="Bartın") { echo ' selected="selected"'; } ?> value="Bartın">Bartın</option>
                      <option <?php if($il=="Ardahan") { echo ' selected="selected"'; } ?> value="Ardahan">Ardahan</option>
                      <option <?php if($il=="Iğdır") { echo ' selected="selected"'; } ?> value="Iğdır">Iğdır</option>
                      <option <?php if($il=="Yalova") { echo ' selected="selected"'; } ?> value="Yalova">Yalova</option>
                      <option <?php if($il=="Karabük") { echo ' selected="selected"'; } ?> value="Karabük">Karabük</option>
                      <option <?php if($il=="Kilis") { echo ' selected="selected"'; } ?> value="Kilis">Kilis</option>
                      <option <?php if($il=="Osmaniye") { echo ' selected="selected"'; } ?> value="Osmaniye">Osmaniye</option>
                      <option <?php if($il=="Düzce") { echo ' selected="selected"'; } ?> value="Düzce">Düzce</option>
                  </select>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="ilce" >İlçe</label>
                    <input type="text" name="ilce" class="form-control" value="<?=$ilçe?>"id="ilce" required>
                  </div>
                </div>
              </div>
              <br>
            </div>
            <div class="col-11 col-md-6 p-5">
            <label for="exampleFormControlTextarea1">Açıklama Giriniz</label>
                <textarea class="form-control" name="aciklama" id="exampleFormControlTextarea1" rows="8"><?=$aciklama?></textarea>
                </div>
            </div>
            <div class="col-11 col-md-12 my-5">
                <button type="submit" class="btn btn-primary w-25">Değişiklikleri Kaydet</button>
            </div>
        </div>
      </form>
    </div>
    <br>
    <div class="container">
        <h1 class="text-center my-5">Kapak Fotoğrafı Güncelle</h1>
        <hr class="w-75 mt-5 mb-4 m-auto justify-content-center">
        <form action="../../PHP/projeDuzenleKaydet.php?KID=<?=$KID ?>" enctype="multipart/form-data" method="POST">
            <div class="row m-5 AdminKapakFoto">            
                <div class="col-11 col-md-6 p-5 text-center">
                    <img src="../../images/proje/<?=$image?>" alt="">
                </div>
            
                
                <div class="col-11 col-md-6 p-5 text-center">
                    <label for="kapakFoto" >Kapak Resmi Yükleyin</label>
                    <div class="drop-zone m-auto">
                        <span class="drop-zone__prompt">Dosyayı buraya sürükle ya da yüklemek için tıkla</span>
                        <input type="file" id="kapakFoto" accept="image/*" name="myFile" class="drop-zone__input">
                    </div>
                </div>
                
                <div class="col-12 text-center p-5">
                    <button type="submit" class="btn btn-primary w-25">Değişiklikleri Kaydet</button>
                </div>
                <div class="col-12 mb-5">
                    Daha fazla fotoğraf eklemek için <a href="projeFotografEkle.php?KID=<?=$KID ?>">tıklayınız.</a>
                </div>
            
            </div>
        </form>
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
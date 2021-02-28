<!DOCTYPE html>
<html lang="TR-tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Güneş İnşaat</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/main.css"/>
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
                <a class="nav-link" aria-current="page" href="index.php">Anasayfa</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="proje/">Projeler</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="hizmetlerimiz.php">Hizmetlerimiz</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="hakkinda.php">Hakkımızda</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="iletisim.ph">İletişim</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="admin/">Giriş Yap</a>
              </li>
            </ul>
            <span class="navbar-text">
                Hayallerinizi süsleyen yapıların <b>Güneş İnşaat</b> ile canlandırmaya ne dersiniz?
            </span>
          </div>
        </div>
    </nav>


    <section class="slider iletisimSlider">
        <div class="caption">
            <h1>GÜNEŞ İNŞAAT</h1>
            <p>Hayallerinizi süsleyen yapıların <b>Güneş İnşaat</b> ile canlandırmaya ne dersiniz?</p>
        </div>
    </section>
    <div class="container-fluid bg-dark my-5 text-center">
        &nbsp;
    </div>

    <div class="container my-5">
      <h1 class="text-center">Bize Ulaşın</h1>
      <div class="row">
        <div class="col-12 col-md-6 order-2 order-md-1 my-5">
          <iframe   class="ilteisimHarita" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3018.7383261775617!2d26.6575573!3d40.833711!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14b3c6f4ca782a7f%3A0x3bd91fec6442c98a!2sKe%C5%9Fan%20Yusuf%20%C3%87apraz%20Uygulamal%C4%B1%20Bilimler%20Y%C3%BCksekokulu!5e0!3m2!1str!2str!4v1606422385638!5m2!1str!2str" width="700" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
        <div class="col-12 col-md-6 text-center my-5 my-md-auto order-1  order-md-2">
          <img src="../images/logo/logo.png" alt="logo" class="my-5">
          <table class="table table-borderless" >
            <tr>
              <td class="col-4" style="text-align: right;">Telefon <i class="fas fa-phone"></i></td>
              <td>:</td>
              <td style="text-align: left;"><a class="altcizgikaldir" href="tel://+90312876xxxx">+90 312 876xxxx</a></td>
            </tr>
            <tr>
              <td class="col-4" style="text-align: right;">E-posta <i class="fas fa-envelope"></i></td>
              <td>:</td>
              <td style="text-align: left;"><a class="altcizgikaldir" href="mailto:webmaster@example.com">xxxxxx@xxxx.com</a></td>
            </tr>
            <tr>
              <td class="col-4" style="text-align: right;">Whatsapp <i class="fab fa-whatsapp-square"></i></td>
              <td>:</td>
              <td style="text-align: left;"><a class="altcizgikaldir" target="_blank" href="https://wa.me/905419346709?text=Merhaba%20Güneş%20İnşaat">+90 312 876xxxx</a></td>
            </tr>
            <tr>
              <td class="col-4" style="text-align: right;">Adres <i class="fas fa-map-marked-alt"></i></td>
              <td>:</td>
              <td style="text-align: left;"><a class="altcizgikaldir" href="xxxxxxxx">xxxxxxxxxxxxxxxxxxxxxxxxxxxxx</a></td>
            </tr>
            
          </table>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row justify-content-center my-5">
        <h1 class="text-center my-2">İletişim Formu</h1>
        <div class="col-6">
          <form action="xxxxxxxxxx" method="GET">
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="Ad" >Adınız</label>
                  <input type="text" required name="ad" class="form-control" id="ad">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="Soyad" >Soyadınız</label>
                  <input type="text" required name="soyad" class="form-control" id="Soyad">
                </div>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-8">
                <div class="form-group">
                  <label for="exampleInputEmail1" >Email addres</label>
                  <input type="email" required class="form-control" name="email" id="exampleInputEmail1">
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label for="telefon" >Telefon Numarası</label>
                  <input type="text" required class="form-control" name="telefon" maxlength="11" id="telefon">
                </div>
              </div>
            </div>            
            <br>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Mesajınız</label>
              <textarea class="form-control"required id="exampleFormControlTextarea1" name="mesaj" rows="3"></textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Gönder</button>
          </form>
        </div>
      </div>
    </div>

    <div class="container-fluid bg-dark my-5">$nbsp</div>

     <!--FOOTER-->
    <?php
    require("footer.php");
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</body>
</html>
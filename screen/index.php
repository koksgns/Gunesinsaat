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
    <nav class="navbar navbar-expand-lg navbar-light p-3" style="background-color: #529dd3;">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">Güneş İnşaat</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Anasayfa</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="proje/">Projeler</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="hakkinda.php">Hakkımızda</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="iletisim.php">İletişim</a>
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

      <!--Slider-->
      <div id="carouselExampleDark" class="carousel carousel-dark slide mt-5 " data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active" >
            <img src="../images/slider/2.jpg" class="d-block w-100 h-25" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div>
          </div>
          <div class="carousel-item" >
            <img src="../images/slider/2.jpg" class="d-block w-100 h-25" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
              <p>Some representative placeholder content for the second slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="../images/slider/2.jpg" class="rounded mx-auto d-block w-100 h-25" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Third slide label</h5>
              <p>Some representative placeholder content for the third slide.</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"  data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"  data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

      <br><br><br>

      <div class="container">
        <div class="text-center">
          <h1>Son Yapılar</h1>
        </div>
        <hr class="w-75 mt-5 mb-4 m-auto justify-content-center">
        
        <div class="row w-75 mx-auto" >
          <div class="col-md-2">
            <img class="rounded mx-auto d-block" src="../images/news/100X100.png" alt="Generic placeholder image">
          </div>
          <div class="col-md-10">
            <h5 class="mt-0">Media heading</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
          </div>
        </div>
      </div>


    



    <br><br>
    <div class="container">
    <div class="mt-5 text-center">
        <h1>Son Paylaşımlar</h1>
      </div>
      <hr class="w-75 mt-5 mb-4 m-auto justify-content-center">
      
      <div class=" w-75 mx-auto paylasimdiv" >    
        <?php for($don=0; $don<10; $don++){ ?>    
        <div class="paylasiimgdiv">
          <img class="rounded mx-auto d-block paylasimimg p-3 border-white" src="../images/news/500x500.png" alt="Generic placeholder image">
        </div>
        <?php } ?>
      </div>
    </div>

    <div class="container-fluet my-5" style="background-color: rgb(236, 185, 118);">
      <div class="row justify-content-around p-5">
        <div class="col-3 text-center">
          <h3>İstihdam</h3>
          <p class="py-3">500</p>
        </div>
        <div class="col-3 text-center">
          <h3>Gerçekleşen Projeler</h3>
          <p class="py-3">500</p>
        </div>
        <div class="col-3 text-center">
          <h3>Toplam İnşaat Alanı</h3>
          <p class="py-3">5 000 m²</p>
        </div>
      </div>

    </div>
    <br>

    <!--FOOTER-->
    <?php
    require("footer.php");
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</body>
</html>
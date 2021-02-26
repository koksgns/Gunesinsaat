<?php
session_start();
if(isset($_SESSION["id"])){
    $UserID = $_SESSION["id"];
    if($UserID != ""){
        echo "as";
        header("Location: home.php");
    }
}
if(isset($_POST["Pass"]) && isset($_POST["User"])){
    
    require("../../PHP/gereksinimler.php");
    $USER   =   Filtrele(ucwords($_POST["User"]));
    $PASS   =   Filtrele(ucwords($_POST["Pass"]));


    $SORGU		=	$VeritabaniBaglantisi->prepare("SELECT * FROM  users WHERE username = '$USER' OR email = '$USER' "); 
    $SORGU->execute();
    $SORGUSAYISI		=	$SORGU->rowCount();
    $SORGULAR	=	$SORGU->fetch(PDO::FETCH_ASSOC);
    if($SORGUSAYISI>0){
        $Parola = $SORGULAR["password"];
        if($PASS == $Parola){
            $_SESSION["id"] = $SORGULAR["id"];
            header("Location: home.php");
        }else{
            $message = "Hatalı Parola Girdiniz!";
        }
    }else{
        $message = "Hatalı Kullanıcı Adınızı veya E-posta Adresi Girdiniz!";
    }
    $VeritabaniBaglantisi   = null;
    
    
    echo "<script type='text/javascript'>alert('$message');</script>";
}


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
<body class="bg-secondary">
    <div class="container my-5">
        <div class="text-center my-auto giris bg-dark">
            <a href="../"><img src="../../images/logo/logo.png" alt="logo" class="my-5"></a>
        </div>
        <br><br>
        <div class="text-center bg-dark giris p-5">
            <form action="index.php" method="POST">
                <div class="form-group">
                    <input type="text" required name="User" placeholder="Kullanıcı Adınızı veya E-posta Adresinizi Giriniz" class="w-50 m-auto form-control">
                </div>
                <br>
                <div class="form-group">
                    <input type="password" required name="Pass" placeholder="Parolanızı Giriniz" class="w-50 m-auto form-control">
                </div>
                <br>
                <button type="submit" class="btn btn-primary w-25">Giriş Yap</button> <a href=""class="btn btn-primary w-25">Şifremi Unuttum</a>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</body>
</html>
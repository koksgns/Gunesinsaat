<?php
  require("gereksinimler.php");


if(isset($_REQUEST["baslik"])){
    $BASLIK   =  Filtrele(ucwords($_REQUEST["baslik"]));
}else{
    $BASLIK   = "";
}

if(isset($_REQUEST["baslamaTarih"])){
    echo $BASLAMATARIHI   =  Filtrele($_REQUEST["baslamaTarih"]);
}else{
    $BASLAMATARIHI   = "";
}

if(isset($_REQUEST["bitisTarih"])){
    $BITISTARIH   =  Filtrele($_REQUEST["bitisTarih"]);
}else{
    $BITISTARIH   = "";
}

if(isset($_REQUEST["il"])){
    $IL   =  Filtrele(ucfirst($_REQUEST["il"]));
}else{
    $IL   = "";
}

if(isset($_REQUEST["ilce"])){
    $ILCE   =  Filtrele(ucfirst($_REQUEST["ilce"]));
}else{
    $ILCE   = "";
}

if(isset($_REQUEST["aciklama"])){
    $ACIKLAMA   =  Filtrele(ucfirst($_REQUEST["aciklama"]));
}else{
    $ACIKLAMA   = "";
}


if($BASLIK != "" && $BASLAMATARIHI != "" && $BITISTARIH != "" && $IL != "" && $ILCE != "" && $ACIKLAMA != ""){
    echo"burada";
    $yukleKlasor=   "../images/proje";
    $tmp_name   =   $_FILES['myFile']['tmp_name'];
    $name       =   $_FILES['myFile']['name'];
    $boyut      =   $_FILES['myFile']['size'];
    $tip        =   $_FILES['myFile']['type'];
    $uzanti     =   substr($name, -5, 5);
    
    $randomad   =   fileNameGeneraTe(45); 
    $resimAd  =   $randomad . $uzanti;
    
    move_uploaded_file($tmp_name, $yukleKlasor."/".$resimAd);
    $EKLEMESORGUSU		=	$VeritabaniBaglantisi->exec("INSERT INTO projeler (baslik , baslamaTarih, bitisTarih, il, ilçe, aciklama, projeimg1) values ('$BASLIK', '$BASLAMATARIHI', '$BITISTARIH', '$IL', '$ILCE', '$ACIKLAMA', '$resimAd' )");
    if($EKLEMESORGUSU){
        header("Location: ../screen/admin/projeler.php");
    }
}else{
    echo "gelmedi";
}

?>
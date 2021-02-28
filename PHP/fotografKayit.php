<?php
session_start();
$UserID = $_SESSION["id"];
if($UserID != ""){
    require("gereksinimler.php");
    echo "geldi";

    if(isset($_REQUEST["fotoAciklama"])){
        echo $fotoAciklama   =   $_REQUEST["fotoAciklama"];
        if(isset($_FILES['myFile'])){
            
            $yukleKlasor=   "../images/photo";
            $tmp_name   =   $_FILES['myFile']['tmp_name'];
            $name       =   $_FILES['myFile']['name'];
            $boyut      =   $_FILES['myFile']['size'];
            $tip        =   $_FILES['myFile']['type'];
            $uzanti     =   substr($name, -5, 5);
            
            $randomad   =   fileNameGeneraTe(45); 
            echo $resimAd  =   $randomad . $uzanti;
            
            
            move_uploaded_file($tmp_name, $yukleKlasor."/".$resimAd);
            $EKLEMESORGUSU		=	$VeritabaniBaglantisi->exec("INSERT INTO fotograflar (fotoAciklama , IMG) values ('$fotoAciklama', '$resimAd')");
            if($EKLEMESORGUSU){
               echo "başarılı";
            }
        }else{
            echo "KApak FOTO ile ilgili güncelleme Yok";
        }
    }

    
}
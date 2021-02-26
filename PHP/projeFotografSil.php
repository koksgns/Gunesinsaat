<?php
session_start();
$UserID = $_SESSION["id"];
if($UserID != ""){
    require("gereksinimler.php");
    if(isset($_REQUEST["KID"])){
        $KID   =  $_REQUEST["KID"];
        $IMG   =  $_REQUEST["IMG"];


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
           echo $projeFotolari  =   $SORGULAR2["projeFotolari"];
            
        }   
			
        $FotograflarDizi = explode(",", $projeFotolari);
        echo "<pre>";
		print_r($FotograflarDizi) ;
        echo "</pre>";
        if(in_array($IMG, $FotograflarDizi)){
            $araSil = array_search($IMG ,$FotograflarDizi);
            unset($FotograflarDizi[$araSil]);
            $YeniDiziKayit   =   implode(",", $FotograflarDizi);
        }

        $dosya = "../images/proje/".$IMG;
        if(file_exists($dosya)){
            unlink($dosya);

            $UyeGuncellemeSorgusu2		=	$VeritabaniBaglantisi->prepare("UPDATE projeler SET projeFotolari = '$YeniDiziKayit' WHERE id = '$KID'");
            $UyeGuncellemeSorgusu2->execute();
            $Kontrol2		=	$UyeGuncellemeSorgusu2->rowCount();
            if($Kontrol2>0){
                echo "sildi";
            }else{
                echo "aciklama  ile ilgili güncelleme Yokkkk";
                $basari = false;
            }
        }

    }
}
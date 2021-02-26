<?php
session_start();
$UserID = $_SESSION["id"];
if($UserID != ""){
    require("gereksinimler.php");
    echo "geldi";
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
            $projeFotolari  =   $SORGULAR2["projeFotolari"];
            
        }   
        if(isset($_FILES['myFile'])){
			
			
				
				$yukleKlasor=   "../images/proje";
				$tmp_name   =   $_FILES['myFile']['tmp_name'];
				$name       =   $_FILES['myFile']['name'];
				$boyut      =   $_FILES['myFile']['size'];
				$tip        =   $_FILES['myFile']['type'];
				$uzanti     =   substr($name, -5, 5);
				
				$randomad   =   fileNameGeneraTe(45); 
				$resimAd  =   $randomad . $uzanti;
				
				move_uploaded_file($tmp_name, $yukleKlasor."/".$resimAd);
                $kayitSon=  $projeFotolari.$resimAd.",";
				
				$UyeGuncellemeSorgusu2		=	$VeritabaniBaglantisi->prepare("UPDATE projeler SET projeFotolari = '$kayitSon' WHERE id = '$KID'");
				$UyeGuncellemeSorgusu2->execute();
				$Kontrol2		=	$UyeGuncellemeSorgusu2->rowCount();
				if($Kontrol2>0){
					echo '<img src="../images/proje/'.$resimAd.'" alt="logo" class="m-auto" >';
				}else{
					echo "aciklama  ile ilgili güncelleme Yokkkk";
					$basari = false;
				}

			
		}else{
			echo "KApak FOTO ile ilgili güncelleme Yok";
		}

    }
}
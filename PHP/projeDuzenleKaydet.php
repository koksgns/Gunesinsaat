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
            
            $Kimage  =   $SORGULAR2["projeimg1"];
            $Kbaslik  =   $SORGULAR2["baslik"];
            $KbaslamaTarih  =   $SORGULAR2["baslamaTarih"];
            $KbitisTarih  =   $SORGULAR2["bitisTarih"];
            $Kil  =   $SORGULAR2["il"];
            $Kilce  =   $SORGULAR2["ilçe"];
            $Kaciklama  =   $SORGULAR2["aciklama"];
            
            
        }   
        $basari = true;


        if(isset($_REQUEST['baslik'])){
			$baslik =  Filtrele(ucwords($_REQUEST['baslik']));

			if($Kbaslik != $baslik){
				$UyeGuncellemeSorgusu2		=	$VeritabaniBaglantisi->prepare("UPDATE projeler SET baslik = '$baslik' WHERE id = '$KID'");
				$UyeGuncellemeSorgusu2->execute();
				$Kontrol2		=	$UyeGuncellemeSorgusu2->rowCount();
				if($Kontrol2>0){
					echo "baslik  başaraılı";
				}else{
					echo "baslik  ile ilgili güncelleme Yokkkk";
					$basari = false;
				}
			}else{
				echo "eskisi aynı" ;
			}
		}else{
			echo "baslik  ile ilgili güncelleme Yok";
		}

        echo "<br>";
        if(isset($_REQUEST['baslamaTarih'])){
			$baslamaTarih =  Filtrele($_REQUEST['baslamaTarih']);

			if($KbaslamaTarih != $baslamaTarih){
				$UyeGuncellemeSorgusu2		=	$VeritabaniBaglantisi->prepare("UPDATE projeler SET baslamaTarih = '$baslamaTarih' WHERE id = '$KID'");
				$UyeGuncellemeSorgusu2->execute();
				$Kontrol2		=	$UyeGuncellemeSorgusu2->rowCount();
				if($Kontrol2>0){
					echo "baslamaTarih  başaraılı";
				}else{
					echo "baslamaTarih  ile ilgili güncelleme Yokkkk";
					$basari = false;
				}
			}else{
				echo "eskisi aynı" ;
			}
		}else{
			echo "baslamaTarih  ile ilgili güncelleme Yok";
		}

        echo "<br>";

        if(isset($_REQUEST['bitisTarih'])){
			$bitisTarih =  Filtrele($_REQUEST['bitisTarih']);

			if($KbitisTarih != $bitisTarih){
				$UyeGuncellemeSorgusu2		=	$VeritabaniBaglantisi->prepare("UPDATE projeler SET bitisTarih = '$bitisTarih' WHERE id = '$KID'");
				$UyeGuncellemeSorgusu2->execute();
				$Kontrol2		=	$UyeGuncellemeSorgusu2->rowCount();
				if($Kontrol2>0){
					echo "bitisTarih  başaraılı";
				}else{
					echo "bitisTarih  ile ilgili güncelleme Yokkkk";
					$basari = false;
				}
			}else{
				echo "eskisi aynı" ;
			}
		}else{
			echo "bitisTarih  ile ilgili güncelleme Yok";
		}
        
        echo "<br>";
        if(isset($_REQUEST['il'])){
			$il =  Filtrele(ucfirst($_REQUEST['il']));

			if($Kil != $il){
				$UyeGuncellemeSorgusu2		=	$VeritabaniBaglantisi->prepare("UPDATE projeler SET il = '$il' WHERE id = '$KID'");
				$UyeGuncellemeSorgusu2->execute();
				$Kontrol2		=	$UyeGuncellemeSorgusu2->rowCount();
				if($Kontrol2>0){
					echo "il  başaraılı";
				}else{
					echo "il  ile ilgili güncelleme Yokkkk";
					$basari = false;
				}
			}else{
				echo "eskisi aynı" ;
			}
		}else{
			echo "il  ile ilgili güncelleme Yok";
		}

        echo "<br>";
        if(isset($_REQUEST['ilce'])){
			$ilce =  Filtrele(ucfirst($_REQUEST['ilce']));

			if($Kilce != $ilce){
				$UyeGuncellemeSorgusu2		=	$VeritabaniBaglantisi->prepare("UPDATE projeler SET ilçe = '$ilce' WHERE id = '$KID'");
				$UyeGuncellemeSorgusu2->execute();
				$Kontrol2		=	$UyeGuncellemeSorgusu2->rowCount();
				if($Kontrol2>0){
					echo "ilce  başaraılı";
				}else{
					echo "ilce  ile ilgili güncelleme Yokkkk";
					$basari = false;
				}
			}else{
				echo "eskisi aynı" ;
			}
		}else{
			echo "ilce  ile ilgili güncelleme Yok";
		}
echo "<br>";
        if(isset($_REQUEST['aciklama'])){
			$aciklama =  Filtrele(ucfirst($_REQUEST['aciklama']));

			if($Kaciklama != $aciklama){
				$UyeGuncellemeSorgusu2		=	$VeritabaniBaglantisi->prepare("UPDATE projeler SET aciklama = '$aciklama' WHERE id = '$KID'");
				$UyeGuncellemeSorgusu2->execute();
				$Kontrol2		=	$UyeGuncellemeSorgusu2->rowCount();
				if($Kontrol2>0){
					echo "aciklama  başaraılı";
				}else{
					echo "aciklama  ile ilgili güncelleme Yokkkk";
					$basari = false;
				}
			}else{
				echo "eskisi aynı" ;
			}
		}else{
			echo "aciklama  ile ilgili güncelleme Yok";
		}


		echo "<br>";


		if(isset($_FILES['myFile'])){
			echo $Kimage;
			$dosya = "../images/proje/".$Kimage;
			if(file_exists($dosya)){
				echo '<img src="'.$dosya.'" alt="logo" class="m-auto" >';
				unlink($dosya);
				
				echo "Belirlenen dosya silindi.";
				$yukleKlasor=   "../images/proje";
				$tmp_name   =   $_FILES['myFile']['tmp_name'];
				$name       =   $_FILES['myFile']['name'];
				$boyut      =   $_FILES['myFile']['size'];
				$tip        =   $_FILES['myFile']['type'];
				$uzanti     =   substr($name, -5, 5);
				
				$randomad   =   fileNameGeneraTe(45); 
				$resimAd  =   $randomad . $uzanti;
				
				move_uploaded_file($tmp_name, $yukleKlasor."/".$resimAd);
				
				$UyeGuncellemeSorgusu2		=	$VeritabaniBaglantisi->prepare("UPDATE projeler SET projeimg1 = '$resimAd' WHERE id = '$KID'");
				$UyeGuncellemeSorgusu2->execute();
				$Kontrol2		=	$UyeGuncellemeSorgusu2->rowCount();
				if($Kontrol2>0){
					echo "aciklama  başaraılı";
					echo '<img src="../images/proje/'.$resimAd.'" alt="logo" class="m-auto" >';
				}else{
					echo "aciklama  ile ilgili güncelleme Yokkkk";
					$basari = false;
				}
			}else{
				$basari = false;
				echo "Belirlenen dosya bu dizinde değildir.";
			}   

			
		}else{
			echo "KApak FOTO ile ilgili güncelleme Yok";
		}

        if($basari){
            header("Location: ../screen/admin/projeyiDuzenle.php?KID=$KID");
        }else{
            header("Location: ../screen/admin/projeler.php");
        }

    }

}else{
    header("Location:../");
}
?>
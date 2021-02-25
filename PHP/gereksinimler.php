<?php
try{
	$VeritabaniBaglantisi	=	new PDO("mysql:host=localhost;dbname=gunesinsaat;charset=UTF8", "root", "");
}catch(PDOException $Hata){
	echo "Bağlantı Hatası<br />" . $Hata->getMessage(); // Bu alanı kapatın çünkü site hata yaparsa kullanıcılar hata değerini görmesin.
	die();
}  
//print_r($VeritabaniBaglantisi);

function Filtrele($Deger){
    $Bir	=	trim($Deger);
    $Iki	=	strip_tags($Bir);
    $Uc		=	htmlspecialchars($Iki, ENT_QUOTES);
    $Sonuc	=	$Uc;
    return $Sonuc;
}
function fileNameGeneraTe($uzunluk){
    return substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ012345679"), 0,$uzunluk);
}


?>
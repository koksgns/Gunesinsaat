<?php
if(isset($_POST["Pass"]) && isset($_POST["User"])){
    
    require("gereksinimler.php");
    $USER   =   Filtrele(ucwords($_POST["User"]));
    $PASS   =   Filtrele(ucwords($_POST["Pass"]));


   $SORGU		=	$VeritabaniBaglantisi->prepare("SELECT * FROM  users WHERE username = '$USER' OR email = '$USER' "); 
   $SORGU->execute();
   $SORGUSAYISI		=	$SORGU->rowCount();
   $SORGULAR	=	$SORGU->fetch(PDO::FETCH_ASSOC);
   if($SORGUSAYISI>0){
       $Parola = $SORGULAR["password"];
       if($PASS == $Parola){
           header("Location: ../home.php");
       }else{
           echo "Pass Error";
       }
   }else{
       echo"yok";
   }
    $VeritabaniBaglantisi   = null;
}else{
    header("Location:../");
}
?>
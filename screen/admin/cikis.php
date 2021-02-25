<?php

    session_start();
    
    unset($_SESSION["id"]);
    echo "Çıkış yapıldı";
 
   
  header("Location:index.php"); 
  
    

?>

<a href="index.php"> Anasayfa </a>


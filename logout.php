<?php   
 // Se deconnecter du site web 
 session_start();  
 session_destroy();  
 header("location:login.php");  
 ?>  
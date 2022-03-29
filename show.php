<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" href="css.css">
      <title> Catalogue des images </title>
   </head>
   <body id="body">
	<center>
<br>
<div id="div">  
	   <?php echo '<br /><br /><a href="logout.php" title="Déconnectez-vous" class="dec">Deconnexion</a>';  ?>
       <?php echo '<br /><br /><a href="LireRecursDir.php" title="Page d\'acceuil" class="dec">Retour </a>';  ?>
       <center><h2> Catalogue image  </h2><center>
</div>
<br><br>
<?php echo " DEBUT DU PROCESSUS : ", date ("h:i:s"); ?>
	<br></center>
<?php

include("instruction.php");
// Affichage des images à partir de la bdd
echo "<center><table border='1' cellpadding='10' cellspacing='3'>";
echo "<thead id='thead'> <tr> <th colspan='$elementsPerPage'+1> Les images </th> </tr>";
echo "<tbody><tr>";
foreach ($images as $image){
	echo "<td>";
	$imgs = $image['path'];
	$id = $image['id'];
	echo "<a href='instruction.php?id= $id' title='Suppression' class='button'> X </a><br>";
	echo nl2br("   <strong> - Chemin :	</strong>" .$image['path']);
	echo nl2br("\n <strong>  - Type :	</strong>" .$image['type']);
	echo nl2br("\n <strong>  - Taille :	</strong>" .$image['size']. "Ko");
	echo nl2br("\n\n  <center> <div class=zoom> <div class=image><img src='$imgs' alt='image bdd' width='250' height='200'></div> </div> </center> \n");
	echo "</td>";	
}
echo "</tr></tbody>";
?>

</table>

<?php echo "FIN DU PROCESSUS : ", date ("h:i:s"); ?>
<br><br><br>

<footer id="footer">
      <?php   
	  	include("pdo.php");        
         // la boucle pour afficher les elements page par page    
         for($i=1; $i<=$pagesCount; $i++)
               echo "<a href='?page=$i'>  $i  </a>&nbsp &nbsp";         
      ?>       
</body>
</html>

<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" href="css.css">
      <title> Catalogue des images </title>
   </head>
   <body id="body">
   <?php
      include ("transfert.php");
      if ( isset($_FILES['file'])){
             transfert();
      }                 
   ?>
   <div id="div">  
	   <?php echo '<br /><br /><a href="logout.php" title="Déconnectez-vous" class="dec">Deconnexion</a>';  ?>
      <h1> Envoyer une image  </h1>
      <form enctype="multipart/form-data" action="#" method="post">
         <input type="hidden" name="MAX_FILE_SIZE" value="250000" />
         <input type="file" name="file" size=1000/>
         <input type="submit" value="Envoyer" />
         <br><br>
      </form>
	</div>

<?php

// Fixer le temps maximum d'exécution à 500 secondes
set_time_limit (500);
$path= "docs";

// Fonction explorerDir permet d'explorer les dossiers et les sous-dossiers
explorerDir($path, $level=0);

function explorerDir($path, $level=0){
	// la variable folder va contenir un pointeur sur le dossier path qu'on a ouvert avec opendir()
	$folder = opendir($path);
	// la boucle tourne tant qu'on trouve un fichier dans le dossier
	while($entree = readdir($folder)){

		// On exclu les arguments . & .. pour éviter que notre script change de dossier
		if($entree != "." && $entree != ".."){
			// vérifier que le dossier est un répertoire grace à la fonction is_dir()
			if(is_dir($path."/".$entree)){	
				// On enregistre le path dans une autre variable sav_path
				$sav_path = $path;
				// on affecte "/".$entree a la valeur de path ce qui nous donne $path = $path. "/" .$entree
				$path .= "/".$entree;
				//	On rappelle la fonction explorerDir sur notre nouveau chemin $path		
				explorerDir($path, $level+1);
				// On retourne a notre $path de base avant l'affectation
				$path = $sav_path;
			}
		else{
			// Dans cette partie on va afficher tout les elements dans path_source (seulement les images dans notre cas)
			$path_source = $path."/".$entree;	
			if (substr($path_source, -3) == "gif" ||
			substr($path_source, -3) == "jpg" ||
			substr($path_source, -3) == "png" ||
			substr($path_source, -4) == "jpeg" ||
			substr($path_source, -3) == "PNG" ||
			substr($path_source, -3) == "GIF" ||
			substr($path_source, -3) == "JPG")
			{ 
				?> 
				<?php
				// Enregistrer le chemin, la taille et le type de l'images dans la base de données
				include("pdo.php");
				$info_image = @getImageSize($path_source);
				$size_image = $info_image[0] * $info_image[1];
				$type_image = $info_image[2];
				switch ($type_image) {
					case 1:
						$type_image = 'GIF';
						break;
						case 2:
						$type_image = 'JPG';
						break;
						case 3:
						$type_image = 'PNG';
						break;
						}
						
				$querryExist = "SELECT count(*) FROM website WHERE path = '$path_source'";
				$count = $mysqlClient->prepare($querryExist); 
				$count->execute([$path]); 	
				$imagesCount = $count->fetchColumn();

				if($imagesCount < 1){			
					$querry = "INSERT INTO `website` (`path`, `size`, `type`) VALUES ('$path_source', '$size_image', '$type_image');";   					
					$imageInsert = $mysqlClient->prepare($querry);
					$inserted = $imageInsert->execute();
				}

			}
		}
	}
}
closedir($folder);
}
echo '<br><br><br><center><a href="show.php" title="Cliquez pour accèder à l\'arborescence" class="show">Afficher l\'arborescence du répértoire </a><center>'; 

?>

</body>
</html>
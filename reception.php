<?php	
	
		$_FILES['mon_fichier']['name'];     //Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_icone.png).
		$_FILES['mon_fichier']['type'];     //Le type du fichier. Par exemple, cela peut être « image/png ».
		$_FILES['mon_fichier']['size'];     //La taille du fichier en octets.
		$_FILES['mon_fichier']['tmp_name']; //L'adresse vers le fichier uploadé dans le répertoire temporaire.
		$_FILES['mon_fichier']['error'];    //Le code d'erreur, qui permet de savoir si le fichier a bien été uploadé.
	
		if ($_FILES['mon_fichier']['error'] > 0) $erreur = "Erreur lors du transfert";
	
		//mkdir('images', 0777, true);
	
		$extensions_valides = array( 'jpg' , 'jpeg');
		//1. strrchr renvoie l'extension avec le point (« . »).
		//2. substr(chaine,1) ignore le premier caractère de chaine.
		//3. strtolower met l'extension en minuscules.
		$extension_upload = strtolower(  substr(  strrchr($_FILES['mon_fichier']['name'], '.')  ,1)  );

		if ( in_array($extension_upload,$extensions_valides) )
		{
			//$nom = "images/{$_FILES['mon_fichier']['name']}.{$extension_upload}";
			$nom = "images/{$_FILES['mon_fichier']['name']}";
			$resultat = move_uploaded_file($_FILES['mon_fichier']['tmp_name'],$nom);
			if ($resultat) echo "Transfert r&eacute;ussi";
		}
		else
		{
			echo "Le fichier doit etre un JPEG ou JPG";
		}


?>

<html>
	<head>
		<title>/tmp/lab</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	  
		<link rel="shortcut icon" type="image/png" href="icone.png" height="48" width="48"/>
	</head>
</html>

<?php	
	
		$name = $_FILES['mon_fichier']['name'];     //Le nom original du fichier, comme sur le disque du visiteur (exemple : mon_icone.png).
		$type = $_FILES['mon_fichier']['type'];     //Le type du fichier. Par exemple, cela peut être « image/png ».
		$size = $_FILES['mon_fichier']['size'];     //La taille du fichier en octets.
		$tmp_name = $_FILES['mon_fichier']['tmp_name']; //L'adresse vers le fichier uploadé dans le répertoire temporaire.
		$error = $_FILES['mon_fichier']['error'];    //Le code d'erreur, qui permet de savoir si le fichier a bien été uploadé.
	
                // Checks for errors
		if ($error > 0){
                    die("Erreur lors du transfert : $error");
                }
	
                // gets image mime type
                $mime = mime_content_type($tmp_name);
                
                // Checks the mime type is image/something
                if( !preg_match("|^image/.*$|", $mime)){
                    // Dies if invalid
                    // @todo : log ?
                die("Type de fichier invalide : $mime");
                }
                
                // cleans original file name 
                $nom = preg_replace(array("/[ !%:]/"), "-", $name);
                
                // Moves the uploaded file
                $resultat = move_uploaded_file($_FILES['mon_fichier']['tmp_name'],__DIR__."/images/".$nom);
                if ($resultat) {
                    header("Location:/");
                    echo "Transfert r&eacute;ussi";
                }else{
                    die( "Echec lors du déplacement du fichier");
                }
?>

<html>
	<head>
		<title>/tmp/lab</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	  
		<link rel="shortcut icon" type="image/png" href="icone.png" height="48" width="48"/>
	</head>
</html>

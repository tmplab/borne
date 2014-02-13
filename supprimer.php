<?php

		$image_à_supprimer = $_POST['image'];
	
		$ouverture = opendir("images");
		// Maintenant que le répertoire est ouvert, on le lit :
		$lecture = readdir($ouverture);
	
		if((unlink($image_à_supprimer))==TRUE) // On efface.
			echo 'Image supprim&eacute;e';
	
		closedir($ouverture); // On n'oublie pas de fermer ce qu'on a ouvert.
	

?>

<html>
	<head>
		<title>/tmp/lab</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	  
		<link rel="shortcut icon" type="image/png" href="icone.png" height="48" width="48"/>
	</head>
</html>


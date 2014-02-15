<?php

$includeList    = array("config.php","auth.php");
foreach ($includeList as $file) {
    if( !is_file($file)){
        die("Missing file: $file" );
    }
    if( !is_readable($file)){
        die("File not readable: $file");
    }
    require_once $file;
}

?><?php

    $image = basename($_POST['image']);

    // Maintenant que le répertoire est ouvert, on le lit :
    $lecture = readdir($ouverture);

    if((unlink("images/$image"))==TRUE) {
    // On efface.
    }
    header("Location:/ajout.php");

            echo 'Image supprim&eacute;e';



?>

<html>
	<head>
		<title>/tmp/lab</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	  
		<link rel="shortcut icon" type="image/png" href="icone.png" height="48" width="48"/>
	</head>
</html>


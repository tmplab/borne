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

?>
<html>
    <head>
            <title>/tmp/lab</title>	
            <META HTTP-EQUIV="Refresh" CONTENT="181; URL=ajout.php" />  
            <META HTTP-EQUIV="Refresh" CONTENT="181; URL=ajout.php" />
            <link rel="shortcut icon" type="image/png" href="icone.png" height="48" width="48"/>
    </head>

<body>
        <?php
            if((file_exists("images")) == FALSE){
                    mkdir('images', 0777, true);
            }
        ?>

        <img src="logolab.png" align=center/>

        <form method="post" action="reception.php" enctype="multipart/form-data">
                <h1><label for="mon_fichier">Ajouter un Fichier JPG ou JPEG :</label></h1>
                <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
                <input type="file" name="mon_fichier" id="mon_fichier" /><br />
                <input type="submit" name="submit" value="Envoyer" />
        </form>

        <h1>Liste des images diffus&eacute;es:</h1>
        <?php		

            $dossier_traite = "images";

            $repertoire = opendir($dossier_traite); // On définit le répertoire dans lequel on souhaite travailler.
            $tab_fichier=array();

            while (false !== ($fichier = readdir($repertoire))) // On lit chaque fichier du répertoire dans la boucle.
            {
                $chemin = $dossier_traite."/".$fichier; // On définit le chemin du fichier à effacer.
                if(!preg_match( "/image\/.*/", mime_content_type($chemin))){
                    continue;
                }
                $tab_fichier[]=$fichier;

            }
            closedir($repertoire);

            sort($tab_fichier);

            foreach($tab_fichier as $images)
            {
                    echo '<a href='.$dossier_traite.'/'.$images.'><img src='.$dossier_traite.'/'.$images.' width="100px" height="100px"></a><form action="supprimer.php" method="post">
                            <input type="hidden" name="image" value='.$dossier_traite.'/'.$images.'>
                            <input type="submit" value="Supprimer" />
                            </form>';	
            }
        ?>
    </body>
</html>


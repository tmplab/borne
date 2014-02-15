<html>
	<head>
		<title>/tmp/lab</title>
		<link rel="shortcut icon" type="image/png" href="icone.png" height="48" width="48"/>
	
		<script src="prototype.js" type="text/javascript"></script>
		<script type="text/javascript" src="effects.js"></script>
		
		<style>
			img{
			width: 1280px;
			height: 720px;
			}
		</style>
		
		
		
	</head>
	<body style="margin: 0; padding: 0; border: 0; background:#000; overflow:hidden; cursor:none; min-height:1000; min-widht:1000;">
		<div id="wrapped" style="margin: 0; padding: 0; border: 0; background:#000; overflow:hidden; cursor:none; min-height:1000; min-widht:1000;text-align: center;" width="1000" height="1000">
			
			<!--<div class='slide' id='slide1'><img src='images/1.jpg'></div>
			<div class='slide' id='slide2' style='display: none;'><img src='images/2.jpg'></div>
			<div class='slide' id='slide3' style='display: none;'><img src='images/3.jpg'></div>-->
			
			<?php
				$dossier_traite = "images";
				$cpt = 0;
	  
				$repertoire = opendir($dossier_traite); // On définit le répertoire dans lequel on souhaite travailler.

			while (false !== ($fichier = readdir($repertoire))) // On lit chaque fichier du répertoire dans la boucle.
			{

                            $chemin = $dossier_traite."/".$fichier; // On définit le chemin du fichier à effacer.
			  
			// Si le fichier n'est pas un répertoire…
			if ($fichier != ".." AND $fichier != "." AND $fichier != ".gitignore" AND !is_dir($fichier))
				   {
					$tab_fichier[]=$fichier;
				   }
				   
			}
			closedir($repertoire);
							
			sort($tab_fichier);

			

			foreach($tab_fichier as $images)
			{
				$cpt=$cpt+1;
						
				if($cpt==1)
				{
					echo '<div class="slide" id="slide'.$cpt.'"><img src='.$dossier_traite.'/'.$images.'></div>';
				}
			
				else
				{
					echo '<div class="slide" id="slide'.$cpt.'" style="display: none;"><img src='.$dossier_traite.'/'.$images.'></div>';
				}
			}
			
			?>

			
		</div>
		
		<script type="text/javascript">	
		var n = '<?php echo $cpt; ?>'
		
			start_slideshow(1, n, 20000);
			var new_x = $("wrapped").offsetLeft;
			
			function start_slideshow(start_frame, end_frame, delay) {
				setTimeout(switch_slides(start_frame,start_frame,end_frame, delay), delay);
			}
			
			function switch_slides(frame, start_frame, end_frame, delay) {
				return (function() {
					
					if (frame == end_frame) 
					{ 
						next = start_frame;
						
					} 
					else 
					{ 
						next = frame+1;
					}
					
					new Effect.Fade($('slide' + frame),{
						duration: 0,
						afterFinish: function(){
							new Effect.Appear('slide'+ next,{duration: 0});
						}
					})
					
					setTimeout(switch_slides(next, start_frame, end_frame, delay), delay + 850);
				})
				
				
			}
			
		</script>
	</body>
</html>


<?php
require("head.php");
?>
	<body>
		
<?php
		if((isset($_POST["input"]) && (isset($_POST["output"]) && isset($_POST["format"]) ){
			$nomDestination=$_POST["output"];
			$output=$_POST["output"];
			$format=$_POST["form"];
			$cmd1="cd /var/www/html/projtOuya/upload && ffmpeg -i $nomDestination $output.$format ";
			exec($cmd1);
			$cmd2="cd /var/www/html/projtOuya/upload && chmod 777 $output.$format ";
			exec($cmd2);
			$cmd="cd /var/www/html/projtOuya/upload && mv $output.$format /var/www/html/projetOuya/converti/ ";
			exec($cmd);   
		?>
	<center><h1>Conversion terminée!</h1>
	<a href="conversion.php">Cliquer ici pour récuréper la vidéo convertie</a><br/>
	<a href="videotovideo.php">Cliquer ici pour convertir une autre vidéo</a><br/>
	<a href="index.php">Retourner dans le site</a><br/>
	<center>  
    <?php
    } 
    
    else 
    {
        echo "Le fichier n'a pas été converti.Veuillez rempir les champs correctement";
    }
}
?>
</body>
</html>
















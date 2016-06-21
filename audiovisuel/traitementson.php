<?php
require("head.php");
?>
	<body>

<?php

if (isset($_POST["video"]) && isset($_POST["son"]) && isset($_POST["form"]) ){
$video=$_POST["video"];
$son=$_POST["son"];
$form=$_POST["form"];
$cmd3="cd /rep/ && ffmpeg -i $video -vn -f $form $son.$form ";
exec($cmd3);
$cmd4="cd /rep/ && chmod 777 $son.$form ";
exec($cmd4);
$cmd5="cd /rep/ && mv $son.$form /var/www/audiovisuel/converti/ ";
exec($cmd5);
}
?>
<center><h1>Conversion terminée!</h1>
<a href="conversion.php">Cliquer ici pour récuréper le fichier son converti</a><br/>
<a href="videotoson.php">Cliquer ici pour convertir une autre vidéo en son</a><br/>
<a href="../wordpress">Retourner dans le site</a><br/>
<center>


</body>
</html>

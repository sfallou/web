<?php
require("head.php");
?>
	<body>
<?php
if(isset($_POST["input"]) && isset($_POST["output"]) && isset($_POST["format"]) ){
$input=$_POST["input"];
$output=$_POST["output"];
$format=$_POST["format"];
$cmd1="cd /rep/ && ffmpeg -i $input $output.$format ";
exec($cmd1);
$cmd2="cd /rep/ && chmod 777 $output.$format ";
exec($cmd2);
}
$cmd="cd /rep/ && mv $output.$format /var/www/audiovisuel/converti/ ";
exec($cmd);
?>
<center><h1>Conversion terminée!</h1>
<a href="conversion.php">Cliquer ici pour récuréper la vidéo convertie</a><br/>
<a href="videotovideo.php">Cliquer ici pour convertir une autre vidéo</a><br/>
<a href="../wordpress">Retourner dans le site</a><br/>
<center>
</body>
</html>

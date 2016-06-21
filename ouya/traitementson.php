<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF8"/>
		<title>Plateforme Audio-Visuelle</title>
	</head>
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
$cmd5="cd /rep/ && mv $son.$form /var/www/html/ouya/ ";
exec($cmd5);
}
?>
<center><h1>Conversion terminée!</h1><center>


</body>
</html>

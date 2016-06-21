<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF8"/>
		<title>Plateforme Audio-Visuelle</title>
	</head>
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
//$cmd="cd /rep/ && mv $output.$format /var/www/audiovisuel/converti/ ";
//exec($cmd);
?>
<center><h1>Conversion terminée!</h1><center>
<a href="/rep">Click here to get it</a>
<?php
}
else if (isset($_POST["video"]) && isset($_POST["son"]) && isset($_POST["form"]) ){
$video=$_POST["video"];
$son=$_POST["son"];
$form=$_POST["form"];
$cmd3="cd /rep/ && ffmpeg -i $video -vn -f $form $son.$form ";
exec($cmd3);
$cmd4="cd /rep/ && chmod 777 $son.$form ";
exec($cmd4);
//$cmd5="cd /rep/ && mv $son.$form /var/www/audiovisuel/converti/ ";
//exec($cmd5);
?>
<center><h1>Conversion terminée!</h1><center>
<a href="/rep">Click here to get it</a>
<?php
}
else
	{
		echo"Alert!! Il faut remplir correctement les champs";
	}

?>
</body>
</html>

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
}
$cmd="cd /rep/ && mv $output.$format /var/www/html/ouya/ ";
exec($cmd);
?>
<center><h1>Conversion terminée!</h1><center>


</body>
</html>

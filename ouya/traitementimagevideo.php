<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF8"/>
		<title>Plateforme Audio-Visuelle</title>
	</head>
	<body>
<?php
if(isset($_POST["input"]) && isset($_POST["formatim"]) && isset($_POST["output"]) && isset($_POST["formatvid"]) && isset($_POST["nbs"])){
        $input=$_POST["input"];
        $formatim=$_POST["formatim"];
        $output=$_POST["output"];
        $formatvid=$_POST["formatvid"];
        $nbs=$_POST["nbs"];
        $cmd1="cd /rep/ && ffmpeg -r $nbs -b 1800 -i $input%d.$formatim $output.$formatvid";
        exec($cmd1);
        $cmd2="cd /rep/ && chmod 777 $output.$formatvid ";
        exec($cmd2);
}
$cmd="cd /rep/ && mv $output*.$format /var/www/html/ouya/ ";
exec($cmd);
?>
<center><h1>Conversion terminée!</h1><center>


</body>
</html

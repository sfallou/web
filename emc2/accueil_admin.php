<?php
session_start();
if (isset($_SESSION['connect']))//On vérifie que le variable existe
{$connect=$_SESSION['connect'];//On récupère la valeur de la variable de session
}
else
{
$connect=0;//Si $_SESSION['connect'] n'existe pas, on donne la valeur "0"
}
if ($connect == "1") // Si le visiteur s'est identifié
{
	$_SESSION['connect']=1;
	$pass=$_SESSION['pass'];
	$login=$_SESSION['login'];
}
?>
<?php
require("head.php");
?>
<body>
<?php
include("haut.php");
require("menu_admin.php");
include("text_accueil.php");
?>
</body>
</html>

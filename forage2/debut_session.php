<?php
session_start();
if (isset($_SESSION['connect']))//On v�rifie que le variable existe
{$connect=$_SESSION['connect'];//On r�cup�re la valeur de la variable de session
}
else
{
$connect=0;//Si $_SESSION['connect'] n'existe pas, on donne la valeur "0"
}
if ($connect == "1") // Si le visiteur s'est identifi�
{// On affiche la page cach�e
?>
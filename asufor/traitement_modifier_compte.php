<?php
require("head.php");

$profil=$_POST['profil'];
$pass1=$_POST['pass1'];
$pass2=$_POST['pass2'];
$pass3=$_POST['pass3'];

$sql = "select * from compte where profil='$profil'";
	$req = mysql_query($sql) or die('error');
	if($data = mysql_fetch_array($req))
	{
		$pass_actuel=$data['mdp'];
	}
if($pass1==$pass_actuel AND $pass2==$pass3)
{
$requete=mysql_query("UPDATE compte SET mdp='$pass2' WHERE profil='$profil' ");
?>
<script language="JavaScript">
	alert("Les paramètres du compte ont été modifiés avec succès!!");
	window.location.replace("modifier_compte.php");// On inclut le formulaire d'identification
	</script>
<?php
}
else
{
?>
<script language="JavaScript">
	alert("Echec de la modification! Merci de recommencer");
	window.location.replace("modifier_compte.php");// On inclut le formulaire d'identification
	</script>
<?php
}
?>
<?php
require("head.php");
require('connexion.php');

$profil=$_POST['profil'];
$pass1=$_POST['pass1'];
$pass2=$_POST['pass2'];
$pass3=$_POST['pass3'];

$req = $bdd->prepare("select * from compte where profil= :profil");
$req->execute(array( ':profil' => $profil)); 
	if($data = $req->fetch() )
	{
		$pass_actuel=$data['mdp'];
	}
if($pass1==$pass_actuel AND $pass2==$pass3)
{
$requete=$bdd->prepare("UPDATE compte SET mdp='$pass2' WHERE profil= :profil ");
$requete->execute(array( ':profil'=>$profil ));

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
<?php
require("session_init.php");
if(isset($_POST) && !empty($_POST['admin']) && !empty($_POST['password']) ) {
	extract($_POST);
	$pass=$_POST['password'];
	$login=$_POST['admin'];
	if ($pass =="emc2@group" AND $login =="admin") {
	$_SESSION['connect']=1; // Change la valeur de la variable connect. C'est elle qui nous permettra de savoir s'il y a eu identification.
    $_SESSION['login']=$login;// Permet de récupérer les information afin de personnaliser la navigation.
    $_SESSION['pass']=$pass;
    // On affiche la page cachée.
	header("Location: accueil_admin.php");
	}
	else
	{
	?>
	<script language="JavaScript">
	alert("Le login ou le mot de passe que vous avez saisie est erroné. Merci de recommencer");
	window.location.replace("index_admin.php");// On inclut le formulaire d'identification
	</script>
	<?php
	//Une fenêtre d'alerte s'affiche lorsque le login ou le mot de passe est invalide et renvoit vers la page pour se connecter
	}

}
else {
	?>
	<script language="JavaScript">
	alert("Vous avez oublié de remplir un champ. Merci de recommencer");
	window.location.replace("index.php");
	</script>
	<?php
//Une fenêtre d'alerte s'affiche lorsque le login ou le mot de passe est vide et renvoit vers la page pour se connecter	
}
?>

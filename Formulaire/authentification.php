<?php
session_start();// À placer obligatoirement avant tout code HTML.
$_SESSION['connect']=0; //Initialise la variable 'connect'.

require("connexion.php");
if(isset($_POST) && !empty($_POST['login']) && !empty($_POST['password']) ) {
	$login=$_POST['login'];
	$pass=sha1($_POST['password']);
	$profil=$_POST['statut'];
	// on recupère le password de la table qui correspond au login du visiteur
	$sql = "select * from Users where mdp='$pass' AND login='$login' AND profil='$profil'";
	$req = $bdd->query($sql) or die('error');
	if($data = $req->fetch())
	{
		
		$id=$data[0];
		$login=$data[1];
		$pass=$data[2];
		$nom=$data[3];
		$profil=$data[4];
		$etat=$data[5];
			
	$_SESSION['connect']=1; // Change la valeur de la variable connect. C'est elle qui nous permettra de savoir s'il y a eu identification.
    $_SESSION['login']=$login;// Permet de récupérer les information afin de personnaliser la navigation.
    $_SESSION['pass']=$pass;
    $_SESSION['id']=$id;
    $_SESSION['nom']=$nom;
    $_SESSION['statut']=$profil;
    $_SESSION['etat']=$etat;
    // On affiche la page cachée.
	header("Location: accueil.php");
	}
	else 
	{
		?>
	<script language="JavaScript">
	alert("Le login ou le mot de passe que vous avez saisie est errone. Merci de recommencer");
	window.location.replace("index.php");// On inclut le formulaire d'identification
	</script>
	<?php	
	}	
}
else {
	?>
	<script language="JavaScript">
	alert("Vous avez oublie de remplir un champ. Merci de recommencer");
	window.location.replace("index.php");
	</script>
	<?php
//Une fenêtre d'alerte s'affiche lorsque le login ou le mot de passe est vide et renvoit vers la page pour se connecter	
}
?>

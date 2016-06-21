<?php
session_start();// À placer obligatoirement avant tout code HTML.
$_SESSION['connect']=0; //Initialise la variable 'connect'.

include("connexion_bd.php");
if(isset($_POST) && !empty($_POST['login']) && !empty($_POST['password']) ) {
	$login=$_POST['login'];
	$pass=$_POST['password'];
	// on recupère le password de la table qui correspond au login du visiteur
	$sql = "select * from abonnes where mdp='$pass' AND entreprise='$login'";
	$req = mysql_query($sql) or die('error');
	if($data = mysql_fetch_row($req))
	{
		$pass=$data[3];
		$login=$data[6];
		$id=$data[0];
		$nom=$data[1];
		$prenom=$data[2];
		$telephone=$data[4];
		$email=$data[5];
		
	$_SESSION['connect']=1; // Change la valeur de la variable connect. C'est elle qui nous permettra de savoir s'il y a eu identification.
    $_SESSION['login']=$login;// Permet de récupérer les information afin de personnaliser la navigation.
    $_SESSION['pass']=$pass;
    $_SESSION['id']=$id;
    $_SESSION['nom']=$nom;
    $_SESSION['prenom']=$prenom;
    $_SESSION['telephone']=$telephone;
    $_SESSION['email']=$email;
    // On affiche la page cachée.
	header("Location: accueil2.php");
	}
	else 
	{
		?>
	<script language="JavaScript">
	alert("Le login ou le mot de passe que vous avez saisie est erroné. Merci de recommencer");
	window.location.replace("index.php");// On inclut le formulaire d'identification
	</script>
	<?php	
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

<?php
if(isset($_POST['choix']) AND $_POST['choix']=="user")
		{
			header("Location: index_user.php");
		}
if(isset($_POST['choix']) AND $_POST['choix']=="admin")
		{
			header("Location: index_admin.php");
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

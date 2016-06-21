<?php
 require('head.php');
    require('header.php'); 
    require('classes/utilisateurs.php');

if(isset($_POST['ancien_index']) and !empty($_POST['ancien_index']) and isset($_POST['nouvel_index']) and !empty($_POST['nouvel_index'])){
		$id_compteur=$_POST['id_compteur'];
		$id_abonne=$_POST['id_abonne'];
		$ancien_index=$_POST['ancien_index'];
		$nouvel_index=$_POST['nouvel_index'];
		$date_index=$_POST['date_index'];
		$cpteur=new Compteur($bdd,$id_abonne);
		$cpteur->modifierCompteur($id_compteur,$ancien_index,$nouvel_index,$date_index)
		?>
	<script language="JavaScript">
		alert("Compteur modifie avec succes!!");
		window.location.replace("modifier_index.php");
	</script>
	<?php 
}
else{
	?>
	<script language="JavaScript">
		alert("Echec Modification !!! Veuillez ressayer!!");
		window.location.replace("modifier_index.php");
	</script>
	<?php 
}
?>
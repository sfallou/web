<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Gestion Agenda</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<!--  Copyright 2011, AUTHORS.txt (http://jqueryui.com/about) Dual licensed under the MIT or GPL Version 2 licenses. http://jquery.org/license  http://docs.jquery.com/UI/Datepicker  -->
<!-- traduit et adapté par outils-web.com -->
<!-- chargement des scripts -->	

 <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
 <script Language="javascript" src="verification.js"></script>

    <script type="text/javascript" src="scr/jquery.js"></script>
    <script type="text/javascript" src="scr/jquery.maskedinput.js"></script>	
	
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
 
  <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
 
  <link rel="stylesheet" href="/resources/demos/style.css" />
<script>
$(function() {
$( "#date" ).datepicker();
});
</script>
</head>

<?php
require("connexion_bd.php");
//récupération des variables
$identifiant=$_POST['login'];
$pass=$_POST['password'];
$choix=$_POST['choix'];
$req=mysql_query("select * from abonnes where etat=0 AND entreprise='$identifiant'");  
while($ligne = mysql_fetch_array($req)) 
{
	$id=$ligne['id_abonne'];
	$code=$ligne['mdp'];
	if($code==$pass )
	{
		if($choix=="save_rv")
		{
?>		
<body>
	<?php
		include("haut.php"); 
	?>
	<style>.txt {color: #555555; font-family: verdana; text-align: right; font-size: 12px}</style>
	<!-- Emplacement du formulaire -->
	<form action="traitement_calendrier.php" method="POST">
		<fieldset><legend>Plannifier vos rendez-vous</legend>
		<table border="1" cellpadding="0" cellspacing="5" align="center" width="500" bgcolor="#FFFFFF">
			<tr><td colspan="10" align="center"><label name="date">Date : </label><input type="text" name="date" id="date"/></td></tr>
			<tr><td colspan="10" align="center">Heures</td></tr><br/>
			<tr><td colspan="10" align="center">Matin</td></tr>
			<tr>
				<td>08:00<input type="checkbox" name="options[]" value="08:00"/></td>
				<td>08:30<input type="checkbox" name="options[]" value="08:30"/></td>
				<td>09:00<input type="checkbox" name="options[]" value="09:00"/></td>
				<td>09:30<input type="checkbox" name="options[]" value="09:30"/></td>
				<td>10:00<input type="checkbox" name="options[]" value="10:00"/></td>
				<td>10:30<input type="checkbox" name="options[]" value="10:30"/></td>
				<td>11:00<input type="checkbox" name="options[]" value="11:00"/></td>
				<td>11:30<input type="checkbox" name="options[]" value="11:30"/></td>
				<td>12:00<input type="checkbox" name="options[]" value="12:00"/></td>
				<td>12:30<input type="checkbox" name="options[]" value="12:30"/></td>
			</tr>
			<tr><td colspan="10" align="center">Après Midi</td></tr>
				<td><label name="13h">13:00</label><input type="checkbox" name="options[]" value="13:00"/></td>
				<td><label name="13h30">13:30</label><input type="checkbox" name="options[]" value="13:30"/></td>
				<td><label name="14h">14:00</label><input type="checkbox" name="options[]" value="14:00"/></td>
				<td><label name="14h30">14:30</label><input type="checkbox"  name="options[]" value="14:30"/></td>
				<td><label name="15h">15:00</label><input type="checkbox" name="options[]" value="15:00"/></td>
				<td><label name="15h30">15:30</label><input type="checkbox"  name="options[]" value="15:30"/></td>
				<td><label name="16h">16:00</label><input type="checkbox"  name="options[]" value="16:00"/></td>
				<td><label name="16h30">16:30</label><input type="checkbox"  name="options[]" value="16:30"/></td>
				<td><label name="17h">17:00</label><input type="checkbox"  name="options[]" value="17:00"/></td>
				<td><label name="17h30">17:30</label><input type="checkbox" name="options[]" value="17:30"/></td>
		</table><br/><br/>
		<input type="hidden" name="identifiant" value="<?php echo $id?>">
		<table align="center"><tr><td><input type="submit" value="Enregistrer" onclick="Verification()"/></td> <td><input type="reset" value="Reset" /></td></tr></table>
		</fieldset>
	</form> <br/>
	<?php
		}
		else if($choix=="view_rv")
		{
	?>
	<center><h3>Les Rendez-vous déjà prises</h3>
	<table border="1">
	<tr><th>Date RV</th><th>N°telephone</th></tr>
	<?php
	$req1=mysql_query("select * from agenda where etat=1 AND id_proprietaire='$id'" );
	while($donnee=mysql_fetch_array($req1))
	{
	echo
		'<tr><td>'. htmlspecialchars($donnee['rv']) . '</td>'
		.'<td>'. htmlspecialchars($donnee['telephone']) . '</td></tr>';

	}
	?>
	</table></center>
<!-- Initialisation de la fonction -->		
    <script type="text/javascript">
        $(function() {
            $("#date").mask("9999-99-99");
			$("#hm").mask("99:99",{placeholder:"-"});
        });
    </script>
   
<?php
		}
	}
	
	else echo "Erreur de saisie!!";
}
?>

</body>
</html>

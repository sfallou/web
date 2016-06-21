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
	$id_user=$_SESSION['id'];
	$nom=$_SESSION['nom'];
	$prenom=$_SESSION['prenom'];
	$telephone=$_SESSION['telephone'];
	$email=$_SESSION['email'];
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF8" />
	<title>Gestion Agenda</title>
	<link type="text/css" rel="stylesheet" href="style2.css">
	<link rel="stylesheet" type="text/css" href="engine1/style.css" />
	<script type="text/javascript" src="engine1/jquery.js"></script>
</head>

<?php
require ('connexion_bd.php');
//récupération des variables
$dates=$_GET['dates'];
		//$events = $date->getEvents($dates);
?>		
<body>
	<?php include("haut.php");?>
	<?php
require("menu.php");
	?>
<h3 class="titre">Choisissez les horaires de rendez-vous </h3>
<table  cellpadding="0" cellspacing="2" border="1" style=" background: linear-gradient(#27292c, #bbdeff); border-radius:10px; width:800px; margin-top:60px; margin-left:200px;" >
		<td  valign="top" width="100%" >
			<div class="text"><?php echo"$dates";?></div> 
				<form action="traitement_agenda.php" method="POST" class="formulaire" >
					<table  border="1" cellpadding="0" cellspacing="5" align="center" bgcolor="#FFFFFF">
						<tr><td colspan="5" align="center">Matin</td></tr>
						<tr>
							<td>08:00<input type="checkbox" name="options[]" value="08:00"/><br>
								08:30<input type="checkbox" name="options[]" value="08:30"/><br/>
							<td>09:00<input type="checkbox" name="options[]" value="09:00"/><br/>
								09:30<input type="checkbox" name="options[]" value="09:30"/><br/>
							<td>10:00<input type="checkbox" name="options[]" value="10:00"/><br/>
								10:30<input type="checkbox" name="options[]" value="10:30"/><br/>
							<td>11:00<input type="checkbox" name="options[]" value="11:00"/><br/>
								11:30<input type="checkbox" name="options[]" value="11:30"/><br/>
							<td>12:00<input type="checkbox" name="options[]" value="12:00"/><br/>
								12:30<input type="checkbox" name="options[]" value="12:30"/><br/>
						</tr>
						<tr><td colspan="5" align="center">Apres Midi</td></tr>
							<td><label name="13h">13:00</label><input type="checkbox" name="options[]" value="13:00"/><br/>
								<label name="13h30">13:30</label><input type="checkbox" name="options[]" value="13:30"/><br/>
							<td><label name="14h">14:00</label><input type="checkbox" name="options[]" value="14:00"/><br/>
								<label name="14h30">14:30</label><input type="checkbox"  name="options[]" value="14:30"/><br/>
							<td><label name="15h">15:00</label><input type="checkbox" name="options[]" value="15:00"/><br/>
								<label name="15h30">15:30</label><input type="checkbox"  name="options[]" value="15:30"/><br/>
							<td><label name="16h">16:00</label><input type="checkbox"  name="options[]" value="16:00"/><br/>
								<label name="16h30">16:30</label><input type="checkbox"  name="options[]" value="16:30"/><br/>
							<td><label name="17h">17:00</label><input type="checkbox"  name="options[]" value="17:00"/><br/>
								<label name="17h30">17:30</label><input type="checkbox" name="options[]" value="17:30"/><br/>
					</table><br/><br/>
					<input type="hidden" name="date" value="<?php echo $dates;?>"/><input type="hidden" name="identifiant" value="<?php echo $id_user;?>"/>
					<table align="center"><tr><td><input type="submit" value="Enregistrer" onclick="Verification()"/></td> <td><input type="reset" value="Reset" /></td></tr></table>
				</form> <br/>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td valign="top" width="100%">
						<h3 class="text">Rendez-vous déjà pris</h3>
						<form action="traitement_modification.php" method="POST" class=" formulaire" style=" width:450px;">
			<table border="1" bgcolor="#FFFFFF" width="100%" >
				<tr><th>Date</th><th>Heures</th><th>Numero telephone</th><th>Code</th><th>Annuler</th></tr>
					<?php
					$r="";
					$req = mysql_query("SELECT * FROM agenda2 WHERE etat=1 AND id_proprietaire='$id_user' ORDER BY id DESC LIMIT 0,10");
					while ($donnees = mysql_fetch_array($req))
					{
					$heures=$donnees['heures'];
					$datees=$donnees['rv'];
					$telephone=$donnees['telephone'];
					$code=$donnees['code'];
					$r.= "<tr><td>$datees</td><td>$heures</td><td>$telephone</td><td>$code</td><td><input type='checkbox' name='options[]' value='$datees-$heures-$telephone'/></td></tr>";
					}
					echo "$r";
					?>
			</table>
			<input type="hidden" name="identifiant" value="<?php echo $id_user;?>" />
			<input type='submit' value='Valider'/>
			</form>
					</td>
				</table>
				
</body>
</html>

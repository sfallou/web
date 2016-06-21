<?php
require("head.php");
if ($_SESSION['connect']!=1)
{
?>
<script language="JavaScript">
		alert("Merci de vouloir vous identifier d'abord!!!");
		window.location.replace("index.php");// On inclut le formulaire d'identification
		</script>
<?php
}
?>
	<body>
		<table border="1" width="80%" height="50%" align="center" cellspacing="10">
			<?php require("banniere.php");?>
			<tr>
				<td width="200" height="500" align="center" valign="top" ><div class="profil"><?php echo strtoupper($_SESSION['profil']);?></div><br/> <?php if($_SESSION['profil']=="gerant"){ include("menu2_gerant.php");} else if($_SESSION['profil']=="administrateur"){ include("menu2_admin.php");} else if($_SESSION['profil']=="tresorier"){ include("menu2_tresorier.php");}?></td>
				<td align="center" align="center" valign="top">
					<center><h2 class="text">Supervision-Finance</h2></center>
					<table border="0" class="tab">
						<tr>
							<td class="text">
								<?php
	// Enregistrons les informations de date dans des variables
		 $jour = date("d");
		 $mois = date("m");
		//$annee = date("Y");
		//$annee2 = date("Y");
		//$heure = date("H");
		//$minute = date("i");
		//gestion des dates pour l'affichage 
				if(date("m")!=1)
				{
				$mois_prec=date("m")-1; //mois précédent
				$annee=date("Y"); // de la même année
				}
				else if (date("m")==1)
				{
				$mois_prec=12; //mois précedent corespond à decembre
				$annee=date("Y")-1; // de l'année passé
				}
				$date1="$annee-$mois_prec-25"; // c'est la date d'avant
				$date2="$annee-$mois-$jour";  //date d'après
				//formulaire de saisie de la période concernant les recettes à enregistrer
				?>
				<center><h2 class="text">Choisir la période de supérvision</h2></center>
					<form  name="formulaire_finance" onSubmit="return verification_formulaire()" method="post" action="traitement_supervision_finance.php">
						<fieldset><legend>Periode</legend>
							<br/><label for="date1">DU</label> <input type="text" name="date1" id="date1" class="calendrier" value="<?php echo$date1;?>" />
							<label for="date2">AU</label> <input type="text" name="date2" id="date2" class="calendrier" value="<?php echo$date2;?>" />
							<br/><br/><center><input type="submit" value="Valider" /></center>
						</fieldset>
					</form><br/>
							</td>
						</tr>
					</table>  
					
				</td>
			</tr>
			
		</table>
	</body>
</html>

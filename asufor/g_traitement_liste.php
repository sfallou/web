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
					<?php
						$id=$_POST['id_abonne'];
						$village=$_POST['adresse'];
						$prenom=$_POST['prenom'];
						$nom=$_POST['nom'];
					?>
					<div id="dbm-table">
						<div id="dbm-header">
							<span class="header-text">Compteur de l'abonné <?php echo "$prenom $nom  de $village" ?><br/><br/>
						</div>
					</div>
					<br/>
						<form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post" id="chgdept">
							<fieldset style="color:#000;text-shadow: 15px #000;font-size: 15px;;border: 3px double #333399; background: linear-gradient(#27292C, #BBDEFF) repeat scroll 0% 0% transparent;">
							<legend>Sélectionnez une année</legend>
							Année : <select name="annee" id="annee" onchange="getIndex(this.value);">
								<option value="vide">- - - Choisissez une année - - -</option>
								<option value='<?php echo "$id-2014"?>' >2014</option>
								<option value='<?php echo "$id-2015"?>' >2015</option>
								<option value='<?php echo "$id-2016"?>' >2016</option>
								<option value='<?php echo "$id-2017"?>' >2017</option>
								<option value='<?php echo "$id-2018"?>' >2018</option>
								<option value='<?php echo "$id-2019"?>' >2019</option>
								<option value='<?php echo "$id-2020"?>' >2020</option>
								<option value='<?php echo "$id-2021"?>' >2021</option>
								<option value='<?php echo "$id-2022"?>' >2022</option>
								<option value='<?php echo "$id-2023"?>' >2023</option>
								<option value='<?php echo "$id-2024"?>' >2024</option>
								<option value='<?php echo "$id-2025"?>' >2025</option>
								<option value='<?php echo "$id-2026"?>' >2026</option>
								<option value='<?php echo "$id-2027"?>' >2027</option>
								<option value='<?php echo "$id-2028"?>' >2028</option>
								<option value='<?php echo "$id-2029"?>' >2029</option>
								<option value='<?php echo "$id-2030"?>' >2030</option>
							</select>
							</fieldset>
						</form>
				<span id="blocIndex">
						<h3 class="td"><center>Selectionner une année ci-dessus pour afficher les informations</center></h3>
						<table border="1" class="table">
							<tr style="background:#094963;color:#fff;">
								<th >Mois</th><th >Montant</th>	<th>Ancien Index</th><th>Nouvel Index</th>
							</tr>
						<?php
							for($i=1;$i<=12;$i++)
							{
								$mois=convert_mois($i);
								
								echo'<tr><td class="td">'.$mois.'</td><td class="td">----</td><td class="td">----</td><td class="td">----</td></tr>';
							}
						?>
						</table>
				</span><br />
					
				</td>
			</tr>
			<tr>
				<td height="50" colspan="2" align="center" valign="midlle" >teamCS-EsP@copyrights:2014</td>
			</tr>
		</table>
	</body>
</html>

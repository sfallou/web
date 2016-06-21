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
				<td width="200" height="500" align="center" valign="top" ><div class="profil"><?php echo strtoupper($_SESSION['profil']);?></div><br/> <?php include("menu2_admin.php");?></td>
				<td align="center" align="center" valign="top">
					<center><h2 class="text">Statistiques</h2></center>
					<table border="0" class="tab">
						<tr>
							<td class="text" colspan="2">
								<?php

								if(!isset($_POST['date1']) AND !isset($_POST['date2']))
								{
									$annee2=$annee;
									if($mois!=1)
									{
										$moiss=$mois-1;
									}		
									else
									{
										$moiss=12;
										$annee=date("Y")-1;
									}
										$date1="$annee-$moiss-25";
										$date2="$annee2-$mois-25";
								?>
								<center><h2 class="text">Choisir une période de consultation des statistiques</h2></center>
								<form method="post" action="historique.php">
									<fieldset>
									<legend>Période</legend>
									<label for="date1"> DU </label><input type="text" name="date1"   class="calendrier" value="<?php echo $date1;?>" />&nbsp&nbsp&nbsp
									<label for="date2"> AU </label><input type="text" name="date2"  class="calendrier"  value="<?php echo $date2;?>" /><br/><br/>
								    <input type="submit" value="VALIDER" style="margin-left:150px"/>   
									</fieldset>
								</form>
									<?php						
					
								}
								else
								{
									$date_limite1=$_POST['date1'];
									$date_limite2=$_POST['date2'];
									$timestamp2=strtotime($date_limite2);
									$timestamp1=strtotime($date_limite1);
									$reponse = mysql_query("SELECT SUM(nouvel_index-ancien_index) AS total_index FROM compteur WHERE timestamp >='$timestamp1' AND timestamp <='$timestamp2' ");
									if($donnees = mysql_fetch_array($reponse))
									{
										$total_index=$donnees['total_index'];
										$gain_total=$total_index*$tarif;
									}
									?>
								<div id="dbm-table">
									<div id="dbm-header">
										<span class="header-text">Tableau des statistiques</span><br>
									</div>
								<div id="tb-top">
									<div class="tb-top-cell">Date 1</div>
									<div class="tb-top-cell">Date 2</div>
									<div class="tb-top-cell">Volume d'eau consommé(m3)</div>
									<div class="tb-top-cell">Montant Facturation</div>
								</div>
								<div id="tb-corps">
									<div class="tb-right-cell"><?php echo $date_limite1;?></div>
									<div class="tb-right-cell"><?php echo $date_limite2;?></div>
									<div class="tb-right-cell"><?php echo $total_index;?></div>
									<div class="tb-right-cell"><?php echo $gain_total;?></div>
								</div>
								<?php
								} // Fin du else
							 ?>
							</td>
						</tr>
						<tr>
							<td valign="top">
							<br/>
							<?php include("total_abonne.php");?>
							</td>
							<td valign="top" >
							<br/>
								<?php include("total_consommation.php");?>
							</td>
						</tr>
					</table>  
					
				</td>
			</tr>
			
		</table>
	</body>
</html>






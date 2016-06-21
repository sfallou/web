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
					<center><h2 class="text">Bon D'abonnement</h2></center>
					<form method="post" action="bon_abonnement_pdf.php" target="_blank">
						<input type="submit" value="Imprimer ce bon en pdf" /><br/><br/>
							<?php
							//récupération des valeurs
						$id_abonne=$_POST['id_abonne'];
				$requete = "SELECT * FROM abonne WHERE id_abonne='$id_abonne'";
				$resultat= mysql_query($requete);
				while($donnes=mysql_fetch_array($resultat))
					{
					$id_abonne=$donnes['id_abonne'];
					$prenom=$donnes['prenom'];
					$nom=$donnes['nom']; 
					$cin=$donnes['cni'];
					$adresse=$donnes['adresse'];
					$telephone=$donnes['telephone'];
					$date_abonnement=$donnes['date_abonnement'];
					$frais_abonnement=$donnes['frais_abonnement'];
			?>
			<div class="cadre">
			<h4><?php entete_asufor()?></h4>
			<h5>Bon d'abonnement</h5>
			<table cellspacing=20px;>
				<tr><th >Prénom:</th><td><?php echo $prenom;?></td>&nbsp &nbsp &nbsp <th>Nom:</th><td><?php echo $nom;?></td> &nbsp &nbsp &nbsp <th>Identifiant:</th><td> <?php echo $id_abonne;?></td></tr>
				<tr><th>Adresse:</th><td><?php echo $adresse;?></td> &nbsp &nbsp &nbsp <th>CNI:</th><td><?php echo $cin;?></td>&nbsp &nbsp &nbsp <th> Téléphone:</th><td><?php echo $telephone;?> </td></tr>
				<tr><th >Frais :</th><td><?php echo $frais_abonnement ;?>FCFA</td> &nbsp &nbsp &nbsp <th colspan="2">Date & lieu d'abonnement:</th><td colspan="2">SEOKHAYE le <?php echo changedate1($date_abonnement);?></td></tr><br/>
		    </table>
			<p class="paragrahe">
			Votre abonnement a été enregistré avec succés dans le Réseau ASUFOR de SEOKHAYE
			Dorénavant,de l'eau potable vous sera servi dans les meilleurs conditions.
			"VOTRE SATISFACTION! NOTRE AMBITION!"
			</p>
				<input type="hidden" name="id_abonne" value="<?php echo $id_abonne;?>"/>
				<input type="hidden" name="prenom" value="<?php echo $prenom;?>"/>
				<input type="hidden" name="nom" value="<?php echo $nom;?>"/>
				<input type="hidden" name="cin" value="<?php echo $cin;?>"/>
				<input type="hidden" name="adresse" value="<?php echo $adresse;?>"/>
				<input type="hidden" name="telephone" value="<?php echo $telephone;?>"/>
				<input type="hidden" name="date_abonnement" value="<?php echo $date_abonnement;?>"/>
				<input type="hidden" name="frais_abonnement" value="<?php echo $frais_abonnement;?>"/>
			<?php
					}
			?>
			</div>		
			</form>
		
				</td>
			</tr>
			
		</table>
	</body>
</html>

                 




























		


                 



























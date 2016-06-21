<?php
session_start();
require ("header.php");
require_once ("connexion.php");
require ("variables.php");
include("changer_format_date.php");


?>
	<body>
		<table style="border:1px dashed" width="60%" height="30%" align="center" cellspacing="10">
			<tr>
				<td width="200" height="500" align="center" valign="top" ><div class="profil"></td>
				<td align="center" align="center" valign="top">
					<center><h2 class="text">Bon D'abonnement</h2></center>
						<form method="post" action="bon_abonnement_pdf.php" target="_blank">
						
							<?php
				$requete = "SELECT * FROM abonne ORDER BY id_abonne DESC LIMIT 0,1";
				$resultat= $bdd->query($requete);
				while($donnes=$resultat->fetch())
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
			<center><button class="btn btn-large btn-primary" type="submit">Imprimer Bon</button></center>		
			</form>
		
				</td>
			</tr>
			
		</table>
	</body>
</html>

                 












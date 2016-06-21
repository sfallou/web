<?php	
 require('head.php');
 require('header.php'); 
 require('classes/utilisateurs.php');

if(isset($_GET['id_abonne']) and !empty($_GET['id_abonne']) and isset($_GET['id_compteur']) and !empty($_GET['id_compteur'])){
		$id_compteur=$_GET['id_compteur'];
		$id_abonne=$_GET['id_abonne'];
		//$cpteur=new Compteur($bdd,$id_abonne);
	$reponse = $bdd->query("SELECT * FROM compteur WHERE id_compteur='$id_compteur'");
?>
	<h2> Modification index de l'abonné N° <?php echo$id_abonne?></h3>
	<?php
		if($donnees = $reponse->fetch())
			{
			echo
			'<div class="box-header well" data-original-title="">
    			<h2><i class="glyphicon glyphicon-edit"></i> Modifier les prélèvements d\'un abonné</h2>
    			<div class="box-icon">
        		<a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
        		<a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
        
   			 </div>
			</div>
			<center><form role="form" method="post" action="traitement_modifier_index.php">
				<fieldset><legend>Modifier les enregistrements de la date du '. changedate1(htmlspecialchars($donnees['date_index'])) .'  </legend> 
				<table>
					<tr><td>Nouvel Index</td><td><input type="text" name="nouvel_index" value="'. htmlspecialchars($donnees['nouvel_index']) .'" class="form-control" required/></td></tr>
					<tr><td>Ancien Index</td><td><input type="text" name="ancien_index" value="'. htmlspecialchars($donnees['ancien_index']) .'" class="form-control" required/></td></tr> 
								<input type="hidden" name="id_compteur" value="'. htmlspecialchars($donnees['id_compteur']) .'" " class="form-control" required />
								<input type="hidden" name="date_index" value="'. htmlspecialchars($donnees['date_index']) .'"  " class="form-control" required/>
								<input type="hidden" name="id_abonne" value="'. $id_abonne .'" " class="form-control" required/>';
								
						}	
		?>
				</table>
				</fieldset> 
				<p class="center col-md-5"><button class="btn btn-primary" type="submit">Valider</button>
			</form></center>
<?php 
}
else{
	echo
			'<div class="box-header well" data-original-title="">
    			<h2><i class="glyphicon glyphicon-edit"></i> Modifier les prélèvements d\'un abonné</h2>
    			<div class="box-icon">
        		<a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
        		<a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
        
   			 </div>
			</div>
			<center><form method="get" action="modifier_index.php">
				<fieldset><legend>Modification d\'index </legend> 
				<table>
					<tr><td>ID compteur</td><td><input type="number" name="id_compteur" class="form-control" required/></td></tr>
					<tr><td>ID abonné</td><td><input type="number" name="id_abonne" class="form-control" required/></td></tr>  ';

		?>
			</table>
				</fieldset> 
			<p class="center col-md-5"><button class="btn btn-primary" type="submit">Valider</button>
			</form></center>
<?php
}
?>


			
<?php require('footer.php'); ?>
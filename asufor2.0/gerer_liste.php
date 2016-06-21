<?php 
    require('head.php');
	require('header.php'); 
	require('classes/utilisateurs.php');
	
?>
<div class="box-header well" data-original-title="">
    <h2><i class="glyphicon glyphicon-edit"></i> Gestion des listes (verte, rouge, suspendue)</h2>
    <div class="box-icon">
        <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
        
    </div>
</div>


<form role='form' method="post" action="etat_facturation0.php">
	<table class="table">
			<tr><th>Adresse</th><th>Mois</th><th>Année</th></tr>
				<tr>
				<td><select name="adresse" class="form-control">
					<?php
					$village=$bdd->query("select * from villages");
					while($vil=$village->fetch()){
					?>
					<option value="<?php echo $vil['nom_village'];?>"><?php echo $vil['nom_village'];?></option>
					<?php } ?>
					</select>
				</td>
				<td><select name="mois" class="form-control">
					<option value="01">Janvier</option>
					<option value="02">Février</option>
					<option value="03">Mars</option>
					<option value="04">Avril</option>
					<option value="05">Mai</option>
					<option value="06">Juin</option>
					<option value="07">Juillet</option>
					<option value="08">Août</option>
					<option value="09">Septembre</option>
					<option value="10">Octobre</option>
					<option value="11">Novembre</option>
					<option value="12">Décembre</option>
					</select>
				</td>
				<td><input type="text" name="annee" value="2015" class="form-control" required/></td>
				</tr>
			</table>																		       
		<p class="center col-md-5"><button class="btn btn-primary" type="submit">Valider</button>
	</form> 
	
<?php require('footer.php'); ?>




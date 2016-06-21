<?php 
    require('head.php');
	require('header.php'); 
	require('classes/utilisateurs.php');
	
?>
<div class="box-header well" data-original-title="">
    <h2><i class="glyphicon glyphicon-edit"></i> Enregistrer vos Depenses</h2>
    <div class="box-icon">
        <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
        
    </div>
</div>


<form role='form' method="post" action="traitement_enregistrer_depense.php">
	<table class="table" >
		<tr style ='background-color: #2ba6cb;'>
			<th>Date</th>
			<th>Gazoil</th>
			<th>Electricité</th>
			<th>Entretien</th>
			<th>Divers</th>
			<th>Notes</th>
		</tr>
		<tr>
			<td><input type="date" size="10" name="date" class="form-control" required/></td>
			<td><input type="text" size="10" name="gazoil" class="form-control" required/></td>
			<td><input type="text" size="10" name="electricite" class="form-control" required/></td>
			<td><input type="text" size="10" name="entretien" class="form-control" required/></td>
			<td><input type="text" size="10" name="divers" class="form-control" required/></td>
			<td><textarea name="note" cols="10" rows="1" class="form-control"></textarea></td>
		</tr>
		<tr style ='background-color: #2ba6cb;'><th colspan="7"> <center>Salaires</center></th></tr>
		<tr><th colspan="2">Conducteur</th><th colspan="2">Gérant</th><th colspan="2" >Releveur</th></tr>
		<tr>
			<td colspan="2"><input type="text" size="20" name="salaire_conducteur" class="form-control" required/></td>
			<td colspan="2"><input type="text" size="20" name="salaire_gerant" class="form-control" required/></td>
			<td colspan="2"><input type="text" size="20" name="salaire_releveur" class="form-control" required/></td>
		</tr>
	</table>																		       
	<p class="center col-md-5"><button class="btn btn-primary" type="submit">Valider</button>
</form> 
	
<?php require('footer.php'); ?>
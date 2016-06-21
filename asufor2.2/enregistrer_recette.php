<?php 
    require('head.php');
	require('header.php'); 
	require('classes/utilisateurs.php');
	
?>
<div class="box-header well" data-original-title="">
    <h2><i class="glyphicon glyphicon-edit"></i> Enregistrer vos Recettes</h2>
    <div class="box-icon">
        <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
        
    </div>
</div>


<form role='form' method="post" action="traitement_enregistrer_recette.php">
	<table class="table" >
		<tr style ='background-color: #2ba6cb;'>
			<th>Date</th>
			<th>Abreuvoir</th>
			<th>Potence</th>
			<th>Divers</th>
			<th>Notes</th>
		</tr>
		<tr>
			<td><input type="date" size="10" name="date" class="form-control" required/></td>
			<td><input type="text" size="10" name="abreuvoir" class="form-control" required/></td>
			<td><input type="text" size="10" name="potence" class="form-control" required/></td>
			<td><input type="text" size="10" name="divers" class="form-control" required/></td>
			<td><textarea name="note" cols="10" rows="2"></textarea></td>
	</table>																		       
	<p class="center col-md-5"><button class="btn btn-primary" type="submit">Valider</button>
</form> 
	
<?php require('footer.php'); ?>




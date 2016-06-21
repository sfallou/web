<?php 
    require('head.php');
	require('header.php'); 
	require('classes/utilisateurs.php');
	
?>
<div class="box-header well" data-original-title="">
    <h2><i class="glyphicon glyphicon-edit"></i> Enregistrer une dette</h2>
    <div class="box-icon">
        <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
        
    </div>
</div>


<form role='form' method="post" action="traitement_dette.php">
	<table class="table" >
		<tr><td><label for="id_abonne">Identifiant abonne :</label></td><td><input type="text" name="id_abonne" id="id_abonne"  tabindex="20" /></td></tr>
		<tr><td><label for="num_facture">Numero facture :</label></td><td><input type="text" name="num_facture" id="num_facture" tabindex="30" /></td></tr>
		<tr><td><label for="dette">Montant dette :</label></td><td><input type="text" name="dette" id="dette" tabindex="40"/></td></td>
		<tr><td><label for="date">Date d'enregistrement dette :</label></td><td><input type="date" name="date" id="date"  class="calendrier" tabindex="50"/></td></tr>	
	</table>																		       
	<p class="center col-md-5"><button class="btn btn-primary" type="submit">Valider</button>
</form> 
	
<?php require('footer.php'); ?>

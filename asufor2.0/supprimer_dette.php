<?php 
	require('head.php');
	include('connexion.php');
	include('classes/utilisateurs.php');
	require('header.php');
	
?>
    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i>Suppression dette</h2>

        <div class="box-icon">
        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
        </div>
    </div>
    <div class="box-content">
		<?php
				$req=$bdd->query("select * from dette order by id_dette");
		?>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" >
    <thead>
    <tr>
    	<th>Prenom</th>
        <th>Nom</th>
        <th>adresse</th>
        <th>Montant dette</th>
        <th>Num Facture</th>
        <th>Date</th>
        <th>Supprimer</th>
    </tr>
    </thead>
    <tbody>
    	<?php
		while($don=$req->fetch())
			{
				$id_dette=$don['id_dette'];
				$id_abonne=$don['id_abonne'];
				$montant=$don['montant_dette'];
				$num_facture=$don['num_facture'];
				$date_dette=$don['date_dette'];
				$resultat=$bdd->query("select * from abonne where id_abonne='$id_abonne'");
				if($data=$resultat->fetch())
					{
						$prenom=$data['prenom'];
						$nom=$data['nom'];
						$adresse=$data['adresse'];
					}
					?>
				<tr>
					<td><?php echo"$prenom";?></td>
					<td><?php echo"$nom";?></td>
					<td><?php echo"$adresse";?></td>
					<td><?php echo"$montant";?></td>
					<td><?php echo"$num_facture";?></td>
					<td><?php echo"$date_dette";?></td>
					<td>
						<a class="btn btn-danger orange" href="traitement_supprimer_dette.php?id=<?php echo $id_dette;?>">
							<i class="glyphicon glyphicon-trash icon-white"></i>Oui</a>
					</td>
									
    <?php } $req=null; ?>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    <!--/span-->

    </div><!--/row-->

<?php require('footer.php'); ?>
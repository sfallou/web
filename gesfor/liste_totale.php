<?php require('secure.php');?>	

    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i>Liste de tous les Abonnés</h2>

        <div class="box-icon">
        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
        </div>
    </div>
    <div class="box-content">
		<?php
				$req=$bdd->query('SELECT * from abonne');
		?>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" >
    <thead>
    <tr>
        <th>ID</th>
			<th>Prenom</th>
			<th>Nom</th>
			<th>Adresse</th>
			<th>CNI</th>
			<th>Téléphone</th>
    </tr>
    </thead>
    <tbody>
		<?php
			// Récupération des abonnés 
			$req=$bdd->prepare("SELECT * FROM abonne ORDER BY id_abonne");
			$req->execute(); 
			while($donnees=$req->fetch() )
				{
					$prenom=$donnees['prenom'];
					$nom=$donnees['nom'];
					$tel=$donnees['telephone'];
					$cni=$donnees['cni'];
					$adresse=$donnees['adresse'];
					$id_abonne=$donnees['id_abonne'];
					$etat=$donnees['etat'];
					$etat="$etat";
					
		?>
	<tr >
		<td class="center" ><?php echo strtoupper($id_abonne);?></td>
		<td class="center"><?php echo $prenom;?></td>
		<td class="center"><?php echo strtoupper($nom);?></td>
		<td class="center"><?php echo $adresse;?></td>
		<td class="center"><?php echo $cni;?></td>
		<td class="center"><?php echo $tel;?></td>
	</tr>
	<?php
		}
		?>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    <!--/span-->

    </div><!--/row-->




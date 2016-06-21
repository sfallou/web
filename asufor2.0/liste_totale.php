<?php require('secure.php');?>	
<div class="box-inner">
 <div class="box col-md-12">
	<div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i>Liste des Abonn&eacute;s</h2>

        <div >
     	  	 <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
        </div>
    </div>
	<div class="box-content" style ='background-color: #2ba6cb;'>
	<table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
		<tr >
			<th>ID</th>
			<th>Prenom</th>
			<th>Nom</th>
			<th>Adresse</th>
			<th>CNI</th>
			<th>T&eacute;l&eacute;phone</th>
		</tr>
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
		<td><?php echo strtoupper($id_abonne);?></td>
		<td><?php echo $prenom;?></td>
		<td><?php echo strtoupper($nom);?></td>
		<td><?php echo $adresse;?></td>
		<td><?php echo $cni;?></td>
		<td><?php echo $tel;?></td>
	</tr>
	<?php
		}
		?>
</table>
<ul class="pagination pagination-centered">
                        <li><a href="#">Precedent</a></li>
                        <li class="active">
                            <a href="#">1</a>
                        </li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">suivant</a></li>
    </ul>
</div>
</div>
</div>

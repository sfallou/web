<?php
	require('head.php');
	require('header.php');
	require('connexion.php');
 ?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-plus"></i> Nouvelle Urgence</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    
                </div>
            </div>
            <div class="box-content row">
 <center>
		<section>
					 

						 <h2> Cette section permet d'ajouter une urgence dans la base de données de l'application. </h2>

						 

						 <form action="traitementUrgence.php" method="POST" enctype="multipart/form-data">
						 <h3 style="text-align:center">Entrez l'urgence</h3>
						 </br>

						 <div class = "texte">

						 <label>Urgence : </br>
						 	<input name="urgence" style="width:300px"  required></label>
						 </br>
						 </br>

						 <label>Téléphone : </br>
						 	<input name="numeros_tel" style="width:100px"  required></label>
						 </br>
						 </br>


						 <label>Détails de l'urgence : </br>
						 	<input name="detail_urgence" style="width:300px"  required></label>
						 </br>
						 </br>

						 </div>




 						 <button class="btn btn-primary" type="submit">Enoyer</button>
 						 </form>










		</section>
	</center>
	</div>
	</div>
	</div>
	</div>

<?php
require('footer.php');
?>

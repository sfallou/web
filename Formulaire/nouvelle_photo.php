<?php
	require('head.php');
	require('header.php');
	require('connexion.php');
 ?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-plus"></i> Nouvelle Photo</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    
                </div>
            </div>
            <div class="box-content row">
 <center>
		<section>
			<h2> Cette section permet d'ajouter une photo dans la base de données de l'application. </h2>

						 

						 <form action="traitementPhotos.php" method="POST" enctype="multipart/form-data">
						 <h3 style="text-align:center">Entrez la photo</h3>
						 </br>

						 <div class = "texte">

						 <label><input name="photo" type="file" required></label>
 						 </div>





 						 <button class="btn btn-primary" type="submit">Envoyer</button>
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

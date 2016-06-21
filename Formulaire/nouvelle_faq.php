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
					 <h2> Cette section permet d'ajouter une question dans la base de données de l'application. </h2>

						 

						 <form action="traitementFAQ.php" method="POST" enctype="multipart/form-data">
						 <h3 style="text-align:center">Entrez les données de la question</h3>
						 </br>

						 <div class = "texte">

						 <label>Type : <select name="titre">
						 <option> Sport
						 <option> Communication
						 <option> Securite
						 <option> Soiree
						 <option> Logistique
						 </select>
						 </label>
						 </br>
						 </br>

						 <label>Question : </br>
						 	<input name="question" style="width:300px"  required></label>
						 </br>
						 </br>


						 <label>Réponse : </br>
						 	<input name="reponse" style="width:300px"  required></label>
						 </br>
						 </br>







 						 </div>



 						 <div class="button">
 						 <input style="width:150px" type="submit" value="Envoyer la question">
        				 </div>
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

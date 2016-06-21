<?php
	require('head.php');
	require('header.php');
	require('connexion.php');
 ?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-plus"></i> Nouveau Match</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    
                </div>
            </div>
            <div class="box-content row">
 <center>
		<section>
					
<form action="traitementInfo.php" method="POST" enctype="multipart/form-data">
						 <h3 style="text-align:center">Entrez les données de l'info</h3>
						 </br>

						 <div class = "texte">

						 <label>Date : <select name="date_info">
						 <option> Mercredi 16 Mars
						 <option> Jeudi 17 Mars
						 <option> Vendredi 18 Mars
						 <option> Samedi 19 Mars
						 <option> Dimanche 20 Mars
						 <option> Lundi 21 Mars
						 <option> Mardi 22 Mars
						 <option> Mercredi 23 Mars
						 <option> Jeudi 24 Mars
						 <option> Vendredi 25 Mars
						 <option> Samedi 26 Mars
						 </select>
						 </label>
						 </br>
						 </br>

						 <label>Titre : </br>
						 	<input name="titre" style="width:300px"  required></label>
						 </br>
						 </br>


						 <label>Contenu : </br>
						 	<textarea name="contenu" required> </textarea></label>
						 </br>
						 </br>

						 <label>Image : </br> <input name="image_info" type="file" required></label>

						 	</br>
						 </br>






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

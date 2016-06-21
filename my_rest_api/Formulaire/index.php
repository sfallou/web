<?php 
require("header.php");
?>

		
		<section>
				
<form action="traitementIndex.php" method="POST" enctype="multipart/form-data">
						 <h3 style="text-align:center">Entrez les données de l'info</h3>
						 </br>

						 <div class = "texte">

						 <label>Date : <select name="date_info">
						 <option> Vendredi 18 Mars
						 <option> Samedi 19 Mars
						 <option> Dimanche 20 Mars
						 </select>
						 </label>
						 </br>
						 </br>

						 <label>Titre : </br>
						 	<input name="titre" style="width:300px"  required></label>
						 </br>
						 </br>


						 <label>Contenu : </br>
						 	<input name="contenu" style="width:300px"  required></label>
						 </br>
						 </br>

						 <label>Image : </br> <input name="image_info" type="file" required></label>

						 	</br>
						 </br>






 						 </div>



 						 <div class="button">
 						 <input style="width:150px" type="submit" value="Envoyer l'info">
        				 </div>
 						 </form>

		</section>


    </body>
</html>
<?php 
require("header.php");
?>


		

		<section>
					<h2> Cette section permet d'ajouter une urgence dans la base de données de l'application. </h2>

						 

						 <form action="traitementUrgences.php" method="POST" enctype="multipart/form-data">
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



						<div class="button">
 						 <input style="width:150px" type="submit" value="Envoyer l'urgence">
        				 </div>
 						 </form>










		</section>
    </body>
</html>
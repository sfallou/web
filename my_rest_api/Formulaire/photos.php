<?php 
require("header.php");
?>


		

		<section>
					<h2> Cette section permet d'ajouter une photo dans la base de données de l'application. </h2>

						 

						 <form action="traitementPhoto.php" method="POST" enctype="multipart/form-data">
						 <h3 style="text-align:center">Entrez la photo</h3>
						 </br>

						 <div class = "texte">

						 <label><input name="photo" type="file" required></label>
 						 </div>



 						 <div class="button">
 						 <input style="width:100px" type="submit" value="Envoyer la photo">
        				 </div>
 						 </form>










		</section>
    </body>
</html>
<?php 
require("header.php");
?>


		

		<section>
					<h2> Cette section permet d'ajouter le calendrier dans la base de données de l'application. </h2>

						 

						 <form action="traitementCalendrier.php" method="POST" enctype="multipart/form-data">
						 <h3 style="text-align:center">Entrez le calendrier</h3>
						 </br>

						 <div class = "texte">

						 <label><input name="calendrier" type="file" required></label>
 						 </div>



 						 <div class="button">
 						 <input style="width:150px" type="submit" value="Envoyer le calendrier">
        				 </div>
 						 </form>










		</section>
    </body>
</html>
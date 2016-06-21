<?php 
require("header.php");
?>


		

		<section>
					<h2> Cette section permet d'ajouter un plan dans la base de données de l'application. </h2>

						 

						 <form action="traitementPlans.php" method="POST" enctype="multipart/form-data">
						 <h3 style="text-align:center">Entrez le plan</h3>
						 </br>

						 <div class = "texte">

						 <label><input name="plan" type="file" required></label>
 						 </div>



 						 <div class="button">
 						 <input style="width:100px" type="submit" value="Envoyer le plan">
        				 </div>
 						 </form>










		</section>
    </body>
</html>
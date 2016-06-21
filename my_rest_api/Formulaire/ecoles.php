<?php 
require("header.php");
?>


		

		<section>
					<h2> Cette section permet d'ajouter une école dans la base de données de l'application. </h2>

						 

						 <form action="traitementEcole.php" method="POST" enctype="multipart/form-data">
						 <h3 style="text-align:center">Entrez les paramètres de l'école</h3>
						 </br>

						 <div class = "texte">
						 <label>Nom complet de l'école : <input name="nom_ecole" style="width:200px" required></label>
						 </br>
						 </br>
						 
					
						 
 						 <label>Abréviation (code simple) : <input name="abrev" style="width:50px" required></label>
						 </br>
						 </br>
 						
 						 <label>Nombre de points : <input name="points" value="0" style="width:50px" required></label>
						 </br>
						</br>

						 <label>Logo : </br> <input name="logo" type="file" required></label>
 						 </div>



 						 <div class="button">
 						 <input style="width:100px" type="submit" value="Créer l'école">
        				 </div>

        				 </br>
						 </br>


        				 










		</section>
    </body>
</html>
<?php 
require("header.php");
?>


		

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
    </body>
</html>
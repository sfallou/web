<?php 
require("header.php");
?>


		

		<section>
					<h2> Cette section permet d'ajouter un match spécial dans la base de données de l'application. </h2>

						 

						 <form action="traitementMatchss.php" method="POST" enctype="multipart/form-data">
						 <h3 style="text-align:center">Entrez les paramètres du match</h3>
						 </br>


						 <div class = "texte">

						 <label>Sport concerné : <select name="sport">
						 <option> Athletisme
						 <option> Badminton
						 <option> Escalade
						 <option> Escrime
						 <option> Golf
						 <option> Judo
						 <option> Natation
						 <option> Raid
						 <option> Ski
						 <option> Tennis
						 <option> Tennis de table
						 <option> Ultimate
						 <option> Waterpolo
						 </select>



						 </label>
						 </br>
						 </br>

						 
						 <label> Nom de l'équipe (ou du joueur) :
						  	<select name="equipe">
    							<option value="rien">Sélectionner une équipe (ou un joueur)</option>
    							<?php

   									 $sql=$bdd->query("SELECT * FROM Equipes");
            						while ($data=$sql->fetch()) {
                						//$id=$data['id_equipe'];
                					$nom_e1=$data['nom_equipe'];
               						 ?>
               					 <option value="<?php echo $nom_e1;?>"><?php echo "$nom_e1";?></option>
           					  <?php
           						 }
  					 		 ?>
    						</select>
    					</label>
						 </br>
						 </br>

 						 </div>



 						 <div class="button">
 						 <input style="width:100px" type="submit" value="Créer le match">
        				 </div>
 						 </form>










		</section>
    </body>
</html>
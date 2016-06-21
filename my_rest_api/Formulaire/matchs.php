<?php 
require("header.php");
?>






		

		<section>
					<h2> Cette section permet d'ajouter un match normal dans la base de données de l'application. </h2>

						 

						 <form action="traitementMatchs.php" method="POST" enctype="multipart/form-data">
						 <h3 style="text-align:center">Entrez les paramètres du match</h3>
						 </br>


						 <div class = "texte">

						 <label>Sport concerné : <select name="sport">
						 <option> Basketball
						 <option> Football
						 <option> Handball
						 <option> Rugby
						 <option> Volley
						 </select>



						 </label>
						 </br>
						 </br>

						 
						  <label> Équipe 1 :
						  	<select name="equipe1">
    							<option value="---">Sélectionner une équipe</option>
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

						 <label> Équipe 2 :
						 	<select name="equipe2">
    							<option value="---">Sélectionner une équipe</option>
    							<?php

   									 $sql=$bdd->query("SELECT * FROM Equipes");
            						while ($data=$sql->fetch()) {
                						//$id=$data['id_equipe'];
                					$nom_e2=$data['nom_equipe'];
               						 ?>
               					 <option value="<?php echo $nom_e2;?>"><?php echo "$nom_e2";?></option>
           					  <?php
           						 }
  					 		 ?>
    						</select>
    					</label>
						 </br>
						 </br>





						 <label>Score 1 : <input name="score1" value="0" style="width:50px" required></label>
						 </br>
						 </br>

						 <label>Score 2 : <input name="score2" value="0" style="width:50px" required></label>
						 </br>
						 </br>
						 
					
 						 <label>Phase : <select name="phase">
						 <option> Poule
						 <option> Barrage
						 <option> Huitieme_finale
						 <option> Quart_finale
						 <option> Demie_finale
						 <option> Finale
						 </select>
						</label>
						 </br>
						 </br>
 						
 						 <label>Numéro de poule : <select name="poule">
						 <option> 0
						 <option> 1
						 <option> 2
						 <option> 3
						 <option> 4
						 <option> 5
						 <option> 6
						 <option> 7
						 <option> 8
						 <option> 9
						 <option> 10
						 <option> 11
						 <option> 12
						 <option> 13
						 <option> 14
						 <option> 15
						 <option> 16
						 </select>
						</label>
						</br>
						 </br>


						 <label>Date : <select name="date">
						 <option> Samedi 19 Mars
						 <option> Dimanche 20 Mars
						 </select>
						</label>
						</br>
						 </br>

						 <label>Heure : <input name="heure" style="width:50px" required></label>
						 </br>
						 </br>

						 <label>Lieu : <select name="lieu">
						 <option> Ecully
						 <option> Doua
						 <option> Centrale Lyon
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
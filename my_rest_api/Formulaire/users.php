<?php 
require("header.php");
?>


		

		<section>
			<h2> Cette section permet d'ajouter un utilisateur dans la base de données de l'application. </h2>
					



				<form action="traitementUsers.php" method="POST" enctype="multipart/form-data">
						 <h3 style="text-align:center">Entrez les paramètres de l'utilisateur</h3>
						 </br>

						 <div class = "texte">

						 <label>Nom : </br> <input name="nom" style="width:200px" required></label>
						 </br>
						 </br>

						 <label>Login : </br> <input name="login" style="width:200px" required></label>
						 </br>
						 </br>

						 <label>Mot de passe : </br> <input type="password" name="mdp" style="width:200px" required></label>
						 </br>
						 </br>

						 <label>Profil : <select name="profil">
						 <option> VP Sport
						 <option> Club Photo
						 <option> Administrateur
						 <option> Super administrateur
						 </select>
						 </label>
						 </br>
						 </br>

						
						 




 						 <div class="button">
 						 <input style="width:150px" type="submit" value="Créer l'utilisateur">
        				 </div>
 						 </form>






		</section>
    </body>
</html>
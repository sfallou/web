<?php
	require('head.php');
	require('header.php');
	require('connexion.php');
 ?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-plus"></i> Nouvelle Equipe</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    
                </div>
            </div>
            <div class="box-content row">
 <center>
		<section>
					 

						 <form action="traitementEquipe.php" method="POST" enctype="multipart/form-data">
						 <h3 style="text-align:center">Entrez les paramètres de l'équipe</h3>
						 </br>

						 <div class = "texte">

						 <label>Nom complet de l'équipe : <input name="nom_equipe" style="width:200px" required></label>
						 </br>
						 </br>

						 <label>Sport concerné : <select name="type_sport">
						 <option> Athletisme
						 <option> Badminton
						 <option> Basketball
						 <option> Escalade
						 <option> Escrime
						 <option> Football
						 <option> Golf
						 <option> Handball
						 <option> Judo
						 <option> Natation
						 <option> Raid 
						 <option> Rugby
						 <option> Ski
						 <option> Tennis
						 <option> Tennis de table
						 <option> Ultimate
						 <option> Volley
						 <option> Waterpolo
						 </select>



						 </label>
						 </br>
						 </br>

						 <label>Genre : <select name="type_equipe">
						 <option> Homme
						 <option> Femme
						 <option> Mixte
						 </select>
						 </label>
						 </br>
						 </br>

						 <label> École:
						 </br>
						 <select name="ecole">
						
    <option value="rien">Sélectionner une école</option>
    <?php

    $sql=$bdd->query("SELECT * FROM Ecoles");
            while ($data=$sql->fetch()) {
                $id=$data['id_ecole'];
                $nom=$data['nom_ecole'];
                ?>
                <option value="<?php echo $id;?>"><?php echo "$nom";?></option>
             <?php
            }
    ?>
    </select>
</label>
						 </br>
						 </br>
						 




 						 <button class="btn btn-primary" type="submit">Créer l'équipe</button>
 						 </form>










		</section>
	</center>
	</div>
	</div>
	</div>
	</div>

<?php
require('footer.php');
?>

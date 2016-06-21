<?php
require('head.php');
require('header.php'); 

require('connexion.php');
require('classes/utilisateurs.php');
	
?>


<?php	
	if(!isset($_POST['choix']))
		{
		?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
	            <div class="box-header well">
	                <h2><i class="glyphicon glyphicon-info-sign"></i> Choix du compte &agrave; modifier</h2>

	               <div class="box-icon">
	                     <a href="#" class="btn btn-minimize btn-round btn-default"><i
	                     class="glyphicon glyphicon-chevron-up"></i></a>
	                    
	                </div>
	            </div>
	            <div class="box-content row">		
				<form method="post" action="modifier_compte.php" >
					<table  class="table table-striped table-bordered bootstrap-datatable datatable responsive" >
						<tr><td><label for="administrateur"> Administrateur?</label>  </td><td>	<input 	type="radio" name="choix" value="administrateur" checked /></td></tr>
						<tr><td><label for="gerant"> G&eacute;rant?         </label>  </td><td>	<input 	type="radio" name="choix" value="gerant"/></td></tr>
						<tr><td><label for="tresorier"> Tr&eacute;sorier?   </label>  </td><td>	<input 	type="radio" name="choix" value="tresorier"/></td></tr>
						<tr><td colspan="2"><center><button class="btn btn-primary" type="submit">Valider</button></center></td></tr>
					</table>
				</form>
	       </div>
    </div>
</div>
		
		<?php
		}
	else
		{
		 if(isset($_POST['choix']) AND $_POST['choix']=="administrateur")
			{
			?>

    <div class="box col-md-12">
        <div class="box-inner">
	            <div class="box-header well">
	                <h2><i class="glyphicon glyphicon-info-sign"></i>Modifier le mot de passe administrateur</h2>

	               <div class="box-icon">
	                     <a href="#" class="btn btn-minimize btn-round btn-default"><i
	                     class="glyphicon glyphicon-chevron-up"></i></a>
	                    
	                </div>
	            </div>
		        <div class="box-content row">
				<form  name="formulaire_update" onSubmit="return verification_formulaire_update()" method="post" action="traitement_modifier_compte.php" class="text">
					<table>
						<tr><td><label for="admin1">Entrez le mot de passe actuel de l'administrateur</label> :</td><td> <input type="password" name="pass1" id="pass1"    required/></td></tr>
						<tr><td><label for="admin2">Entrez un nouveau mot de passe pour l'administrateur</label> : </td><td><input type="password" name="pass2" id="pass2" required/></td></tr>
						<tr><td><label for="admin3">Confirmer le mot de passe pour l'administrateur</label> :</td><td> <input type="password" name="pass3" id="pass3"      required/></td></tr>
						<tr><td colspan="2">
							<center>
							<button class="btn btn-danger" type="Reset">Annuler</button>&nbsp&nbsp&nbsp<button class="btn btn-primary" type="submit">Enregistrer</button>
							 </center> 
					</td></tr>
					</table>
					<input type="hidden" name="profil" value="administrateur"/>
				</form>	
		 </div>
    </div>
</div>			
			
			<?php
			}
		 if(isset($_POST['choix']) AND $_POST['choix']=="gerant")
			{
			?>

			<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
	            <div class="box-header well">
	                <h2><i class="glyphicon glyphicon-info-sign"></i> Modifier le mot de passe du g&eacute;rant</h2>

	               <div class="box-icon">
	                     <a href="#" class="btn btn-minimize btn-round btn-default"><i
	                     class="glyphicon glyphicon-chevron-up"></i></a>
	                    
	                </div>
	            </div>
	         <div class="box-content row">
			<form  name="formulaire_update" onSubmit="return verification_formulaire_update()" method="post" action="traitement_modifier_compte.php" class="text">
				<table>
					<tr><td><label for="gerant1">Entrez le mot de passe actuel du g&eacute;rant </label> :</td><td> <input type="password" name="pass1" id="pass1"   required/></td></tr>
					<tr><td><label for="gerant2">Entrez le nouveau mot de passe du g&eacute;rant </label> :</td><td> <input type="password" name="pass2" id="pass2"  required/></td></tr>
					<tr><td><label for="gerant3">Confirmer mot de passe du g&eacute;rant         </label> : </td><td><input type="password" name="pass3" id="pass3"  required/></td></tr>
					<tr><td colspan="2">
							<center>
							 <button class="btn btn-danger" type="Reset">Annuler</button>&nbsp&nbsp&nbsp<button class="btn btn-primary" type="submit">Enregistrer</button>
							 </center> 
					</td></tr>
				</table>
				<input type="hidden" name="profil" value="gerant"/>
			</form>	
		</div>
    </div>
</div>				
			<?php
			}
			else if(isset($_POST['choix']) AND $_POST['choix']=="tresorier")
			{
			?>
			<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
	            <div class="box-header well">
	                <h2><i class="glyphicon glyphicon-info-sign"></i>Modifier le mot de passe du tr&eacute;sorier</h2>

	               <div class="box-icon">
	                     <a href="#" class="btn btn-minimize btn-round btn-default"><i
	                     class="glyphicon glyphicon-chevron-up"></i></a>
	                    
	                </div>
	            </div>
	         <div class="box-content row">
			<form  name="formulaire_update" onSubmit="return verification_formulaire_update()" method="post" action="traitement_modifier_compte.php" class="text" >
				<table>
					<tr><td><label for="tresorier1">Entrez le mot de passe actuel du tr&eacute;sorier</label> :</td><td> <input type="password" name="pass1" id="pass1" required/></td></tr>
					<tr><td><label for="tresorier2">Entrez le nouveau mot de passe du tr&eacute;sorier</label> :</td><td><input type="password" name="pass2" id="pass2" required/></td></tr>
					<tr><td><label for="tresorier3">Confirmer mot de passe du tr&eacute;sorier</label> : </td><td><input type="password" name="pass3" id="pass3"        required/></td></tr>
					<tr><td colspan="2">
							<center>
							  <button class="btn btn-danger" type="Reset">Annuler</button>&nbsp&nbsp&nbsp<button class="btn btn-primary" type="submit">Enregistrer</button>
							 </center> 
					</td></tr>
				</table>
				<input type="hidden" name="profil" value="tresorier"/>
			</form>

		</div>
    </div>
</div>		
			<?php
			}
		}
?>
					
			

<?php require('footer.php'); ?>















	
	
	

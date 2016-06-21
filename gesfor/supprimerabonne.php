<?php
session_start();
require('secure.php');
require('header.php');
include('classes/utilisateurs.php');
include('connexion.php');
?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-edit"></i> suppimer Abonné</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    
                </div>
            </div>
            <div class="box-content row">
		<center>
			<form role='form' action="listeabonnes.php" method='get'>
				<table>
					<tr><td><label>l'identifiant de l'abonné</label></td><td><input type="text" name="id" class="form-control"></td></tr>
				</table><br/><br/><br/>
				<p class="center col-md-5">
					<button class="btn btn-primary" type="submit" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cet abonné?'));">Enregistrer</button>
					<button class="btn btn-default" type="reset">Annuler</button>
				</p>
			</form>
		</center>
			</div>
		</div>
	</div>
</div>


<?php 
require('footer.php');
?>



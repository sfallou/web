<?php
	require('head.php');
	require('header.php');
	require('connexion.php');
 ?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-plus"></i> Nouveau Plan</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    
                </div>
            </div>
            <div class="box-content row">
 <center>
		<section>
								 

						 <form action="traitementPlan.php" method="POST" enctype="multipart/form-data">
						 <h3 style="text-align:center">Entrez le plan</h3>
						 </br>

						 <div class = "texte">

						 <label><input name="plan" type="file" required></label>
 						 </div>



 						 <div class="button"><br><br>
 						 <input  type="submit" value="Envoyer le plan">
        				 </div>
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

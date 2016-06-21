<?php
	require('head.php');
	require('header.php');
	require('connexion.php');
 ?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-plus"></i> Nouveau Calendrier</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    
                </div>
            </div>
            <div class="box-content row">
 <center>
		<section>
				<form action="traitementCalendrier.php" method="POST" enctype="multipart/form-data">
						 <h3 style="text-align:center">Entrez le calendrier</h3>
						 </br>

						 <div class = "texte">

						 <label><input name="calendrier" type="file" required></label>
 						 </div><br><br>

 						 <div class="button">
 						 <input style="width:150px" type="submit" value="Envoyer le calendrier">
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

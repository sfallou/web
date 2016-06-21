<?php 
    require('head.php');
	require('header.php'); 
	require('classes/utilisateurs.php');
	
?>

<div class=" row">
    <div class="col-md-3 col-sm-3 col-xs-6">
		<?php
				$nbr=$bdd->query("SELECT count(*) FROM attente WHERE etat=0");
				$n=$nbr->fetch();
            ?>
        <a data-toggle="tooltip" title="total abonnés <?php echo abonne::nombreAbonne($bdd);?>" class="well top-block" href="<?php if($n[0]==0) echo "listeabonnes.php"; else echo "validerabonne.php";?>">
            <i class="glyphicon glyphicon-user blue"></i>

            <div><br></div>
            <div>Total Abonnés</div>
            <div><?php echo abonne::nombreAbonne($bdd);?></div>
            
            <span class="notification"><?php echo $n[0];?></span>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="consommation totale depuis le debut" class="well top-block" href="#">
            <i class="glyphicon glyphicon-star green"></i>

            <div>Consommation totale</div>
            <div><?php echo recette::consommationTotal($bdd)['volume'];?> cm<sup>3</sup></div>
            <div><?php echo recette::consommationTotal($bdd)['montant'];?> fcfa</div>

        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="Dépense totale effectuée" class="well top-block" href="#">
            <i class="glyphicon glyphicon-shopping-cart yellow"></i>
			<div><br></div>
            <div>Dépense totale</div>
            <div><?php echo recette::etatFinance($bdd)['depense'];?> fcfa</div>
            
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="recette totale" class="well top-block" href="#">
            <i class="glyphicon glyphicon-envelope red"></i>
			<div><br></div>
            <div>recette totale</div>
            <div><?php echo recette::etatFinance($bdd)['recette'];?> fcfa</div>
            
        </a>
    </div>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i> Introduction</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    
                </div>
            </div>
            <div class="box-content row">
                <div class="col-lg-7 col-md-12">
                    <h1>Présentation<br>
                        <small>GFASUFOR</small>
                    </h1>
                    <p><?php echo $texte_accueil;?>.</b></p>

             
               
                <!-- Ads end -->

            </div>
        </div>
    </div>
</div>


<?php require('footer.php'); ?>

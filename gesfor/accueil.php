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
            <?php if($_SESSION['statut']=='administrateur'){ ?>
            <span class="notification"><?php echo $n[0];?></span>
            <?php }?>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="consommation totale depuis le debut" class="well top-block" href="#">
            <i class="glyphicon glyphicon-cutlery green"></i>

            <div>Consommation totale</div>
            <?php $finance=new Finance($bdd)?>
            <div><?php echo $finance->consommationTotal($bdd)['volume'];?> cm<sup>3</sup></div>
            <div><?php echo $finance->consommationTotal($bdd)['facture_total'];?> fcfa</div>

        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="Dépense totale effectuée" class="well top-block" href="#">
            <i class="glyphicon glyphicon-euro yellow"></i>
			<div><br></div>
            <div>Dépense totale</div>
            <div><?php echo Finance::etatFinance($bdd)['depense'];?> fcfa</div>
            
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="recette totale" class="well top-block" href="#">
            <i class="glyphicon glyphicon-envelope red"></i>
			<div><br></div>
            <div>recette totale</div>
            <div><?php echo Finance::etatFinance($bdd)['recette'];?> fcfa</div>
            
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
                <table>
                    <tr>
                        <td>
                                 <h1>Présentation<br>
                                     <small>ASUFOR Séokhaye</small>
                                </h1><center><p><?php echo $texte_accueil;?>.</b></p></center>            
                        </td>
                        <td><img src="img/forage.jpg" width="300px"></td>
                    </tr>
                </table>
                

        </div>
    </div>
</div>


<?php require('footer.php'); ?>

<?php
    /******** a chaque ouverture de la page d'accueil on sauvegarde automatiquement la bdd dans un fichier**********/
    dumpMySQL("127.0.0.1", "root", "passer", "asufor", 3);
?>
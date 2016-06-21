 <?php
session_start();
	require('header.php');
	require('connexion.php');
	require('classes/utilisateurs.php');
 ?>
 
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-user"></i> profil <?php echo $_SESSION['statut'];?></h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                 </div>
            </div>
            <div class="box-content">
                <div class="box-content">
					<?php
						$infosadmin=utilisateur::recupererInformationsUtilisateur($bdd, 10);
						$infosgerant=utilisateur::recupererInformationsUtilisateur($bdd, 3);
						$infostresorier=utilisateur::recupererInformationsUtilisateur($bdd, 1);
						
						if(isset($_GET['id']) and !empty($_GET['id'])){
							if($_GET['id']==1){
					?>
                    <ul class="dashboard-list">
                        <li>
                            <a href="#">
                                <img class="dashboard-avatar" alt="<?php echo $infosadmin['profil'];?>"
                                     src="img/images.jpeg"></a>
                            <strong>Nom:</strong> <a href="#"><?php echo $infosadmin['nom'];?>
                            </a><br>
                            <strong>Prenom:</strong> <a href="#"><?php echo $infosadmin['prenom'];?>
                            </a><br>
                            <strong>Login:</strong> <a href="#"><?php echo $infosadmin['login'];?>
                            </a><br>
                            <strong>Mot de pass:</strong> <a href="#"><?php echo sha1($infosadmin['mdp']);?>
                            </a><a class="btn btn-success mdp" href='#'><i class="glyphicon glyphicon-eye-open"> voir</i></a><br>
                            <strong>Since:</strong><?php echo $infosadmin['date_creation'];?>
                            <br>
                                   
    <div class="modal fade" id="mdp" tabindex="-1" role="dialog" aria-labelledby="suppressions" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Mot de passe</h3>
                </div>
                <div class="modal-body">
                    <p><?php echo $infosadmin['mdp'];?></p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">ok</a>
            
                </div>
            </div>
        </div>
    </div>

                            <strong>Status:</strong> <span class="label-success label label-default"><?php echo $infosadmin['profil'];?></span>
                        </li><?php }
                        if($_GET['id']==2){
                        ?>
                        <li>
                            <a href="#">
                                <img class="dashboard-avatar" alt="<?php echo $infosgerant['profil'];?>"
                                     src="img/images.jpeg"></a>
                            <strong>Nom:</strong> <a href="#"><?php echo $infosgerant['nom'];?>
                            </a><br>
                            <strong>Prenom:</strong> <a href="#"><?php echo $infosgerant['prenom'];?>
                            </a><br>
                            <strong>Login:</strong> <a href="#"><?php echo $infosgerant['login'];?>
                            </a><br>
                            <strong>Mot de pass:</strong> <a href="#"><?php echo sha1($infosgerant['mdp']);?>
                            </a><a class="btn btn-success mdp" href='#'><i class="glyphicon glyphicon-eye-open"> voir</i></a><br>
                            <strong>Since:</strong><?php echo $infosgerant['date_creation'];?><br>
                            <strong>Status:</strong> <span class="label-warning label label-default"><?php echo $infosgerant['profil'];?></span>
                        </li>
<div class="modal fade" id="mdp" tabindex="-1" role="dialog" aria-labelledby="suppressions" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Mot de passe</h3>
                </div>
                <div class="modal-body">
                    <p><?php echo $infosgerant['mdp'];?></p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">ok</a>
            
                </div>
            </div>
        </div>
    </div>

                        <?php }
                        if($_GET['id']==3){
                        ?>
                        <li>
                            <a href="#">
                                <img class="dashboard-avatar" alt="<?php echo $infostresorier['profil'];?>"
                                     src="img/images.jpeg"></a>
                            <strong>Nom:</strong> <a href="#"><?php echo $infostresorier['nom'];?>
                            </a><br>
                            <strong>Prenom:</strong> <a href="#"><?php echo $infostresorier['prenom'];?>
                            </a><br>
                            <strong>Login:</strong> <a href="#"><?php echo $infostresorier['login'];?>
                            </a><br>
                            <strong>Mot de pass:</strong> <a href="#"><?php echo sha1($infostresorier['mdp']);?>
                            </a><a class="btn btn-success mdp" href='#'><i class="glyphicon glyphicon-eye-open"> voir</i></a><br>
                            <strong>Since:</strong><?php echo $infostresorier['date_creation'];?><br>
                            <strong>Status:</strong> <span class="label-info+
                            
                             label label-default"><?php echo $infostresorier['profil'];?></span>
                        </li>
                        <div class="modal fade" id="mdp" tabindex="-1" role="dialog" aria-labelledby="suppressions" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Mot de passe</h3>
                </div>
                <div class="modal-body">
                    <p><?php echo $infostresorier['mdp'];?></p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">ok</a>
            
                </div>
            </div>
        </div>
    </div>

                     </ul><?php } } ?>
                </div>
            </div>
        </div>
    </div>
    <!--/span-->
    <script>
     $('.mdp').click(function (e) {
     e.preventDefault();
     $('#mdp').modal('show');
     });

    </script>
<?php
require('footer.php');
?>


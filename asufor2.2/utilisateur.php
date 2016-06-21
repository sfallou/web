 <?php
session_start();
	require('header.php');
	require('connexion.php');
	require('classes/utilisateurs.php');
 ?>
 
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-user"></i>Activités des utilisateurs</h2>

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
                            </a><br>
                            <strong>Since:</strong><?php echo $infosadmin['date_creation'];?><br>
                            <strong>Status:</strong> <span class="label-success label label-default"><?php echo $infosadmin['profil'];?></span>
                        </li>
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
                            </a><br>
                            <strong>Since:</strong><?php echo $infosgerant['date_creation'];?><br>
                            <strong>Status:</strong> <span class="label-warning label label-default"><?php echo $infosgerant['profil'];?></span>
                        </li>
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
                            </a><br>
                            <strong>Since:</strong><?php echo $infostresorier['date_creation'];?><br>
                            <strong>Status:</strong> <span class="label-error label label-default"><?php echo $infostresorier['profil'];?></span>
                        </li>
                     </ul>
                </div>
            </div>
        </div>
    </div>
    <!--/span-->
<?php
require('footer.php');
?>

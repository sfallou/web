<?php include 'config.php';?>
<!DOCTYPE html>
<html lang="fr">
<head>
 
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Gesfor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="TeamCS@ESP">

    <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">
    <link href="css/charisma-app.css" rel="stylesheet">
    <link href='bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='css/jquery.noty.css' rel='stylesheet'>
    <link href='css/noty_theme_default.css' rel='stylesheet'>
    <link href='css/elfinder.min.css' rel='stylesheet'>
    <link href='css/elfinder.theme.css' rel='stylesheet'>
    <link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='css/uploadify.css' rel='stylesheet'>
    <link href='css/animate.min.css' rel='stylesheet'>

    <!-- jQuery -->
    <script src="bower_components/jquery/jquery.min.js"></script>
    <link rel="shortcut icon" href="img/favicon.ico">

</head>

<body>
<?php if (!isset($no_visible_elements) || !$no_visible_elements) { ?>
    <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="accueil.php"> <img alt="Charisma Logo" src="img/logo20.png" class="hidden-xs"/>
                <span>Séokhaye</span></a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"><?php  if($_SESSION['statut']=='administrateur') echo 'admin';else echo $_SESSION['statut'];?></span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#">Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
            <!-- user dropdown ends -->

            <!-- theme selector starts -->
            <div class="btn-group pull-right theme-container animated tada">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-tint"></i><span
                        class="hidden-sm hidden-xs"> Change Theme </span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" id="themes">
                    <li><a data-value="classic" href="#"><i class="whitespace"></i> Classic</a></li>
                    <li><a data-value="cerulean" href="#"><i class="whitespace"></i> Cerulean</a></li>
                    <li><a data-value="cyborg" href="#"><i class="whitespace"></i> Cyborg</a></li>
                    <li><a data-value="simplex" href="#"><i class="whitespace"></i> Simplex</a></li>
                    <li><a data-value="darkly" href="#"><i class="whitespace"></i> Darkly</a></li>
                    <li><a data-value="lumen" href="#"><i class="whitespace"></i> Lumen</a></li>
                    <li><a data-value="slate" href="#"><i class="whitespace"></i> Slate</a></li>
                    <li><a data-value="spacelab" href="#"><i class="whitespace"></i> Spacelab</a></li>
                    <li><a data-value="united" href="#"><i class="whitespace"></i> United</a></li>
                </ul>
            </div>
            <!-- theme selector ends -->

        </div>
    </div>
    <!-- topbar ends -->
<?php } ?>
<div class="ch-container">
    <div class="row">
        <?php if (!isset($no_visible_elements) || !$no_visible_elements) { ?>

        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">

                    </div>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li class="nav-header">Main</li>
                        <li><a class="ajax-link" href="accueil.php"><i class="glyphicon glyphicon-home"></i><span> accueil</span></a>
                        </li>
                        
                        <li class="accordion">
                            <a class="ajax-link" href="ui.php"><i class="glyphicon glyphicon-user"></i><span> Gestion abonnés </span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a  href="listeabonnes.php"><i class="glyphicon glyphicon-list"> Liste Abonnés</i></a></li>
                                  <?php if($_SESSION['statut']!='tresorier'){ ?>
                                <li><a href="nouveauabonne.php"><i class="glyphicon glyphicon-plus"></i> Nouveau Abonnement</a></li>
                                <li><a href="modifierabonne.php"><i class="glyphicon glyphicon-pencil"></i> Modifier Abonnés</a></li>
                                <?php if($_SESSION['statut']=='administrateur'){ ?>
                                <li><a href="validerabonne.php"><i class="glyphicon glyphicon-check"></i>Valider Abonnement</a></li>
                                <?php }} ?>
                            </ul>
                        </li>
                         <?php if($_SESSION['statut']!='tresorier'){ ?>
                        <li><a class="ajax-link" href="gerer_liste.php"><i class="glyphicon glyphicon-list-alt"> </i><span> Gerer listes</span></a>
                        </li>
                        
                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-eye-open"></i><span> Compteur</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="prelevement.php">Ajouter Index</a></li>
                                <li><a href="modifier_index.php">Modifier Index</a></li>
                                <li><a href="supprimer_index.php">Supprimer Index</a></li>
                            </ul>
                        </li>
                        <?php }?>
                        <li><a class="ajax-link" href="statistique.php"><i class="glyphicon glyphicon-stats"> </i><span> Statistique</span></a>
                        </li>
                        <li class="nav-header">Section finance</li>
                        <li><a class="ajax-link" href="supervision_finance.php"><i class="glyphicon glyphicon-usd"></i><span> Superviser Finance</span></a>
                        </li>
                        <?php if($_SESSION['statut']!='gerant'){ ?>
                        <li><a class="ajax-link" href="enregistrer_depense.php"><i
                                    class="glyphicon glyphicon-euro"></i><span> Save Depenses</span></a></li>
                         <li><a class="ajax-link" href="enregistrer_recette.php"><i
                                    class="glyphicon glyphicon-euro"></i><span> Save Recettes</span></a></li>
                        <?php }?>
                         <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-lock"></i><span> Dettes</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="enregistrer_dette.php">Enregistrer Dette</a></li>
                                <li><a href="supprimer_dette.php">Supprimer Dette</a></li>
                            </ul>
                        </li>
                        
                        <?php if($_SESSION['statut']=='administrateur'){ ?>
                        <li class="nav-header">Administration</li>
                        <li><a class="ajax-link" href="modifiertarif.php"><i
                                    class="glyphicon glyphicon-th"></i><span>Modifier Tarif</span></a></li>
                        <li><a href="supprimerabonne.php"><i class="glyphicon glyphicon-trash"></i><span>Supprimer Abonnés</span></a></li>
                        <li><a class="ajax-link" href="modifier_compte.php"><i
                                    class="glyphicon glyphicon-star"></i><span>Modifier Compte</span></a></li><?php } ?>
                        <li class="nav-header">Plus</li>
                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-print"></i><span>Imprimer</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="imprimer_facture.php">Imprimer Facture</a></li>
                                <li><a href="imprimer_bon.php">Imprimer Bon</a></li>
                            </ul>
                        </li>
                        <li><a href="stat_total.php"><i class="glyphicon glyphicon-stats"></i><span> Les Graphes</span></a>
                        </li>
                        <li><a href="notification.php"><i class="glyphicon  glyphicon-exclamation-sign "></i><span>Notifications</span></a>
                        </li>
                        <li><a href="apropos.php"><i class="glyphicon glyphicon-lock"></i><span>A Propos</span></a>
                        </li>
                        <li><a href="utilisateur.php"><i class="glyphicon  glyphicon-flag"></i><span>Contact</span></a>
                        </li>
                    </ul>
                    
                </div>
            </div>
        </div>
        <!--/span-->
      

        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <?php } ?>

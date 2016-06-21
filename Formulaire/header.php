<?php include 'config.php';?>
<!DOCTYPE html>
<html lang="fr">
<head>
 
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>PE29</title>
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
                <span>PE29 2016</span></a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"><?php  if($_SESSION['statut']=='Administrateur') echo 'admin';else echo $_SESSION['statut'];?></span>
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
                         <?php if($_SESSION['statut']!='Photographe'){ ?> 
                        <li class="accordion">
                            <a class="ajax-link" href="ui.php"><i class="glyphicon glyphicon-user"></i><span>  Ecoles </span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a  href="liste_ecole.php"><i class="glyphicon glyphicon-list"> Liste Ecole</i></a></li>
                                  <?php if($_SESSION['statut']!='Photographe'){ ?>
                                <li><a href="ajouter_ecole.php"><i class="glyphicon glyphicon-plus"></i> Nouvelle Ecole</a></li>
                                <li><a href="modifier_ecole.php"><i class="glyphicon glyphicon-pencil"></i> Modifier Ecole</a></li>
                            </ul>
                        </li>
                        <?php }}?>
                         <?php if($_SESSION['statut']!='Photographe'){ ?>                     
                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-eye-open"></i><span> Equipes </span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a  href="liste_equipes.php"><i class="glyphicon glyphicon-list"> Liste Equipe</i></a></li>
                                  <?php if($_SESSION['statut']!='Photographe'){ ?>
                                <li><a href="nouvelle_equipe.php"><i class="glyphicon glyphicon-plus"></i> Nouvelle Equipe</a></li>
                                <li><a href="modifier_equipe.php"><i class="glyphicon glyphicon-pencil"></i> Modifier Equipe</a></li>
                            </ul>
                        </li>
                        <?php }}?>

                        <?php if($_SESSION['statut']!='Photographe'){ ?>                     
                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-eye-open"></i><span> Matchs </span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a  href="liste_matchs.php"><i class="glyphicon glyphicon-list"> Liste Match</i></a></li>
                                  <?php if($_SESSION['statut']!='Photographe'){ ?>
                                <li><a href="nouveau_match.php"><i class="glyphicon glyphicon-plus"></i> Nouveau Match</a></li>
                                <li><a href="modifier_match.php"><i class="glyphicon glyphicon-pencil"></i> Modifier Match</a></li>
                            </ul>
                        </li>
                        <?php }}?>

                        <?php if($_SESSION['statut']!='Photographe'){ ?>                     
                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-eye-open"></i><span> Match Spécial</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a  href="liste_matchsSpecial.php"><i class="glyphicon glyphicon-list"> Liste MatchsSpecial</i></a></li>
                                  <?php if($_SESSION['statut']!='Photographe'){ ?>
                                <li><a href="nouvelle_matchSpecial.php"><i class="glyphicon glyphicon-plus"></i> Nouveau MatchSpecial</a></li>
                                <li><a href="modifier_matchsSpecial.php"><i class="glyphicon glyphicon-pencil"></i> Modifier MatchSpecial</a></li>

                            </ul>
                        </li>
                        <?php }}?>

                        <?php if($_SESSION['statut']!='Photographe'){ ?>                     
                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-eye-open"></i><span> Infos </span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a  href="liste_infos.php"><i class="glyphicon glyphicon-list"> Liste Infos</i></a></li>
                                  <?php if($_SESSION['statut']!='Photographe'){ ?>
                                <li><a href="nouvelle_info.php"><i class="glyphicon glyphicon-plus"></i> Nouvelle Info</a></li>
                                <li><a href="modifier_info.php"><i class="glyphicon glyphicon-pencil"></i> Modifier Info</a></li>
                            </ul>
                        </li>
                        <?php }}?>

                                             
                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-eye-open"></i><span> Photos </span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a  href="liste_photos.php"><i class="glyphicon glyphicon-list"> Liste Photo</i></a></li>
                                <li><a href="nouvelle_photo.php"><i class="glyphicon glyphicon-plus"></i> Nouvelle Photo</a></li>
                            </ul>
                        </li>
                       

                         <?php if($_SESSION['statut']!='Photographe'){ ?>                     
                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-eye-open"></i><span> Urgences </span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a  href="liste_urgences.php"><i class="glyphicon glyphicon-list"> Liste Urgence</i></a></li>
                                  <?php if($_SESSION['statut']!='Photographe'){ ?>
                                <li><a href="nouvelle_urgence.php"><i class="glyphicon glyphicon-plus"></i> Nouvelle Urgence</a></li>
                                 <li><a href="modifier_urgence.php"><i class="glyphicon glyphicon-pencil"></i> Modifier Urgence</a></li>
                            </ul>
                        </li>
                        <?php }}?>  

                        <?php if($_SESSION['statut']!='Photographe'){ ?>                     
                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-eye-open"></i><span> FAQ </span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a  href="liste_faqs.php"><i class="glyphicon glyphicon-list"> Liste FAQ</i></a></li>
                                  <?php if($_SESSION['statut']!='Photographe'){ ?>
                                <li><a href="nouvelle_faq.php"><i class="glyphicon glyphicon-plus"></i> Nouvelle FAQ</a></li>
                                 <li><a href="modifier_faq.php"><i class="glyphicon glyphicon-pencil"></i> Modifier FAQ</a></li>
                            </ul>
                        </li>
                        <?php }}?>     

                        <?php if($_SESSION['statut']!='Photographe'){ ?>                     
                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-eye-open"></i><span> Plan </span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a  href="liste_plans.php"><i class="glyphicon glyphicon-list"> Liste Plan</i></a></li>
                                  <?php if($_SESSION['statut']!='Photographe'){ ?>
                                <li><a href="nouvelle_plan.php"><i class="glyphicon glyphicon-plus"></i> Nouveau Plan</a></li>
                            </ul>
                        </li>
                        <?php }}?>  


                        <?php if($_SESSION['statut']!='Photographe'){ ?>                     
                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-eye-open"></i><span> Calendrier </span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a  href="liste_calendriers.php"><i class="glyphicon glyphicon-list"> Liste Calendrier</i></a></li>
                                  <?php if($_SESSION['statut']!='Photographe'){ ?>
                                <li><a href="nouvelle_calendrier.php"><i class="glyphicon glyphicon-plus"></i> Nouveau Calendrier</a></li>
                            </ul>
                        </li>
                        <?php }}?>                       
                        
                        <?php if($_SESSION['statut']=='Administrateur'){ ?>                     
                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-eye-open"></i><span> User </span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a  href="liste_users.php"><i class="glyphicon glyphicon-list"> Liste Users</i></a></li>
                                  <?php if($_SESSION['statut']=='Administrateur'){ ?>
                                <li><a href="nouvelle_user.php"><i class="glyphicon glyphicon-plus"></i> New User</a></li>
                                <li><a href="modifier_user.php"><i class="glyphicon glyphicon-pencil"></i> Modifier User</a></li>
                            </ul>
                        </li>
                        <?php }}?> 

                    </ul>
                    
                </div>
            </div>
        </div>
        <!--/span-->
      

        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <?php 
        } ?>

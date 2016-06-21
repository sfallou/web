<?php 
session_start();
require_once ('header.php'); 
require_once ('connexion_bd.php');
require_once ('classes/Statistique.php' );

//========...Recuperation de donnees......==============
$date_limite1=$_POST['date1'];
$date_limite2=$_POST['date2'];
$timestamp2=strtotime($date_limite2);
$timestamp1=strtotime($date_limite1);

?>
 <html>
 <head>
    <title>Gestion des listes</title>
  </head>
<body>

        <div>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="#">Listes</a>
                </li>
            </ul>
        </div>
         <div class="row">
        <div class="box col-md-6 col-md-offset-2">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <center><h2 class="text">Tableau des statistiques (Consommation)</h2></center>

                    <div class="box-icon">
                        <a href="#" class="btn btn-setting btn-round btn-default"><i
                                class="glyphicon glyphicon-cog"></i></a>
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a>
                       
                    </div>
                </div>
                <div class="box-content">
                        <center>
                            <?php include("statistique1.php") ;?>
                        </center>
                
                </div>
            </div>
        </div>
        <!--/span-->
        <div class="row">
            <div class="box col-md-12 tour">
                <div class="box-inner"><center>
                    <div class="box-header well" data-original-title="">
                        <h2 clsass="text" ><i class="glyphicon glyphicon-globe"></i>Etat des Listes </h2>

                        <div class="box-icon">
                            <a href="#" class="btn btn-setting btn-round btn-default"><i
                                    class="glyphicon glyphicon-cog"></i></a>
                            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                        </div>
                    </div></center>
                <div class="row content">
                <div class="col-xs-8 col-xs-offset-2">
                    <ul class="nav nav-tabs"><!--creation de barre navigationnele-->
                        <li><a href="#one"   data-toggle="tab">Liste Totale</a></li>
                        <li><a href="#two"   data-toggle="tab">Liste Verte</a></li>
                        <li><a href="#three" data-toggle="tab">Liste Rouge</a></li>
                        <li><a href="#four"  data-toggle="tab">Liste des suspendus</a></li>
                    </ul>   
                    <div class="tab-content"><!-- liste totale -->
                        <div id="one"   class="tab-pane ">
                            <?php include("liste_totale.php") ;?> 
                        </div>
                        <div id="two"   class="tab-pane ">
                            <div class="row  content "><!-- liste verte -->
                              <?php include("liste_verte.php") ;?>
                            </div>     
                        </div>
                        <div id="three" class="tab-pane"><!-- liste rouge-->
                           <div>
                               <?php include("liste_rouge.php") ;?>
                           </div>
                        </div>  
                        <div id="four"  class="tab-pane">
                            <div>
                                <?php include("liste_suspendu.php") ;?>
                            </div>
                        </div>
                    </div>  
                </div>
            </div><!-- row content-->
        </div>
    </div>
            <!--/span-->
    </div><!--/row-->
</body>    
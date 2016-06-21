<?php 
require('head.php');
 require('header.php');
 require('connexion.php');
 require('classes/utilisateurs.php');
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
                <div class="box-content" >
                        <center>
                            <?php include("statistique1.php") ;?>
                        </center>
                
                </div>
            </div>
        </div>
        
                        <?php include("liste_totale.php") ;?> 
             
</div>
</body> 
 
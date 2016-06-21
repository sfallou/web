<?php 
    require('head.php');
    require('header.php'); 
    require('classes/utilisateurs.php');
    $id_abonne=$_POST['id_abonne'];
    $ancien_index=$_POST['ancien_index'];
    $date_ancienIndex=$_POST['date_lastIndex'];
    $nouvel_index=$_POST['nouvel_index'];
    $mois=$_POST['mois'];
    $annee=$_POST['annee'];
    $abn=new abonne($_POST['id_abonne']);
    $cpteur=new Compteur($bdd,$_POST['id_abonne']);
   /** on rcupère les infos de l'abonné***/
   $infoAbonn=$abn->recuperInformationsAbonne($bdd);
   $adresse=$infoAbonn['adresse'];
   /*************************************/
   $jr=date('d');
   $dateToday="$annee-$mois-$jr";
   $special=0;
   if($adresse=="village_special")  
        $special=1;
   if($nouvel_index>=$ancien_index AND $dateToday>$date_index){
       $cpteur->saveIndex($ancien_index,$nouvel_index,$dateToday,$special);
           ?>
           <script language="JavaScript">
               alert("Inex Enregistre avec succes!!");
               window.location.replace("prelevement.php");
             </script>
          <?php
    }
   else{
       ?>
        <script language="JavaScript">
            alert("Echec Enregistrement!!! Nouvel index doit etre superieur ou egal a ancien index. Date prelevement doit etre superieure a la date du dernier prelevement!!");
            window.location.replace("prelevement.php");
       </script>
        <?php
        }
        
 ?>

 
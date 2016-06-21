<?php 
    require('head.php');
	require('header.php'); 	
?>

<div class=" row">
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="challenger" class="well top-block" href="#">
            <i class="glyphicon glyphicon-user blue"></i>
            <div>Challenger</div>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="club photo" class="well top-block" href="#">
            <i class="glyphicon glyphicon-user green"></i>

            <div>Photographe</div>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="informateur" class="well top-block" href="#">
            <i class="glyphicon glyphicon-user yellow"></i>
            <div>Informateur</div>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="Administrateur" class="well top-block" href="#">
            <i class="glyphicon glyphicon-user red"></i>
            <div>Administrateur</div>
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
                                 <h1>Accueil<br>
                                     <small>Challenge</small>
                                </h1><center><p>
                                    Le Challenge Centrale Lyon est le plus grand rassemblement sportif des écoles d'ingénieurs d'Europe.
Chaque année, 3000 étudiants de plus de 30 écoles s'affrontent dans une vingtaine de sports différents, du Basketball au Ski, en passant par du Waterpolo ou de l'escrime.
Cette année, l'application Challenge ECL vous permet de suivre toute l'actualité du weekend: programmation, résultats, classements mais elle vous permet aussi de retrouver des infos pratiques ainsi que des plans et une galerie.
Que ce soit en tant que sportif ou participant, l'application Challenge ECL sera votre compagnon idéal !
                                </b></p></center>            
                        </td>
                        <td><img src="img/logo_challenge.png" width="300px"></td>
                    </tr>
                </table>
                

        </div>
    </div>
</div>


<?php require('footer.php'); ?>

<?php
    /******** a chaque ouverture de la page d'accueil on sauvegarde automatiquement la bdd dans un fichier**********/
    dumpMySQL("localhost", "root", "passer", "challenge2016", 3);
?>
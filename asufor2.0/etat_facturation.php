<?php 
    require('head.php');
	require('header.php'); 
	
	$adresse=$_SESSION['adresse'];
	$mois=$_SESSION['mois'];
	$annee=$_SESSION['annee'];
	$moiss=$_SESSION['moiss'];

?>
         <h2><i class="glyphicon glyphicon-list-alt"></i><?php echo"  $adresse: $moiss $annee";?></h2>

          
                    <div class="box-header well" data-original-title="">
                        <h2 clsass="text" ><i class="glyphicon glyphicon-globe"></i>Gestion des Listes </h2>

                        <div class="box-icon">
                            <a href="#" class="btn btn-setting btn-round btn-default"><i
                                    class="glyphicon glyphicon-cog"></i></a>
                            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                        </div>
                    </div>
                <div class="row content">
                <div class="col-xs-8 col-xs-offset-2">
                    <ul class="nav nav-tabs"><!--creation de barre navigationnele-->
                        <li><a href="#one"   data-toggle="tab">Liste Rouge</a></li>
                        <li><a href="#two" data-toggle="tab">Liste Verte</a></li>
                        <li><a href="#three"  data-toggle="tab">Liste des suspendus</a></li>
                    </ul>   
                    <div class="tab-content">
                        <div id="one"   class="tab-pane ">
                            <div class="row  content ">
                             <?php include("rouge.php");?>
                            </div>     
                        </div>
                        <div id="two" class="tab-pane">
                           <div class="row  content ">
                              <?php include("verte.php");?>
                           </div>
                        </div>
                        <div id="three" class="tab-pane">
                           <div class="row  content ">
                              <?php include("suspendu.php");?>
                           </div>
                        </div>    
                        
                    </div>  
                </div>
            </div><!-- row content-->
     
<?php require('footer.php'); ?>



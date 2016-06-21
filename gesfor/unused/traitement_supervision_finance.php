<?php 
require('head.php');
require('header.php'); 
//require('classes/utilisateurs.php');
	

$time1=$_POST['date1'];
$time2=$_POST['date2'];
$timestamp1=strtotime($time1);
$timestamp2=strtotime($time2);
?>
         <h2><i class="glyphicon glyphicon-euro"></i><?php echo": Etat Finance entre le ". changedate1($time1)." et le ". changedate1($time2);?></h2>

          
                    <div class="box-header well" data-original-title="">
                        <h2 clsass="text" ><i class="glyphicon glyphicon-globe"></i>  La Finance </h2>

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
                        <li><a href="#one"   data-toggle="tab">Depenses</a></li>
                        <li><a href="#two" data-toggle="tab">Recettes</a></li>
                        <li><a href="#three"  data-toggle="tab">Bilan</a></li>
                    </ul>   
                    <div class="tab-content">
                        <div id="one"   class="tab-pane ">
                            <div class="row  content ">
                             <?php include("consulter_depense.php");?>
                            </div>     
                        </div>
                        <div id="two" class="tab-pane">
                           <div class="row  content ">
                              <?php include("consulter_recette.php");?>
                           </div>
                        </div>
                        <div id="three" class="tab-pane">
                           <div class="row  content ">
                              <?php include("bilan.php");?>
                           </div>
                        </div>    
                        
                    </div>  
                </div>
            </div><!-- row content-->
     
<?php require('footer.php'); ?>

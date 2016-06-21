<?php 
session_start();

require('header.php'); ?>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Statistique</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-8 col-md-offset-2">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
              <h2 > Choisir une période de consultation des statistiques</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">
                <div class="row ">
                    <div class="col-lg-8 col-lg-offset-2" >
                      <center> <table  class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                                <tr class="success" >
                                    <td  colspan="2"  style="border-radius:20px">
                                        <form  method="post" action="traitement_historique1.php">
                                            <fieldset>
                                                 <center><legend>Période</legend>
                                                <label for="date1"> DU </label><input type="date" name="date1"    required />&nbsp&nbsp&nbsp
                                                <label for="date2"> AU </label><input type="date" name="date2"  c  required /><br/><br/>
                                              <button class="btn btn-large btn-primary" type="submit">Valider</button></center>  
                                            </fieldset>
                                        </form> 
                                    </td>
                                </tr>
                        </table> </center>                      
                    </div>
                    
                </div>
                <!--/row -->

            </div>
        </div>
    </div>
    <!--/span-->
    <div class="box col-md-6">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2 >Nombre d'abonn&eacute;s par village</h2>
            </div>
            <div class="box-content">
                <?php include("total_abonne.php");?>
            </div>
        </div>
    </div>
    <!--/span-->

    <div class="box col-md-6">
        <div class="box-inner">
            <div class="box-header well">
                <h2>Consommation totale depuis le d&eacute;but</h2>
            </div>
            <div class="box-content">
             <center> <?php include("total_consommation.php"); ?></center>
            </div>
        </div>
    </div><br /><br />
    <!--/span-->

    <div class="box col-md-6">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2>Etat finance depuis le d&eacute;but</h2>
            </div>
            <div class="box-content">
               <center><?php include("total_consommation1.php"); ?></center>
            </div>
        </div>
    </div>
    <!--/span-->


</div><!--/row-->



<?php 
session_start();

require('header.php'); ?>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Typography</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
               <center> <h2 >Choisir une période de consultation des statistiques</h2></center>

                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">
                <div class="row ">
                    <div class="col-md-12">
                        <table  class="tab">
                                <tr>
                                    <td class="text" colspan="2"  style="border-radius:20px">
                                        <form name="formulaire_finance" onSubmit="return verification_formulaire()"  method="post" action="traitement_historique.php">
                                            <fieldset>
                                                <legend>Période</legend>
                                                <label for="date1"> DU </label><input type="text" name="date1"   class="calendrier" />&nbsp&nbsp&nbsp
                                                <label for="date2"> AU </label><input type="text" name="date2"  class="calendrier"  /><br/><br/>
                                                <input type="submit" value="VALIDER" class="btn" style="margin-left:160px"/>   
                                            </fieldset>
                                        </form> 
                                    </td>
                                </tr>
                        </table>                       
                    </div>
                    
                </div>
                <!--/row -->

            </div>
        </div>
    </div>
    <!--/span-->
    <div class="box col-md-5">
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

    <div class="box col-md-5">
        <div class="box-inner">
            <div class="box-header well">
                <h2>Consommation totale depuis le d&eacute;but</h2>
            </div>
            <div class="box-content">
               <?php include("total_consommation1.php"); ?>
            </div>
        </div>
    </div>
    <!--/span-->

    <div class="box col-md-6">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2>Etat finance depuis le d&eacute;but</h2>
            </div>
            <div class="box-content">
                <?php include("total_consommation1.php"); ?>
            </div>
        </div>
    </div>
    <!--/span-->


</div><!--/row-->



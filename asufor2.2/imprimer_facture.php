<?php 
 require('head.php');
 require('header.php');
 require('connexion.php');
 require('classes/utilisateurs.php');
  require('classes/Statistique.php' );
    ?>

<div class="row">
    <div class="box col-md-8 col-md-offset-2">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
              <h2 > Choisir une période pour imprimer les factures</h2>

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
                                <tr  >
                                    <td  colspan="2"  style="border-radius:20px">
                                        <form  method="post" action="totale_facture.php"  class="row" style ='background-color: #3ba6cb;'>
                                            <fieldset>
                                                 <center><legend>Période</legend>
                                                <label for="date1"> DU </label><input type="date" name="date1"    required />&nbsp&nbsp&nbsp
                                                <label for="date2"> AU </label><input type="date" name="date2"   required /><br/><br/>
                                              <button class="btn btn-large btn-primary" type="submit">Valider</button></center>  
                                            </fieldset>
                                        </form> 
                                    </td>
                                </tr>
                        </table> </center>                      
                    </div>
                    
                </div>
                
    </div>
    <!--/span-->


</div><!--/row-->
</div>
</div>


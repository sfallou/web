<?php
require("header.php");
?>
	<body>


<div class="row">
    <div class="box col-md-8 col-md-offset-2">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
              <h2 > Choisir une période pour imprimer l'ensemble des factures de cette période</h2>

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
                                        <form name="formulaire_finance"  method="post" action="totale_facture.php">
                                            <fieldset>
                                                 <center><legend>Période de Facturaion</legend>
                                                <label for="date1"> DU </label><input type="date" name="date1"   class="calendrier" required />&nbsp&nbsp&nbsp
                                                <label for="date2"> AU </label><input type="date" name="date2"  class="calendrier"  required /><br/><br/>
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
      <br /><br />
        <!-- Impression bon de coupure -->
        <div class="row">
        <div class="box col-md-8 col-md-offset-2">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
              <h2 >Imprimer un bon d' abonnement</h2>

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
                                        <form name="formulaire_finance"  method="post" action="bon_abonnement2.php">
                                            <fieldset>
                                                 <center><legend> Bon d'abonnement </legend>
                                             <label for="id_abonne">ID abonné</label> <input type="text" name="id_abonne" required />
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
	</body>
</html>
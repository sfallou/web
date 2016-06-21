<?php 
    require('head.php');
    require('header.php'); 
    require('classes/utilisateurs.php');
?>
<div class="box-header well" data-original-title="">
    <h2><i class="glyphicon glyphicon-edit"></i> Imprimer le bon d'abonnement d'un abonné</h2>
    <div class="box-icon">
        <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
        
    </div>
</div>

<center>
<form role='form' method="post" action="bon_abonnement2.php">
    <table>
               <tr>
                 <td>Veullez saisir l'ID de l'abonné</td><td><input type="number" name="id_abonne" class="form-control" required/></td>
                </tr>
            </table>                                                                               
        <p class="center col-md-5"><button class="btn btn-primary" type="submit">Valider</button>
    </form> 
</center>
 
<?php require('footer.php'); ?>




<?php 
    require('head.php');
    require('header.php'); 
    require('classes/utilisateurs.php');
   
if(isset($_POST['id_abonne']) and !empty($_POST['id_abonne'])){
        $id_abonne=$_POST['id_abonne'];
        $abn=new abonne($id_abonne);
        $cpteur=new Compteur($bdd,$id_abonne);
        /******** on récupere les info du dernier prelevement*******/
        $info=$cpteur->getLastIndex();

        /*************************************/
        $lastIndex=$info['lastIndex'];
        $date_lastIndex=$info['date_index'];
        $etat_lastIndex=$info['etat'];
        if($lastIndex==NULL){
             ?>
    <script language="JavaScript">
    alert("Cet abonné n'existe pas !");
    window.location.replace("prelevement.php");// On inclut le formulaire d'identification
    </script>
    <?php   
    }
              
        ?>
        <form role='form' method="post" action="traitement_prelevement.php">
    <table class="table">
            <tr><th>ID abonné</th><th>Ancien index</th><th>Date Ancien index</th><th>Nouvel index</th><th>Mois</th><th>Année</th></tr>
                <tr>
                 <td><?php echo "$id_abonne";?><input type="hidden" name="id_abonne" value='<?php echo "$id_abonne";?>' class="form-control"/></td>
                 <td><?php echo "$lastIndex";?><input type="hidden" name="ancien_index" value='<?php echo "$lastIndex";?>' class="form-control"/></td>
                 <td><?php echo changedate1($date_lastIndex);?><input type="hidden" name="date_lastIndex" value='<?php echo "$date_lastIndex";?>' class="form-control"/></td>
                <td><input type="number" name="nouvel_index"   class="form-control" required /></td>
                <td><select name="mois" class="form-control">
                    <option value="01">Janvier</option>
                    <option value="02">Février</option>
                    <option value="03">Mars</option>
                    <option value="04">Avril</option>
                    <option value="05">Mai</option>
                    <option value="06">Juin</option>
                    <option value="07">Juillet</option>
                    <option value="08">Août</option>
                    <option value="09">Septembre</option>
                    <option value="10">Octobre</option>
                    <option value="11">Novembre</option>
                    <option value="12">Décembre</option>
                    </select>
                </td>
                <td><input type="number" name="annee"  value="2015" class="form-control" required /></td>
                
                </tr>
            </table>                                                                               
        <p class="center col-md-5"><button class="btn btn-primary" type="submit">Valider</button>
    </form> 
    <?php         
    }
else{
?>
<div class="box-header well" data-original-title="">
    <h2><i class="glyphicon glyphicon-edit"></i> Enregistrer les prélèvements d'un abonné</h2>
    <div class="box-icon">
        <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
        
    </div>
</div>

<center>
<form role='form' method="post" action="prelevement.php">
    <table>
               <tr>
                 <td>Veullez saisir l'ID de l'abonné</td><td><input type="number" name="id_abonne" class="form-control" required/></td>
                </tr>
            </table>                                                                               
        <p class="center col-md-5"><button class="btn btn-primary" type="submit">Valider</button>
    </form> 
</center>
    <?php 
} 
?>
<?php require('footer.php'); ?>




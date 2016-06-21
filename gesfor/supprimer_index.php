<?php 
    require('head.php');
    require('header.php'); 
    require('classes/utilisateurs.php');
   
if(isset($_POST['id_compteur']) and !empty($_POST['id_compteur'])){
        $id_compteur=$_POST['id_compteur'];
        Compteur::supprimerCompteur($bdd,$id_compteur);
        /******** on récupere les info du dernier prelevement*******/     
        ?>
       <script language="JavaScript">
        alert("Suppression effectuee avec succes!!!");
        window.location.replace("accueil.php");
        </script>
    <?php         
    }

else{
?>
<div class="box-header well" data-original-title="">
    <h2><i class="glyphicon glyphicon-edit"></i> Supprimer un prélèvement </h2>
    <div class="box-icon">
        <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
        
    </div>
</div>

<center>
<form role='form' method="post" action="supprimer_index.php">
    <table>
               <tr>
                 <td>Veullez saisir le n° du Compteur</td><td><input type="number" name="id_compteur" class="form-control" required/></td>
                </tr>
            </table>                                                                               
        <p class="center col-md-5"><button class="btn btn-primary" type="submit" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cet abonné?'));">Valider</button>
    </form> 
</center>
    <?php 
} 
?>
<?php require('footer.php'); ?>





    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i>Liste des Abonnés</h2>

        <div class="box-icon">
        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
        </div>
    </div>
    <div class="box-content">
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>identifiant</th>
        <th>nom</th>
        <th>prenom</th>
        <th>téléphone</th>
        <th>adresse</th>
        <th>action</th>
    </tr>
    </thead>
    <tbody>
        <?php 
            $req=$bdd->prepare("SELECT * FROM abonne ORDER BY id_abonne");
            $req->execute(); 
            while($donnees=$req->fetch() )
                {
                    $prenom=$donnees['prenom'];
                    $nom=$donnees['nom'];
                    $tel=$donnees['telephone'];
                    $cni=$donnees['cni'];
                    $adresse=$donnees['adresse'];
                    $id_abonne=$donnees['id_abonne'];
                    $etat=$donnees['etat'];
                    $etat="$etat";
                    
        ?>
    <tr>
        <td><?php echo $don['id_abonne'];?></td>
        <td class="center"><?php echo $donnees['nom'];?></td>
        <td class="center"><?php echo $donnees['prenom'];?></td>
        <td class="center"><?php echo $donnees['telephone'];?></td>
        <td class="center"><?php echo $donnees['etat'];?></td>
        <td class="center"><?php echo $donnees['cni'];?></td>
        <td class="center">
            <span class="center"><?php echo $donnees['adresse'];?></span>
        </td>
    </tr>
    <?php } ?>
    </tbody>
    </table>

<?php require('footer.php'); ?>
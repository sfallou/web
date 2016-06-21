<?php 
	require('head.php');
	include('connexion.php');
	require('header.php');

    function supprimerFaq($bdd,$id_faq){
        $req=$bdd->prepare("DELETE FROM Faq where id_question=:n1");
        $req->execute(array(':n1'=>$id_faq));
    }
    
if(isset($_GET['id_faq']) and !empty($_GET['id_faq'])){
        supprimerFaq($bdd,$_GET['id_faq']);
       
        ?>
    <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>succes!</strong>Supprimée avec succes.
     </div><?php }
?>
    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i>Liste des FAQs</h2>

        <div class="box-icon">
        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
        </div>
    </div>
    <div class="box-content">
		<?php
				$req=$bdd->query('SELECT * from Faq');
		?>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" >
    <thead>
    <tr>
        <th>id</th>
        <th>thème</th>
        <th>question</th>
        <th>réponse</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
		<?php 
			while($don=$req->fetch()){
        ?>
    <tr>
        <td><?php echo $don['id_question'];?></td>
        <td class="center"><?php echo $don['titre'];?></td>
        <td class="center"><?php echo $don['question'];?></td>
        <td class="center">
            <span class="center"><?php echo $don['reponse'];?></span>
        </td>
        <td class="center">
            <a class="btn btn-info" href="modifier_faq.php?id_faq=<?php echo $don['id_question'];?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                modifier
            </a>
            <a class="btn btn-danger orange" href="liste_faqs.php?id_faq=<?php echo $don['id_question'];?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer ceci ?'));">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Supprimer
            </a>

        </td>
    </tr>
    <?php } $req=null; ?>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    <!--/span-->

    </div><!--/row-->

<?php require('footer.php'); ?>

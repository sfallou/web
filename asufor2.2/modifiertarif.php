<?php
	session_start();
	require('header.php');
	require('connexion.php');
	require('classes/utilisateurs.php');
	?>
	<div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i>Modification du tarif</h2>

        <div class="box-icon">
        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
        </div>
    </div>
    <div class="box-content">
		<?php
		
				$req=$bdd->query('SELECT * from tarif where id_tarif=1');
				$don=$req->fetch();
				$req2=$bdd->query('SELECT * from tarif where id_tarif=2');
				$don2=$req2->fetch();
	if(isset($_GET['code']) and !empty($_GET['code'])){
		if(isset($_POST['newtarif']) and !empty($_POST['newtarif'])){
		$req=$bdd->prepare('UPDATE tarif SET montant_tarif=:n1 WHERE id_tarif=:n2');
		$res=$req->execute(array(
			':n1'=>$_POST['newtarif'],
			':n2'=>$_GET['code']
		));
			?>
			<div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>succes!</strong>le tarif a été modifier avec succes.
			</div>
			<a class="btn btn-success" href="modifiertarif.php">
                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                retour
            </a>
		
		<?php
		
	}
	else{?>
	
	<center>
	<form role="form" method="post" action="">
	<table>
		<tr>
			<td><label>Nouveau Tarif</label></td><br/>
			<td><input type="number" name="newtarif" class="form-class"></td><br/>
		</tr>
		<tr>
			<td><br/></td>
			<td><br/></td>
		</tr>
	</table>
	<button type="submit"class="btn btn-primary">Enrégistrer</button>
	<a href="modifiertarif.php" class="btn btn-default">Annuler</a>
	</form>
	</center>
<?php }
	}
else{
?>

    <table class="table responsive">
    <thead>
    <tr>
        <th>tarifs</th>
        <th>montant</th>
        <th>date de changement</th>
        <th>action</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>tarif normal</td>
        <td class="center"><?php echo $don['montant_tarif'];?></td>
        <td class="center"><?php echo $don['date_tarif'];?></td>
                <td class="center">
            <a class="btn btn-info" href="modifiertarif.php?code=1">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                modifier
            </a>           
        </td>
    </tr>
    <tr>
        <td>tarif spécial</td>
        <td class="center"><?php echo $don2['montant_tarif'];?></td>
        <td class="center"><?php echo $don2['date_tarif'];?></td>
                <td class="center">
            <a class="btn btn-info" href="modifiertarif.php?code=2">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                modifier
            </a>           
        </td>
    </tr>
    </tbody>
    </table>
   </div>
   </div>
    </div>
    <!--/span-->

    </div><!--/row-->
    </div><!--/row-->


<?php }
require('footer.php');
?>

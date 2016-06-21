<?php 
    require('head.php');
	require('header.php'); 
	require('classes/utilisateurs.php');
	
?>

<div class="box-header well" data-original-title="">
    <h2><i class="glyphicon glyphicon-edit"></i> Supervision de l'etat des Finances</h2>
    <div class="box-icon">
        <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
        
    </div>
</div>
<center><h2>Choisir la periode de supervision</h2></center>
<form  role="form" method="post" action="traitement_supervision_finance.php">
	<table class="table">
				<tr>
					<td>DU <input type="date" name="date1" class="form-control" required  /></td>
					<td>AU<input type="date" name="date2"class="form-control" required  /></td>
				</tr>
	</table>																		       
	<p class="center col-md-5"><button class="btn btn-primary" type="submit">Valider</button>
</form><br/>
	
<?php require('footer.php'); ?>













<?php
require("head.php");
if ($_SESSION['connect']!=1)
{
?>
<script language="JavaScript">
		alert("Merci de vouloir vous identifier d'abord!!!");
		window.location.replace("index.php");// On inclut le formulaire d'identification
		</script>
<?php
}
?>
	<body>
		<table border="1" width="80%" height="50%" align="center" cellspacing="10">
			<?php require("banniere.php");?>
			<tr>
				<td width="200" height="500" align="center" valign="top" ><div class="profil"><?php echo strtoupper($_SESSION['profil']);?></div><br/> <?php if($_SESSION['profil']=="gerant"){ include("menu2_gerant.php");} else if($_SESSION['profil']=="administrateur"){ include("menu2_admin.php");} else if($_SESSION['profil']=="tresorier"){ include("menu2_tresorier.php");}?></td>
				<td align="center" align="center" valign="top">
					<center><h2 class="text">Supervision-Finance</h2></center>
					<table border="0" class="tab">
						<tr>
							<td class="text">
								
				
					<form  name="formulaire_finance" onSubmit="return verification_formulaire()" method="post" action="traitement_supervision_finance.php">
						<fieldset><legend>Periode</legend>
							<br/><label for="date1">DU</label> <input type="text" name="date1" id="date1" class="calendrier" value="<?php echo$date1;?>" />
							<label for="date2">AU</label> <input type="text" name="date2" id="date2" class="calendrier" value="<?php echo$date2;?>" />
							<br/><br/><center><input type="submit" value="Valider" /></center>
						</fieldset>
					</form><br/>
							</td>
						</tr>
					</table>  
					
				</td>
			</tr>
			
		</table>
	</body>
</html>

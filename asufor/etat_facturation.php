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
	$adresse=$_POST['adresse'];
	$mois=$_POST['mois'];
	$annee=$_POST['annee'];
	$moiss=convert_mois($mois);
?>
	<body>
		<table border="1" width="80%" height="50%" align="center" cellspacing="10">
			<?php require("banniere.php");?>
			<tr>
				<td width="200" height="500" align="center" valign="top" ><div class="profil"><?php echo strtoupper($_SESSION['profil']);?></div><br/> <?php if($_SESSION['profil']=="gerant"){ include("menu2_gerant.php");} else if($_SESSION['profil']=="administrateur"){ include("menu2_admin.php");} else if($_SESSION['profil']=="tresorier"){ include("menu2_tresorier.php");}?></td>
				<td align="center" align="center" valign="top">
				<?php
					if($_SESSION['profil']!="tresorier")
					{
				?>
					<center><h2 class="text">Gestion de la Facturation</h2></center>
					<table border="0" class="tab">
						<tr>
						<td width="100px"><a class='link' onclick="showdiv('1ieme'); " href="#">Liste Verte</a> </td>
						<td width="100px"><a class='link' onclick="showdiv('2ieme'); " href="#">Liste Rouge</a></td>
						<td width="150px"><a class='link' onclick="showdiv('3ieme'); " href="#">Liste des Suspendus</a> </td>
						</tr>
					</table>
					<table border="1" >
						<tr>
						<td >
						<div id="1ieme"   style="display: none;"><?php include("verte.php");?></div>
						<div id="2ieme"   style="display: none;"><?php include("rouge.php");?></div>
						<div id="3ieme"   style="display: none;"><?php include("suspendu.php");?></div>
						</td>
						</tr>
					</table>
					<?php
					}
					?>	
				</td>
			</tr>
		</table>
	</body>
</html>

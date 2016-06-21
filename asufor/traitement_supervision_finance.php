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
$time1=$_POST['date1'];
$time2=$_POST['date2'];
$timestamp1=strtotime($time1);
$timestamp2=strtotime($time2);
?>
	<body>
		<table border="1" width="80%" height="50%" align="center" cellspacing="10">
			<?php require("banniere.php");?>
			<tr>
				<td width="200" height="500" align="center" valign="top" ><div class="profil"><?php echo strtoupper($_SESSION['profil']);?></div><br/> <?php if($_SESSION['profil']=="gerant"){ include("menu2_gerant.php");} else if($_SESSION['profil']=="administrateur"){ include("menu2_admin.php");} else if($_SESSION['profil']=="tresorier"){ include("menu2_tresorier.php");}?></td>
				<td align="center" align="center" valign="top">
					<center><h2 class="text">Etat des finances entre le <?php echo changedate1($time1); ?> et le <?php echo changedate1($time2); ?> </h2></center>
					<table border="0" class="tab">
						<tr>
						<td width="60px"><a class='link' onclick="showdiv('1ieme'); " href="#">Dépenses</a> </td>
						<td width="60px"><a class='link' onclick="showdiv('2ieme'); " href="#">Recettes</a></td>
						<td width="60px"><a class='link' onclick="showdiv('3ieme'); " href="#">Bilan</a> </td>
						</tr>
					</table>  
					<table border="1"  >
						<tr>
						<td >
						<div id="1ieme"   style="display: none;"><?php include("consulter_depense.php");?></div>
						<div id="2ieme"   style="display: none;"><?php include("consulter_recette.php");?></div>
						<div id="3ieme"   style="display: none;"><?php include("bilan.php");?></div>
						</td>
						</tr>
					</table>
				</td>
			</tr>
			
		</table>
	</body>
</html>

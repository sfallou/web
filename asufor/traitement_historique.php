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

	$date_limite1=$_POST['date1'];
	$date_limite2=$_POST['date2'];
	$timestamp2=strtotime($date_limite2);
	$timestamp1=strtotime($date_limite1);
?>
	<body>
		<table border="1" width="80%" height="50%" align="center" cellspacing="10">
			<?php require("banniere.php");?>
			<tr>
				<td width="200" height="500" align="center" valign="top" ><div class="profil"><?php echo strtoupper($_SESSION['profil']);?></div><br/> <?php if($_SESSION['profil']=="gerant"){ include("menu2_gerant.php");} else if($_SESSION['profil']=="administrateur"){ include("menu2_admin.php");} else if($_SESSION['profil']=="tresorier"){ include("menu2_tresorier.php");}?></td>
				<td align="center" align="center" valign="top">
					<div id="dbm-table">

	<div id="dbm-header">
		<span class="header-text"><center>Etat du forage entre <?php echo changedate1($date_limite1);?> et <?php echo changedate1($date_limite2);?></center></span><br>
	</div>
</div>
					<?php include("statistique.php"); ?><br/>
						<br/>
						<?php
					if($_SESSION['profil']!="tresorier")
					{
					?>
					<center><h2 class="text">Etat des Listes</h2></center>
					<table border="0" class="tab">
						<tr>
						<td width="100px"><a class='link' onclick="showdiv('0ieme'); " href="#">Liste totale</a> </td>
						<td width="100px"><a class='link' onclick="showdiv('1ieme'); " href="#">Liste Verte</a> </td>
						<td width="100px"><a class='link' onclick="showdiv('2ieme'); " href="#">Liste Rouge</a></td>
						<td width="150px"><a class='link' onclick="showdiv('3ieme'); " href="#">Liste des Suspendus</a> </td>
						</tr>
					</table>
					<table border="1" >
						<tr>
						<td >
						<div id="0ieme"   style="display: none;"><?php include("liste_totale.php");?></div>
						<div id="1ieme"   style="display: none;"><?php include("liste_verte.php");?></div>
						<div id="2ieme"   style="display: none;"><?php include("liste_rouge.php");?></div>
						<div id="3ieme"   style="display: none;"><?php include("liste_suspendu.php");?></div>
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





















		













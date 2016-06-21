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
					<center><h2 class="text">Liste des abonnés fonctionnels</h2></center>
					<table border="0" class="tab">
						<tr>
						<td width="30px"><a class='link' onclick="showdiv('1ieme'); " href="#">Séokhaye</a> </td>
						<td width="30px"><a class='link' onclick="showdiv('2ieme'); " href="#">Sine</a></td>
						<td width="30px"><a class='link' onclick="showdiv('3ieme'); " href="#">Keur_Ibra</a> </td>
						<td width="30px"><a class='link' onclick="showdiv('4ieme'); " href="#">Kanene</a></td>
						<td width="30px"><a class='link' onclick="showdiv('5ieme'); " href="#">Daradja</a></td>
						<td width="30px"><a class='link' onclick="showdiv('6ieme'); " href="#">Keur_Mory</a> </td>
						<td width="30px"><a class='link' onclick="showdiv('7ieme'); " href="#">Keur_Malamine</a></td>
						<td width="30px"><a class='link' onclick="showdiv('8ieme'); " href="#">Kourwa</a></td>
						</tr>
					</table>  
					<table border="1"  >
						<tr>
						<td class="text">
						<div id="1ieme"   style="display: none;"><?php include("g_seokhaye.php");?></div>
						<div id="2ieme"   style="display: none;"><?php include("g_sine.php");?></div>
						<div id="3ieme"   style="display: none;"><?php include("g_keur_ibra.php");?></div>
						<div id="4ieme"   style="display: none;"><?php include("g_kanene.php");?></div>
						<div id="5ieme"   style="display: none;"><?php include("g_daraja.php");?></div>
						<div id="6ieme"   style="display: none;"><?php include("g_keur_mory.php");?></div>
						<div id="7ieme"   style="display: none;"><?php include("g_keur_malamine.php");?></div>
						<div id="8ieme"   style="display: none;"><?php include("g_khourwa.php");?></div>
						</td>
						</tr>
					</table>
				</td>
			</tr>
			
		</table>
	</body>
</html>

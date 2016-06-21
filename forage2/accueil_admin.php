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
				<td width="200" height="500" align="center" valign="top" ><div class="profil"><?php echo strtoupper($_SESSION['profil']);?></div><br/> <?php include("menu2_admin.php");?></td>
				<td align="center" align="center" valign="top">
					<center><h2 class="text">Historique & Présentation</h2></center>
					<table>
						<tr>
							<td class="text"  >
							<?php echo $texte_accueil ?>
							</td>
						</tr>
					</table> 
					<center><h2 class="text">Accueil</h2></center>
					
				</td>
			</tr>
			<tr>
				<td height="50" colspan="2" align="center" valign="midlle" ><?php include("footer.php");?></td>
			</tr>
		</table>
	</body>
</html>

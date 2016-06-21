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
					<center><h2 class="text">Contacts des Concepteurs du logicièl</h2></center>
						<table border="1" class="text" style="color: #000;"> 
							<tr><th>Prénom</th><th>Nom</th><th>Téléphone</th><th>Email</th></tr>
							<tr><td>Serigne Fallou</td><td>NDIAYE</td><td>+221778757730</td><td>sfallou2010@hotmail.fr</td></tr>
							<tr><td>Bassirou</td><td>NGOM</td><td>+221774686888</td><td>bassiroungom26@gmail.com</td></tr>
							<tr><td>Mamadou Oury</td><td>DIALLO</td><td>+221779981226</td><td>wourymaths@gmail.com</td></tr>
						</table>
				</td>
			</tr>
			
		</table>
	</body>
</html>

			 
                 



























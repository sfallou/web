<ul >
	<center>	
		<table width="120px">
		<tr><td colspan="2" valign="top"><img src="images/user.png" width="50px" height="50px"/></td></tr>
		<tr><td>Nom:</td><td><?php echo$_SESSION['prenomUser'];?><br/></td></tr>
		<tr><td>Profil:</td><td><?php echo $_SESSION['profilUser'];?><br/></td></tr>
		<tr><td class="formulaire" align="center" colspan="2"><li><a href="deconnexion.php">Deconnexion</a></li></td></tr>
	   </table>
	   <?php include("menu_gauche.php");?>
	</center>
  </ul>
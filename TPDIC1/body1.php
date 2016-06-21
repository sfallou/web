<?php
//require("head.php");
require("verification.php");
?>
<center>
  	<h1><marquee>Sénégal: "Un Peuple * Un But * Une Foi"</marquee></h1>
	<!-- code du menu -->
	<table border=1>
	<tr><td colspan=4 align=center class=formulaire>.......</td></tr>
	<tr>
	<td width="80px"><li><a href="body.php"><img src="images/drapeau.jpg" width="100%"/> </a></li></td>
	<td colspan="2" >
	<nav>
		<ul class="top-menu"><!-- attention à bien faire correspondre l'id de chaque item avec la feuilles de style -->
			<li><a href="accueil.php">Accueil  </a><div class="menu-item" id="item5"></div></li>
			<li><a href="body.php">Citoyens  </a><div class="menu-item" id="item1"></div></li>
			<li><a href="body1.php">Ajouter  </a><div class="menu-item" id="item6"></div></li>
			<li><a href="body2.php">Search </a><div class="menu-item" id="item3"></div></li>
			<li><a href="deconnexion.php">Deconnexion </a><div class="menu-item" id="item4"></div></li>
			
			
			
		</ul>
	</nav>
</td></tr>
<tr><td colspan=4 align=center class=formulaire>.......</td></tr>
<tr><td width="200px" align=center >
	<ul id="nav"><table>
		<tr><td colspan="3"><img src="images/user.png" width="70px" height="100px"/></td></tr>
		<tr><td>ID:</td><td ><?php echo $_SESSION['idUser'];?><br/></td></tr>
		<tr><td>Nom:</td><td><?php echo$_SESSION['prenomUser'];?><br/></td></tr>
		<tr><td>Profil:</td><td>Administrateur<br/></td></tr>
		</tr>
	   </table>
    </ul>
	
	</td>
	<td class=contenu ><br/><br/>
	<!-- code du contenu de la page -->
	<?php include("insertion.php");?>
<br/><br/></td></tr>
<tr><td colspan=4 align=center class=formulaire>Copyright@sfallou2015</td></tr>
</table>
<center>
 <div class="animation">
    <table>
      <tr>
        <td></td>
        
      </tr>
    </table>
</div></center>
</center>
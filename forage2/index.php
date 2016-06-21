<?php
require("head.php");
?>
	<body>
		<center><h2 class="text">Gestionnaire des forages d'ASUFOR</h2>
			<table class="text" style="height:200px;weight:300px;" > 
				<form class="formulaire" method="POST" action="authentification.php">
					<tr><td><label for="profil">Profil</label></td><td>
						<select name="profil">
							<option value="administrateur">Administrateur</option>
							<option value="gerant">Gerant</option>
							<option value="tresorier">Tresorier</option>
						</select></td></tr>
					<tr><td><label for="login">Login</label></td><td><input type="text" name="login" id="login" placeholder="Nom d'utilisateur"></td></tr>
					<tr><td><label for="password">Mot de passe</label></td><td>	<input type="password" name="password" id="password" placeholder="Mot de passe"> </td></tr>
					<tr><td colspan="2" align="center"><input type="submit" name="submit" value="CONNECTER" ></td></tr>
	
				</form>
		</table></center>
	</body>
</html>
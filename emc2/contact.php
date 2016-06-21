<?php
session_start();
if (isset($_SESSION['connect']))//On vérifie que le variable existe
{$connect=$_SESSION['connect'];//On récupère la valeur de la variable de session
}
else
{
$connect=0;//Si $_SESSION['connect'] n'existe pas, on donne la valeur "0"
}
if ($connect == "1") // Si le visiteur s'est identifié
{
	$_SESSION['connect']=1;
	$pass=$_SESSION['pass'];
	$login=$_SESSION['login'];
	$id_user=$_SESSION['id'];
	$nom=$_SESSION['nom'];
	$prenom=$_SESSION['prenom'];
	$telephone=$_SESSION['telephone'];
	$email=$_SESSION['email'];
}
?>
<?php
require("head.php");
?>
<body>
<?php
include("haut.php");
require("menu.php");
?>
<h3 class="titre">Contacter EMC2-GROUP</h3>
<table width="100%" cellpadding="0" cellspacing="0" border="1" style="margin-top:50px; margin-left:150px;" class="titre">
	<tr>
		<td>
			<table>
				<tr><td rowspan="6" valign="top" width="40" ><img src="images/adresse.png" alt="Adresse: " /></td></tr>
				<tr><td valign="top">4, Cité Comico II - VDN</td></tr>
				<tr><td valign="top">Dakar</td></tr>
				<tr><td valign="top">Sénégal</td></tr>
				<tr><td><a href="http://www.emc2-group.com" target="_blank">http://www.emc2-group.com</a></td></tr>
				<tr>
					<td><form action="traitement_contact.php" method="post" >
						<label for="contact_name">&nbsp;Saisissez votre nom&nbsp;:</label><br />
						<input type="text" name="nom" id="contact_name" size="30" class="inputbox" value="" /><br />
						<label id="contact_emailmsg" for="contact_email">&nbsp;Adresse e-mail&nbsp;:</label><br />
						<input type="text" id="contact_email" name="email" size="30" value="" class="inputbox required validate-email" maxlength="100" /><br />
						<label for="contact_subject">&nbsp;Objet du message&nbsp;:</label><br />
						<input type="text" name="objet" id="contact_subject" size="30" class="inputbox" value="" /><br /><br />
						<label id="contact_textmsg" for="contact_text">&nbsp;Saisissez votre message&nbsp;:</label><br />
						<textarea cols="50" rows="10" name="message" id="contact_text" class="inputbox required"></textarea><br />
						<input type="submit" value="Envoyer">
						</form>	
					</td>
				</tr>
			</table>
		</td>
		<td width="100 px" ><img src="images/ordi.jpg" alt="agenda: " height="400 px"/></td>
	</tr>
</table>	
</body>
</html>

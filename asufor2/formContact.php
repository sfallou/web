<?php
require("head.php");
require("verification.php");
?>
<center>
<table border=1 width="1200px">
	
<?php include("entete.php"); ?>
<tr>
	<td width="200px" align=center >
	<?php include("layoutGauche.php"); ?>
	</td>
	<td class=contenu ><br/><br/>
	<!-- code du contenu de la page -->

<center>
	<h2  align=center >Ajouter Les Coordonnees</h2>
<table width="500px" class="formulaire" ><tr><td align="center" >

<form  action="traitementInsertion2.php" method="POST" enctype="multipart/form-data">

</br>
<div style="">
<input type="text"  name="tel" placeholder="telephone" required /></br></br>
<input type="text"  name="email" placeholder="Email" required /></br></br>
<input type="text"  name="telGondwana" placeholder="Telephone Gondwana" required /></br></br>      
<input type="text"  name="adresseGondwana" placeholder="Adresse Gondwana"  required/></br></br>
<input type="text"  name="telSenegal" placeholder="Telephone Senegal"/></br></br>
<input type="text"  name="adresseSenegal" placeholder="Adresse Senegal"  /></br></br>
<input type="text"  name="adresseTravail" placeholder="Adresse Travail"  /></br></br>
<input type="text"  name="adresseDomicile" placeholder="adresse Domicile"  /></br></br>
<input   type="submit" value="Ajouter"/>
</div>
</form>
</td></tr></table>
</center>
	
	<br/><br/>
	</td>
</tr>
<tr>
	<?php include("footer.php");?>
</tr>
</table>
</center>




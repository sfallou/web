<?php
require("head.php");
require("verification.php");

$id=$_GET['id'];

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

<center><h2>Modification</h2></center>
<table class="formulaire">
	<form method="post" action="traitement_choix.php" >
		<input type="hidden" name="id" value="<?php echo$id ?>" /> 
		<tr><td > Citoyen:<input type="radio"  name="choix"  value="citoyen" checked/> </td>    								
    	<td>Parents:<input type="radio"  name="choix"  value="parent" /></td>
		<td>Contacts:<input type="radio"  name="choix"  value="contact" /><br/><br/></td></tr>
		<tr><td colspan="3" align="center"><input type="submit" value="VALIDER" /></td></tr>
								 
	</form>		
	</table>

	<br/><br/>
	</td>
</tr>
<tr>
	<?php include("footer.php");?>
</tr>
</table>
</center>






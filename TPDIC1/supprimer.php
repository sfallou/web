<?php
require("verification.php");
////////////////////////////////// Supprimer ///////////////////////////////

$id=$_GET["id"];
if (isset($id) && $id !=""){
	$bdd->exec("delete from dic_citoyen where cty_id='".$id."'");
	
}
?>
<script language="JavaScript">
		alert("Citoyen supprimé avec succes");
		window.location.replace("body.php");// On inclut le formulaire d'identification
		</script>

<?php
require("connexion_bd.php");
$id=$_POST["id_recette"];  
$req =mysql_query("delete from recette where id_recette=$id ");
if($req)
{
?>
<script language="JavaScript">
	alert("Suppression effectuée avec succès!!");
	window.location.replace("supervision_finance.php");// On inclut le formulaire d'identification
</script>
<?php
}
else {echo"wrong";}
?>	
        


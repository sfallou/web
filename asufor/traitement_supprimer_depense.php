<?php
require("connexion_bd.php");
$id=$_POST["id_depense"];  
$req =mysql_query("delete from depense where id_depense=$id ");
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
        


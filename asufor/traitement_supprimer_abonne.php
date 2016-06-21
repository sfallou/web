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
<?php
 $id=$_POST["nv_tarif"];  
$req =mysql_query(" delete from  abonne where id_abonne=$id ");
if($req)
	{
		?>
		<script language="JavaScript">
		alert("Suppression effectuée avec succès!!");
		window.location.replace("supprimer_abonne.php");// On inclut le formulaire d'identification
		</script>
		<?php
	}
	else
	{
		?>
		<script language="JavaScript">
		alert("Echec de la suppresion! Merci de recommencer");
		window.location.replace("supprimer_abonne.php");// On inclut le formulaire d'identification
		</script>
		<?php
	}

?>

        


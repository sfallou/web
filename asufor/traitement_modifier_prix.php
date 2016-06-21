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

	$nv_tarif=$_POST['nv_tarif'];
	$requete=mysql_query("UPDATE tarif SET montant_tarif='$nv_tarif' WHERE id_tarif=1 ");
	if($requete)
	{
		?>
		<script language="JavaScript">
		alert("Modification effectuée avec succès!!");
		window.location.replace("modifier_tarif.php");// On inclut le formulaire d'identification
		</script>
		<?php
	}
	else
	{
		?>
		<script language="JavaScript">
		alert("Echec de la modification! Merci de recommencer");
		window.location.replace("modifier_tarif.php");// On inclut le formulaire d'identification
		</script>
		<?php
	}

?>

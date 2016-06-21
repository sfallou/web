<?php
require("head.php");

	$req=mysql_query("select * from dette order by id_dette");
		while($don=mysql_fetch_array($req))
			{
			echo $id_abonne=$don['id_abonne'];
			echo $montant=$don['montant_dette'];
			echo $num_facture=$don['num_facture'];
			echo $date_dette=$don['date_dette'];
			}
?>

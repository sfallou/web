<?php
require('secure.php');
//require ('connexion.php');
//require('classes/Statistique.php' );

$nbr0=0;$nbr1=0;$nbr2=0;$nbr3=0;$nbr4=0;$nbr5=0;$nbr6=0;$nbr7=0;
//deifiniton d'un nouveau objet
$village= new Statistique(0,0);

$nbr0=$village->abonneVillage($bdd,seokhaye);
$nbr1=$village->abonneVillage($bdd,sine);
$nbr2=$village->abonneVillage($bdd,keur_ibra);
$nbr3=$village->abonneVillage($bdd,kanene);
$nbr4=$village->abonneVillage($bdd,daraja);
$nbr5=$village->abonneVillage($bdd,keur_malamine);
$nbr6=$village->abonneVillage($bdd,keur_mory);
$nbr7=$village->abonneVillage($bdd,khourwa);

$total=$nbr7+$nbr6+$nbr5+$nbr4+$nbr3+$nbr2+$nbr1+$nbr0;

?>

<table  class="table table-striped table-bordered bootstrap-datatable datatable responsive">
	<tr ><th>Villages </th> <th> Nombre d'abonn&eacute;s   </th> </tr>
	<tr><td>S&eacute;okhaye </td> <td> <?php echo $nbr0;?> </td></tr>
	<tr><td>Sine    </td>  <td> <?php echo $nbr1;?> </td></tr>
	<tr><td>Keur Ibra</td><td><?php echo$nbr2;?></td></tr>
	<tr><td>Kanene</td><td><?php echo$nbr3;?></td></tr>
	<tr><td>Daraja</td><td><?php echo$nbr4;?></td></tr>
	<tr><td>Keur Malamine</td><td><?php echo$nbr5;?></td></tr>
	<tr><td>Keur Mory</td><td><?php echo$nbr6;?></td></tr>
	<tr><td>Khourwa</td><td><?php echo$nbr7;?></td></tr>
	<tr><th colspan="2"><center> Total=<?php echo"$total";?></center></th></tr>
</table>
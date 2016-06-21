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
  function dumpMySQL($serveur, $login, $password, $base, $mode)
    {
    $connexion = mysql_connect($serveur, $login, $password);
    mysql_select_db($base, $connexion);
     
    $entete = "-- ----------------------\n";
    $entete .= "-- dump de la base ".$base." au ".date("d-M-Y")."\n";
    $entete .= "-- ----------------------\n\n\n";
    $creations = "";
    $insertions = "\n\n";
     
    $listeTables = mysql_query("show tables", $connexion);
    while($table = mysql_fetch_array($listeTables))
    {
    // si l'utilisateur a demand? la structure ou la totale
    if($mode == 1 || $mode == 3)
    {
    $creations .= "-- -----------------------------\n";
    $creations .= "-- creation de la table ".$table[0]."\n";
    $creations .= "-- -----------------------------\n";
    $listeCreationsTables = mysql_query("show create table ".$table[0], $connexion);
    while($creationTable = mysql_fetch_array($listeCreationsTables))
    {
    $creations .= $creationTable[1].";\n\n";
    }
    }
    // si l'utilisateur a demand? les donn?es ou la totale
    if($mode > 1)
    {
    $donnees = mysql_query("SELECT * FROM ".$table[0]);
    $insertions .= "-- -----------------------------\n";
    $insertions .= "-- insertions dans la table ".$table[0]."\n";
    $insertions .= "-- -----------------------------\n";
    while($nuplet = mysql_fetch_array($donnees))
    {
    $insertions .= "INSERT INTO ".$table[0]." VALUES(";
    for($i=0; $i < mysql_num_fields($donnees); $i++)
    {
    if($i != 0)
    $insertions .= ", ";
    if(mysql_field_type($donnees, $i) == "string" || mysql_field_type($donnees, $i) == "blob")
    $insertions .= "'";
    $insertions .= addslashes($nuplet[$i]);
    if(mysql_field_type($donnees, $i) == "string" || mysql_field_type($donnees, $i) == "blob")
    $insertions .= "'";
    }
    $insertions .= ");\n";
    }
    $insertions .= "\n";
    }
    }
     
    mysql_close($connexion);
     
    $fichierDump = fopen("dump.sql", "wb");
    fwrite($fichierDump, $entete);
    fwrite($fichierDump, $creations);
    fwrite($fichierDump, $insertions);
    fclose($fichierDump);
    }
    ?>
	<body>
		<table border="1" width="80%" height="50%" align="center" cellspacing="10">
			<?php require("banniere.php");?>
			<tr>
				<td width="200" height="500" align="center" valign="top" ><div class="profil"><?php echo strtoupper($_SESSION['profil']);?></div><br/> <?php if($_SESSION['profil']=="gerant"){ include("menu2_gerant.php");} else if($_SESSION['profil']=="administrateur"){ include("menu2_admin.php");} else if($_SESSION['profil']=="tresorier"){ include("menu2_tresorier.php");}?></td>
				<td align="center" align="center" valign="top">
					<center><h2 class="text">Contacts des Concepteurs du logicièl</h2></center>
						<table border="1" class="table" > 
							<tr><th style="background:#094963;color:#fff;">Prénom</th>
								<th style="background:#094963;color:#fff;">Nom</th>
								<th style="background:#094963;color:#fff;">Téléphone</th>
								<th style="background:#094963;color:#fff;">Email</th>
							</tr>
							<tr><td>Serigne Fallou</td><td>NDIAYE</td><td>+221778757730</td><td>sfallou2010@hotmail.fr</td></tr>
							<tr><td>Bassirou</td><td>NGOM</td><td>+221774686888</td><td>bassiroungom26@gmail.com</td></tr>
							<tr><td>Mamadou Oury</td><td>DIALLO</td><td>+221779981226</td><td>wourymaths@gmail.com</td></tr>
						</table>
				</td>
			</tr>
			
		</table>
		<?php
			dumpMySQL("127.0.0.1", "root", "", "asufor", 3);
		?>
	</body>
</html>

			 
                 



























<?php
echo("<?xml version=\"1.0\" encoding=\"iso-8859-1\"?>\n");
/* Variables de connexion : ajustez ces paramètres selon votre propre environnement */
$serveur = "localhost";
$admin   = "root";
$mdp     = "";
$base    = "asufor";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" xml:lang="fr" />
<title>Liste déroulantes dynamiques </title>
<meta name="description" content="Listes dynamiques liées: la seconde liste est modifiée via un objet XHR lors d'une sélection sur la première." />
<meta name="keywords" content="menu,déroulant,select,liées,JavaScript" />
<meta name="author" content="Cyrano" />
<meta name="generator" content="Zend Studio Environnement et WebExpert 5" />
<meta http-equiv="imagetoolbar" content="no" />
<meta http-equiv="Pragma" content="no-cache" />
<script type="text/javascript" src="./dept_xhr.js" charset="iso_8859-1"></script>

</head>
<body style="font-family: verdana, helvetica, sans-serif; font-size: 85%">
<h3>Tableau des index</h3>
<form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post" id="chgdept">
  <fieldset style="border: 3px double #333399">
  <legend>Sélectionnez un mois</legend>
    <select name="mois" id="mois" onchange="getIndex(this.value);">
		<option value="vide">- - - Choisissez un mois - - -</option>
		<option value="01">Janvier</option>
		<option value="02">Fevrier</option>
		<option value="03">Mars</option>
		<option value="04">Avril</option>
		<option value="05">Mai</option>
		<option value="06">Juin</option>
		<option value="07">Juillet</option>
		<option value="08">Aout</option>
		<option value="09">Septembre</option>
		<option value="10">Octobre</option>
		<option value="11">Novembre</option>
		<option value="12">Decembre</option>
    </select>
  </fieldset>
</form>
<!-- ICI, le secret : on met un bloc avec un id ou va s'insérer le code de
         la seconde liste déroulande -->
  <span id="blocIndex"></span><br />
</body>
</html>
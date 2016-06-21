<?php
echo("<?xml version=\"1.0\" encoding=\"iso-8859-1\"?>\n");
/* Variables de connexion : ajustez ces param�tres selon votre propre environnement */
$serveur = "sql.free.fr";
$admin   = "********";
$mdp     = "********";
$base    = "********";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" xml:lang="fr" />
<title>Liste d�roulantes dynamiques li�es</title>
<meta name="description" content="Listes dynamiques li�es: la seconde liste est modifi�e instantan�ment lors d'une s�lection sur la premi�re." />
<meta name="keywords" content="menu,d�roulant,select,li�es,JavaScript" />
<meta name="author" content="Cyrano" />
<meta name="generator" content="Zend Studio Environnement et WebExpert 5" />
<meta http-equiv="imagetoolbar" content="no" />
<meta http-equiv="Pragma" content="no-cache" />
<script type="text/javascript" src="./arrayPHP2JS.js" charset="iso_8859-1"></script>
<script type="text/javascript" src="./changeDept.js" charset="iso_8859-1"></script>
<?php
/* Requ�te SQL de r�cup�ration des donn�es */
$sql = "SELECT id_departement AS idd, departement AS dept, region.id_region AS idr, region ".
"FROM departement, region ".
"WHERE departement.id_region = region.id_region ".
"ORDER BY region.id_region;";
/* Connexion et ex�cution de la requ�te */
$connexion = mysql_pconnect($serveur, $admin, $mdp);
if($connexion != false)
{
    $choixbase = mysql_select_db($base, $connexion);
    $recherche = mysql_query($sql, $connexion);
    /* Pour ne pas �craser mes tableaux, je cr�e un t�moin */
    $temoin_r = 0;
    /* Cr�ation du tableau PHP des valeurs r�cup�r�es */
    $regions = array();
    /* Index du d�partement par tableau r�gional */
    $id = 0;
    while($ligne = mysql_fetch_assoc($recherche))
    {
        $r = $ligne['idr'];
        $d = $ligne['idd'];
        /* Je v�rifie si je suis toujours dans la m�me r�gion, sinon je cr�e les tableaux n�cessaires */
        if($temoin_r != $r)
        {
            $regions[$r] = array();
            /* J'ajoute laa r�gion */
            $regions[$r][0] = $ligne['region'];
            $regions[$r][1] = array();
            $regions[$r][2] = array();
            $temoin_r = $r;
            $id = 0;
        }
        /* J'ajoute les d�partements */
        $regions[$r][1][$id] = $d;
        $regions[$r][2][$id] = $ligne['dept'];
        $id++;
    }
    /* On s�rialise le tableau obtenu pour traitement par JavaScript */
    $chaine = htmlspecialchars(serialize($regions), ENT_QUOTES);
?>
<script type="text/javascript">
/* <![CDATA[ */
<!--
/*
* Ici, on transmets la cha�ne s�rialis�e � JavaScript 
* pour la transformer en tableau index� JavaScript 
*/
var tableau = new PhpArray2Js('<?php echo $chaine; ?>');
var tab = tableau.retour();
// -->
/* ]]> */
</script>
</head>
<body style="font-family: verdana, helvetica, sans-serif; font-size: 85%">
<h3>Version Utilisant JavaScript</h3>
<p>Vous constaterez que le d�lai de latence entre la s�lection et la mise � jour est quasiment inexistant.</p>
<?php
if(isset($_POST['ok']) && isset($_POST['departement']) && $_POST['departement'] != "")
{
    $region_selectionnee = $_POST['region'];
    $dept_selectionne = $_POST['departement'];
?>
<p>Vous avez s�lectionn� le d�partement <?php echo($dept_selectionne); ?> dans la r�gion <?php echo($region_selectionnee); ?></p>
<?php
}
?>
<form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post" id="chgdept">
  <fieldset style="border: 3px double #333399">
  <legend>S�lectionnez une r�gion</legend>
    <select name="region" id="region" onchange="changeDept(tab,this.value);">
      <option value="vide">- - - Choisissez une r�gion - - -</option>
    <?php
    /* Construction de la premi�re liste : on se sert du tableau PHP */
    $nbr = count($regions);
    foreach($regions as $nr => $nom)
    {
        ?>
    <option value="<?php echo($nr); ?>"><?php echo($nom[0]); ?></option>
<?php
    }
    ?>
    </select>
    <!-- ICI, le secret : on met un bloc avec un id ou va s'ins�rer le code de
         la seconde liste d�roulande -->
  <span id="blocDepartements"></span><br />
  <input type="submit" name="ok" id="ok" value="Envoyer" />
  </fieldset>
</form>
<?php
    
}
else
{
    /*  Si vous arrivez ici, vous avez un gros probl�me avec la connexion au serveur de base de donn�es */
?>
</head>
<body>
<p>La connexion au serveur de base de donn�es a �chou�. Aucun �l�ment ne peut �tre affich�.</p>
<?php
}
?>
<p><a href="./index.php" title="Aller vers la version 100% PHP">Aller vers la version 100% PHP</a></p>
</body>
</html>
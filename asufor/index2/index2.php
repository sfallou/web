<?php
echo("<?xml version=\"1.0\" encoding=\"iso-8859-1\"?>\n");
/* Variables de connexion : ajustez ces paramètres selon votre propre environnement */
$serveur = "sql.free.fr";
$admin   = "********";
$mdp     = "********";
$base    = "********";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" xml:lang="fr" />
<title>Liste déroulantes dynamiques liées</title>
<meta name="description" content="Listes dynamiques liées: la seconde liste est modifiée instantanément lors d'une sélection sur la première." />
<meta name="keywords" content="menu,déroulant,select,liées,JavaScript" />
<meta name="author" content="Cyrano" />
<meta name="generator" content="Zend Studio Environnement et WebExpert 5" />
<meta http-equiv="imagetoolbar" content="no" />
<meta http-equiv="Pragma" content="no-cache" />
<script type="text/javascript" src="./arrayPHP2JS.js" charset="iso_8859-1"></script>
<script type="text/javascript" src="./changeDept.js" charset="iso_8859-1"></script>
<?php
/* Requête SQL de récupération des données */
$sql = "SELECT id_departement AS idd, departement AS dept, region.id_region AS idr, region ".
"FROM departement, region ".
"WHERE departement.id_region = region.id_region ".
"ORDER BY region.id_region;";
/* Connexion et exécution de la requête */
$connexion = mysql_pconnect($serveur, $admin, $mdp);
if($connexion != false)
{
    $choixbase = mysql_select_db($base, $connexion);
    $recherche = mysql_query($sql, $connexion);
    /* Pour ne pas écraser mes tableaux, je crée un témoin */
    $temoin_r = 0;
    /* Création du tableau PHP des valeurs récupérées */
    $regions = array();
    /* Index du département par tableau régional */
    $id = 0;
    while($ligne = mysql_fetch_assoc($recherche))
    {
        $r = $ligne['idr'];
        $d = $ligne['idd'];
        /* Je vérifie si je suis toujours dans la même région, sinon je crée les tableaux nécessaires */
        if($temoin_r != $r)
        {
            $regions[$r] = array();
            /* J'ajoute laa région */
            $regions[$r][0] = $ligne['region'];
            $regions[$r][1] = array();
            $regions[$r][2] = array();
            $temoin_r = $r;
            $id = 0;
        }
        /* J'ajoute les départements */
        $regions[$r][1][$id] = $d;
        $regions[$r][2][$id] = $ligne['dept'];
        $id++;
    }
    /* On sérialise le tableau obtenu pour traitement par JavaScript */
    $chaine = htmlspecialchars(serialize($regions), ENT_QUOTES);
?>
<script type="text/javascript">
/* <![CDATA[ */
<!--
/*
* Ici, on transmets la chaîne sérialisée à JavaScript 
* pour la transformer en tableau indexé JavaScript 
*/
var tableau = new PhpArray2Js('<?php echo $chaine; ?>');
var tab = tableau.retour();
// -->
/* ]]> */
</script>
</head>
<body style="font-family: verdana, helvetica, sans-serif; font-size: 85%">
<h3>Version Utilisant JavaScript</h3>
<p>Vous constaterez que le délai de latence entre la sélection et la mise à jour est quasiment inexistant.</p>
<?php
if(isset($_POST['ok']) && isset($_POST['departement']) && $_POST['departement'] != "")
{
    $region_selectionnee = $_POST['region'];
    $dept_selectionne = $_POST['departement'];
?>
<p>Vous avez sélectionné le département <?php echo($dept_selectionne); ?> dans la région <?php echo($region_selectionnee); ?></p>
<?php
}
?>
<form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post" id="chgdept">
  <fieldset style="border: 3px double #333399">
  <legend>Sélectionnez une région</legend>
    <select name="region" id="region" onchange="changeDept(tab,this.value);">
      <option value="vide">- - - Choisissez une région - - -</option>
    <?php
    /* Construction de la première liste : on se sert du tableau PHP */
    $nbr = count($regions);
    foreach($regions as $nr => $nom)
    {
        ?>
    <option value="<?php echo($nr); ?>"><?php echo($nom[0]); ?></option>
<?php
    }
    ?>
    </select>
    <!-- ICI, le secret : on met un bloc avec un id ou va s'insérer le code de
         la seconde liste déroulande -->
  <span id="blocDepartements"></span><br />
  <input type="submit" name="ok" id="ok" value="Envoyer" />
  </fieldset>
</form>
<?php
    
}
else
{
    /*  Si vous arrivez ici, vous avez un gros problème avec la connexion au serveur de base de données */
?>
</head>
<body>
<p>La connexion au serveur de base de données a échoué. Aucun élément ne peut être affiché.</p>
<?php
}
?>
<p><a href="./index.php" title="Aller vers la version 100% PHP">Aller vers la version 100% PHP</a></p>
</body>
</html>
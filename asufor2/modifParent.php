<?php
require("head.php");
require("verification.php");

$id=$_SESSION['id'];

?>
<center>
<table border=1 width="1200px">
    
<?php include("entete.php"); ?>
<tr>
    <td width="200px" align=center >
    <?php include("layoutGauche.php"); ?>
    </td>
    <td class=contenu ><br/><br/>
    <!-- code du contenu de la page -->

<?php
$req = "select * from dic_citoyen where cty_id= :id ";
$reponse = $bdd->prepare($req);
$reponse->execute(array("id"=>$id));
$donnees1=$reponse->fetch();

$cni=$donnees1['cty_nci'];
//echo$cni;
$req2 = "SELECT * FROM parents WHERE cty_cniparent=:cni";
$reponse2 = $bdd->prepare($req2);
$reponse2->execute(array("cni"=>$cni));

if($donnees=$reponse2->fetch()){

   echo '
<center> <h2  align=center>Ajouter Les informations familiales</h2>
    <table width="500px" class="formulaire" ><tr><td align="center" >
    <form  action="traiementmodifParent.php" method="POST" enctype="multipart/form-data">

    <input type="hidden" name="cni" value="'. $cni .'" /> 
    <tr><td>Prenom du pere</td><td><input type="text"  name="prenomPere" placeholder="Prenom du pere" value="'. htmlspecialchars($donnees['cty_prenomPere']) .'" /></br></br>
    <tr><td>renom de la mere </td><td><input type="text"  name="prenomMere" placeholder="Prenom de la mere" value="'. htmlspecialchars($donnees['cty_prenomMere']) .'" /></br></br>
    <tr><td>Nom de la mere </td><td><input type="text"  name="nomMere" placeholder="Nom de la mere" value="'. htmlspecialchars($donnees['cty_nomMere']) .'" /></br></br>      
    <tr><td>Prenom conjoint(e) </td><td><input type="text"  name="prenomConjoint" placeholder="Prenom conjoint(e)" value="'. htmlspecialchars($donnees['cty_prenomConjoint']) .'" /></br></br>
    <tr><td>Nom conjoint(e) </td><td><input type="text"  name="nomConjoint" placeholder="Nom conjoint(e)" value="'. htmlspecialchars($donnees['cty_nomConjoint']) .'"/></br></br>
    
      <input   type="submit" value="Ajouter"/>
        </div>
        </form>
          </td></tr></table>
        </center>




';

}

?>
    <br/><br/>
    </td>
</tr>
<tr>
    <?php include("footer.php");?>
</tr>
</table>
</center>





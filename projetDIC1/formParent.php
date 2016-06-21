<?php
require("head.php");
require("verification.php");
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
   
<center><h2  align=center>Ajouter Les informations familiales</h2>
    <table width="500px" class="formulaire" ><tr><td align="center" >
    <form  action="traitementInsertion3.php" method="POST" enctype="multipart/form-data">
    
    </br>
    <div style="">
    <input type="text"  name="prenomPere" placeholder="Prenom du pere" required /></br></br>
    <input type="text"  name="prenomMere" placeholder="Prenom de la mere" required /></br></br>
    <input type="text"  name="nomMere" placeholder="Nom de la mere" required /></br></br>      
    <input type="text"  name="prenomConjoint" placeholder="Prenom conjoint(e)"  /></br></br>
    <input type="text"  name="nomConjoint" placeholder="Nom conjoint(e)"/></br></br><br/>
    <label >Photo:</label><input name="photo2" type="file"></br></br>
      <input   type="submit" value="Ajouter"/>
        </div>
        </form>
          </td></tr></table>
        </center>
    <br/><br/>
    </td>
</tr>
<tr>
    <?php include("footer.php");?>
</tr>
</table>
</center>



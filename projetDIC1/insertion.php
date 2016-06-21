<?php
session_start();
?>
<center>
  <h2  align=center>Ajouter Citoyen</h2>
    <form  action="traitementInsertion.php" method="POST" enctype="multipart/form-data" class="formulaire">
    <table width="500px" 
    <tr><td align="center" >Nom:</td><td><input type="text"  name="nom" placeholder="Nom" required /></td></tr>
    <tr><td align="center" >Prenom:</td><td><input type="text"  name="prenom" placeholder="Prenom" required /></td></tr>
   <tr><td align="center" >Date de naissance:</td><td> <input type="date"  name="datenaiss"  required /></td></tr>
   <tr><td align="center" >Lieu de naissance:</td><td> <input type="text"  name="adresse" placeholder="Lieu de naissance" required /></td></tr>    
   <tr><td align="center" >CNI:</td><td> <input type="text"  name="cni" placeholder="N°CIN"  required/></td></tr>
   <tr><td align="center" > Date delivrance CNI:</td><td><input type="date"  name="datecnideliv"  required /></td></tr>
   <tr><td align="center" >  Date expiration CNI:</td><td><input type="date"  name="datecniexp"  required /></td></tr>
   <tr><td align="center" > Sexe:</td><td><br/>
    Homme:<input type="radio"  name="sexe"  value="masculin" checked/> &nbsp; &nbsp
    Femme:<input type="radio"  name="sexe"  value="feminin"  /><br/><br/></td></tr>
    <tr><td align="center" ><br/>Profession:</td><td><input type="text"  name="profession" placeholder="Profession" required /></td></tr>
   <tr><td align="center" ><br/>Specialite:</td><td> <input type="text"  name="specialite" placeholder="Specialite" /></td></tr> 
    <tr><td align="center" > Situation matrimoniale:</td><td><br/>
    Marie:<input type="radio"  name="matrimonial"  value="marie" checked/>&nbsp; &nbsp
    Celibataire:<input type="radio"  name="matrimonial"  value="Celibataire" /><br/><br/></td></tr>
    <tr><td align="center" ><br/> Date d'entree: </td><td><input type="date"  name="dateentree" placeholder="Date entree" required /></td></tr>
    <tr><td align="center" ><br/>Photo:</td><td><input name="photo" type="file" required ></td></tr>
    <tr><td align="center" ><br/>Teint:</td><td><input type="text"  name="teint" placeholder="teint"/></td></tr>
    <tr><td align="center" ><br/>Taille:</td><td><input type="text"  name="taille" placeholder="taille" required /></td></tr>
    <tr><td align="center" colspan="2"><input   type="submit" value="Ajouter"/></td></tr>
   </table>
 </form>
       
</center>
       
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>

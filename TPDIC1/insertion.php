<?php
//require("head.php");
require("verification.php");
?>
<?php

////////////////////////////// ajouter citoyen //////////////////////////////////////////////
function ajouter($nom,$prenom,$datenais,$cni,$lieunais){

  $bdd = new PDO('mysql:host=localhost;dbname=classe', 'root', 'passer');
//insertion avec requête préparée
$req=$bdd->prepare("INSERT INTO dic_citoyen(cty_nom, cty_prenom, cty_datenaissance, cty_lieunaissance, cty_nci)
                        VALUES (:nom, :prenom, :datenais,:lieu,:cni)");
$req->execute(array(
          'nom'=>$nom,
          'prenom'=>$prenom,
          'datenais'=>$datenais,
          'lieu'=>$lieunais,
          'cni'=>$cni));
//echo "Cotoyen ajouté avec succès <br><br><br>";
?>
<script language="JavaScript">
    alert("Citoyen ajouté avec succès!!!");
    window.location.replace("body1.php");// On inclut le formulaire d'identification
    </script>
<?php
}
 
$bdd = new PDO('mysql:host=localhost;dbname=classe', 'root', 'passer');

function possible($jour,$mois)
    {
        if($jour==30&&$mois==02)
        {
            return 0;
        }else if($jour==31&&$mois==02)
        {
            return 0;
        }else if($jour==31&&$mois==04)
        {
            return 0;
        }else if($jour==31&&$mois==06)
        {
            return 0;
        }else if($jour==31&&$mois==09)
        {
            return 0;
        }else if($jour==31&&$mois==11)
        {
            return 0;
        } else return 1;
        
    }
    
       
        
    function formulaire2()
    {

    echo'
   
       <center>
       <table width="500px" class="form"><tr><td align="center" >
        <form  action="insertion.php" method="POST">
        <h2  align=center >Ajouter Citoyen</h2>
        </br>
        <div style="">
        <input type="text"  name="nom" placeholder="Nom" required /></br></br>
        <input type="text"  name="prenom" placeholder="Prenom" required /></br></br>
        <font size=4 >Date de naissance</font><br/>
        <select class="selectpicker" data-style="btn-info" data-width="100px" name="jour" style="width:25%; height:7%;border-radius:4px;" >
        <option value=0 >Jour</option>';
        
        $jour=1;
        while($jour!=32)//effichage automatique des jours
        {
            echo '<option value='.$jour.' >'.$jour.'</option>';
            $jour+=1;
        }
        echo '
        </select>
        
        <select class="selectpicker" data-style="btn-info" data-width="100px" name="mois" style="width:25%; height:7%;border-radius:4px;" >
        <option value="mois">Mois</option>
        <option title=Janvier value="01">Janvier</option>
        <option title=Février value="02">Fevrier</option>
        <option title=Mars value="03">Mars</option>
        <option title=Avril value="04">Avril</option>
        <option title=Mai value="05">Mai</option>
        <option title=Juin value="06">Juin</option>
        <option title=Juillet value="07">Juillet</option>
        <option title=Août value="08">Aout</option>
        <option title=Septembre value="09">Septembre</option>
        <option title=Octobre value="10">Octobre</option>
        <option title=Novembre value="11">Novembre</option>
        <option title=Décembre value="12">Decembre</option>
        </select>
        
        
        <select class="selectpicker" data-style="btn-info" data-width="100px" name="annee" style="width:25%; height:7%;border-radius:4px;" >
        <option value=0 >Annee</option>';
        
        $an=date('Y');
        while($an!=1950)
        {
            echo '<option value='.$an.' >'.$an.'</option>';
            $an-=1;
        }
        
        echo '
        </select></br></br>
        
        <input type="text"  name="adresse" placeholder="Lieu de naissance" required /></br></br>
        
        
        <input type="text"  name="numero" placeholder="NCIN"  required/></br></br>

        <input   type="submit" value="Ajouter"/>
        </div>';
        echo '</form>
          </td></tr></table>
        </center>';
    }
   
    
    if(isset($_POST['nom']))
    {
       if ($_POST['jour']!=0 && $_POST['mois']!="mois" && $_POST['annee']!=0)
        {
        $name=$_POST['nom'];
        $prenoms=$_POST['prenom'];
        $adresse=$_POST['adresse'];
        $numero=$_POST['numero'];
        $jour=$_POST['jour'];
        $mois=$_POST['mois'];
        $annee=$_POST['annee'];
       
       $datenais="$annee-$mois-$jour";
        ajouter($name,$prenoms,$datenais,$numero,$adresse);
        }
        else formulaire2();

    }else formulaire2();
    
?>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>

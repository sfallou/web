<?php
  session_start();
  $prenom=$_SESSION['prenomUser'];
 if(!isset($_SESSION['idUser']))
  {
     echo '<meta http-equiv="Refresh" content="0;url=index.php">';
  exit();
  }
  include ("head.php");
?>

  <body>
<a href="deconnexion.php" id="dev7link" title="Déconnexion"><img src="dev7logo.png"></a>
<!--bouton de déconnexion-->
<?php

$bdd = new PDO('mysql:host=localhost;dbname=classe', 'root', 'passer');
echo'
<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    '.$prenom.' <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="#">Absent</a></li>
    <li><a href="#">Occupé</a></li>
    <li><a href="#">Invisible</a></li>
  </ul>
</div>
<!--Fin bouton de déconnexion-->
    <div class="container-fluid">
    	<div class="page-header">
				<h1>
					BIENVENUE! <small>Profiter de votre visite</small>
				</h1>
			</div>
	<div class="row">
		<div class="col-md-12">
			<ul class="nav nav-tabs nav-stacked">
				<li >
					<a href="listecitoyen.php">Liste</a>
				</li>
				<li class="active">
					<a href="insertion.php">Insertion</a>
				</li>
				<li >
					<a href="modification.php">Modification</a>
				</li>
				<li >
					<a href="suppression.php">Suppression</a>
				</li>
				
			</ul>';
			
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
    
    function enregistrer($nom,$prenoms,$adresse,$numero,$jour,$mois,$annee)
    {
    	$bdd = new PDO('mysql:host=localhost;dbname=classe', 'root', 'passer');
    	echo "Le nom".$nom."</br>";
    	echo "Le prenom".$prenoms."</br>";
    	echo "Le lieu".$adresse."</br>";
    	echo "Le NCIN".$numero."</br>";
    	echo "Le jour".$nom."</br>";
       /* $req = $bdd->prepare('INSERT INTO dic_citoyen(cty_nom,cty_prenom , console, prix, 􏰄nbre_joueurs_max, commentaires) VALUES(:nom, :possesseur, :console, :prix, 􏰄→ :nbre_joueurs_max, :commentaires)’);
$req->execute(array(
         ’nom’ => $nom,
         ’possesseur’ => $possesseur,
         ’console’ => $console,
         ’prix’ => $prix,
         ’nbre_joueurs_max’ => $nbre_joueurs_max,
         ’commentaires’ => $commentaires
         ));
        
        if($result)
        {
            echo '<script type="text/JavaScript" > alert ("Patient creer"); </script>';
            
        }
        echo '<meta http-equiv="Refresh" content="0;url=insertion.php">';*/
        
    }
    
    
    function formulaire($nom,$prenoms,$adresse,$numero,$j,$ddn,$addr,$enum,$enom,$eprenom)
    {

		echo'
		<div class="formu">
        <form class="form-signin" role="form" action="insertion.php" method="POST">
        <h2 class="form-signin-heading" align=center ><font color=powderblue > Inscription </font></h2>
        </br>
        <input type="text" class="form-control" name="nom" placeholder="Nom" value="'.$nom.'" /><font color="red">'.$enom.'</font></br></br>
        <input type="text" class="form-control" name="prenom" placeholder="Prenom" value="'.$prenoms.'" /><font color="red">'.$eprenoms.'</font></br></br>
        
        <p><font size=4 >Date de naissance</font></p>
        <select class="selectpicker" data-style="btn-info" data-width="100px" name="jour" style="width:20%; height:7%;border-radius:4px;" >
        <option value=0 >Jour</option>';
        
        $jour=1;
        while($jour!=32)//effichage automatique des jours
        {
            echo '<option value='.$jour.' >'.$jour.'</option>';
            $jour+=1;
        }
        echo '
        </select>
        
        <select class="selectpicker" data-style="btn-info" data-width="100px" name="mois" style="width:20%; height:7%;border-radius:4px;" >
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
        
        
        <select class="selectpicker" data-style="btn-info" data-width="100px" name="annee" style="width:20%; height:7%;border-radius:4px;" >
        <option value=0 >Annee</option>';
        
        $an=date('Y');
        while($an!=1950)
        {
            echo '<option value='.$an.' >'.$an.'</option>';
            $an-=1;
        }
        
        echo '
        </select><br/><font color=red>'.$ddn.'</font>

        </br></br>
        
        <input type="text" class="form-control" name="adresse" placeholder="Lieu de naissance" value="'.$adresse.'" /><font color="red">'.$addr.'</font></br></br>
        
        
        <input type="text" class="form-control" name="numero" style="width:100%; height:7%;" placeholder="NCIN" value="'.$numero.'" /><font color="red">'.$num.'</font></br></br>

        <button class="btn btn-primary" type="submit">Cr&eacuteer</button>
        </div>';
        echo '</form>';
    }
    
    $enom="";
    $eprenom="";
    $j="";
    $ddn="";//erreur date de naissance
    $addr="";//erreur lieu de naissance
    $accomp="";
    $num="";
    
    if(isset($_POST['nom']))
    {
        $nom=$_POST['nom'];
        $prenoms=$_POST['prenom'];
        $adresse=$_POST['adresse'];
        $numero=$_POST['numero'];
        $jour=$_POST['jour'];
        $mois=$_POST['mois'];
        $annee=$_POST['annee'];

        if(empty($_POST['nom']))
        {
            $enom="Nom obligatoire";
            $i=1;
        }
        if (empty($_POST['prenom']))
        {
            $eprenom="Prenom obligatoire";
            $i=1;
            
        }
        if ($_POST['jour']==0||$_POST['mois']=="mois"||$_POST['annee']==0)
        {
            $ddn="Date de naissance complete obligatoire";
            $i=1;
            
        }
        $now=date("Y-m-d");
        $datenaiss=$_POST['annee']."-".$_POST['mois']."-".$_POST['jour'];

        if((strtotime($now)-strtotime($datenaiss))<0)
        {
            $ddn="Date de naissance trop grande";
            $i=1;
        }
        if (empty($_POST['adresse']))
        {
            $addr="Adresse obligatoire";
            $i=1;
            
        }
        if (empty($_POST['numero']))
        {
            $enum="Numero obligatoire";
            $i=1;
            
        }
        if(!possible($jour,$mois))
        {
            $ddn="Date inexistante";
            $i=1;

        }
        if($i==0)
        {
            enregistrer($nom,$prenoms,$adresse,$numero,$jour,$mois,$annee);
        }
        else formulaire($nom,$prenoms,$adresse,$numero,$j,$ddn,$addr,$enum,$enom,$eprenom);

    }else formulaire($nom,$prenoms,$adresse,$numero,$j,$ddn,$addr,$enum,$enom,$eprenom);
   


			echo'
			<ul class="nav nav-pills">
				<li class="active">
					 <a href="#"> <span class="badge pull-right">42</span> Home</a>
				</li>
				<li>
					 <a href="#"> <span class="badge pull-right">16</span> More</a>
				</li>
			</ul>
		</div>
	</div>
</div>';?>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>

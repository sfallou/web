<?php
  session_start();
  $prenom=$_SESSION['prenomUser'];
 if(!isset($_SESSION['idUser']))
  {
     echo '<meta http-equiv="Refresh" content="0;url=index.php">';
  exit();
  }
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bootstrap 3, from LayoutIt!</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

     <style type="text/css">
    .container-fluid
    {
    	width:80%;
    	background-color:rgba(185, 185, 185, 0.4);
    	margin-top:1%;
    	padding-top:2%;
    	padding-right:5%;
    	padding-left:5%;
    	padding-bottom:5%;
    }
    .page-header
    {
    	margin-top:1%;
    	
    }
    #allo
    {
    	display:inline;
    }
    #lala
    {
    	background-color:rgba(100, 100, 100, 0.4);
    	padding:2%;
    	border-radius:10px;
    }
	</style>

  </head>
  <body>
<a href="deconnexion.php" id="dev7link" title="Déconnexion"><img src="dev7logo.png"></a>
<!--bouton de déconnexion-->
<?php
    //////////////recuperation du nombre de citoyens
	$bdd = new PDO('mysql:host=localhost;dbname=classe', 'root', 'passer');
	$reponse = $bdd->query("SELECT count(*) FROM dic_citoyen");
    $donnees = $reponse->fetch();
        
    $nbr=$donnees["count(*)"];
     //////////// fin récupération du nombre de citoyens
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
					BIENVENUE! <small>Ici vous pouvez rechercher des citoyens</small>
				</h1>
			</div>
	<div class="row">
		<div class="col-md-12">
			<ul class="nav nav-tabs nav-stacked">
				<li class="active">
					<a href="listecitoyen.php">Liste</a>
				</li>
				<li>
					<a href="insertion.php">Insertion</a>
				</li>
				<li >
					<a href="modification.php">Modification</a>
				</li>
				<li >
					<a href="suppression.php">Suppression</a>
				</li>
				
			</ul>
			
			<form class="form-search" action="listecitoyen.php" method=POST>
    			<div class="input-append" >
    			<input type="text"  class="search-query" name="nomi" placeholder=" ENTRER LE PRENOM DU CITOYEN A RECHERCHER" style="width:50%;background:white;font-color:white; direction:ltr; ">
    			<button class="btn btn-primary" type="submit">Recherche</button>
    		</div>
    		</form>
    		<ul class="nav nav-pills" >
				<li class="active" id="allo">
					 <a href="#"> <span class="badge pull-right">'.$nbr.'</span> Citoyens</a>
				</li>
			</ul>';
    		//----------------------------------côté recherche -----------------------------------------------
         if(isset($_REQUEST['nomi']))
         {
            affichage($_REQUEST['nomi'],$_REQUEST['modifadmin']);//appel de la fonction affichage
			//on lui donne les lettres, syllabes du pseudo à rechercher
         }

         function affichage($n,$idmodif)//implémentation de la fonction d'affichage
         {  
         	$bdd = new PDO('mysql:host=localhost;dbname=classe', 'root', 'passer');
            $n=explode(" ",$n.' xxx');//test chaine non vide
			//echo $n[0].' '.$n[1];

			if($n[1]!='XXX')//si chaine non vide
			{
				$result=$bdd->prepare('SELECT * FROM dic_citoyen WHERE cty_prenom LIKE :prenom OR cty_prenom LIKE :prenom1 OR cty_nom LIKE :nom OR cty_nom LIKE :nom1')or die(print_r($bdd->errorInfo()));
   				$result->execute(array('prenom'=>"%".$n[0]."%",'prenom1'=>"%".$n[1]."%",'nom'=>"%".$n[0]."%",'nom1'=>"%".$n[1]."%"));
            }
			if($n[1]=='XXX')
			{
				$result=$bdd->prepare('SELECT * FROM dic_citoyen WHERE cty_prenom LIKE :prenom OR cty_nom LIKE :nom')or die(print_r($bdd->errorInfo()));
   				$result->execute(array('prenom'=>"%".$n[0]."%",'prenom1'=>"%".$n[0]."%"));

			}
			
			//$result=mysql_query($result) or die(mysql_error());
			//----------------------------debut affichage sous forme de tableau---------------------------
			$i=0;
			echo'<table class="table table-bordered" style="direction: " >
		      <tr bgcolor="silver"><td>NOM</td> <td>PRENOM</td> <td>DATE NAISSANCE</td> <td>LIEU NAISSANCE</td> <td>NCI</td></tr>';
			   while($row = $result->fetch())
            {
			    //$IMC=1;
				//$id=$row[0];//je récupère l'id du patient que je teste
				//--------------------------------debut getion des couleurs
				if($i%2==0)
				{
				echo '<tr style="background:RGBa(0,155,255,0.7) ;">';
				}
				if($i%2!=0)
				{
				echo '<tr style="background:RGBa(255,255,255,0.8) ;">';
				}
				//-------------------------------fin gestion des couleurs
				
						echo '<td>'.strtoupper($row['cty_prenom']).'</td> <td>'.$row['cty_nom'].'</td> <td>'.$row['cty_datenaissance'].'</td> <td>'.$row['cty_lieunaissance'].'</td> <td>'.$row['cty_nci'].'</td>';//---------- j'affiche le nom et le prenom
						//	echo '<input type="hidden" name="ps" value="'.$row[2].'">';
	
                        
						
						
						echo '
					</tr>';
					$i++;
			}
			echo'</table>';  
	    }

        	echo'
			
		</div>
	</div>
</div>';?>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>

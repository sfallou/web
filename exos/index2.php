

<?php
  //require("connexion.php");

$val=$_POST['n'];

  function factoriel($n){
  	$res=1;
  	for ($i=1;$i<=$n;$i++)
  		$res=$res*$i;
  	return $res;
  }

  function somme(){
  	$tab=array(1,6,5,8,7,9,12 );
  	$res=0;
  	for($i=0;$i<8;$i++)
  		$res+=$tab[$i];
  	return $res;
  }
  	
  	function inserer(){
  $bdd = new PDO('mysql:host=localhost;dbname=classe', 'root', 'passer');
//insertion avec requête préparée
  $titre="album";
  		for($i=0;$i<100;$i++){
  			$i=$i;
  			$titre="album$i";
  			$dateparution=date("Y-m-h");
  			$req=$bdd->prepare("INSERT INTO album(alb_titre, alb_dateparution)
                        VALUES (:titre, :dateparution)");
			$req->execute(array('titre'=>$titre,'dateparution'=>$dateparution));
			$req->closeCursor();
  		}

	echo " valuers ajouteés avec succès <br><br><br>";

}
//teste
  	$r1=factoriel($val);
  	echo"res1=$r1<br/>";
  	$r2=somme();
  	echo"res2=$r2<br/>";

inserer();
?>
  	
 

  

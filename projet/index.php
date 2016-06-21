<?php
include("head.php")
?>
<!-- - - - - - - - - - - - - -FFFFFFFFIIIIIIINNNNNNNNNN entête de but corps - - - - - - - - - - - - - - - - - - - -->

  <body>
     
		<?php
		$bdd = new PDO('mysql:host=localhost;dbname=classe', 'root', 'passer');
		//include("connect.php");
		//include("connect2.php");
		function formulaire($email,$eemail,$pass,$epass){
           	 $bdd = new PDO('mysql:host=localhost;dbname=classe', 'root', 'passer');
   		echo'
		<center><div class="col-md-4" id="lala">
			<form role="form" method="POST" action="index.php">
				<div class="form-group">

					<input class="form-control" id="exampleInputEmail1" type="text" name="email" placeholder="VOTRE EMAIL SVP" value="'.$email.'"><font color="red">'.$eemail.'</font></br>
				</div>
				<div class="form-group">
		
					<input class="form-control" id="exampleInputPassword1" type="password" name="pass" placeholder="MOT DE PASSE"> <font color="red">'.$epass.'</font></br>
				</div>
				
				<button type="submit" class="btn btn-default">
					Valider
				</button>
			</form>
		</div>'


		;}
		//////////////
//////////////////////////////FIN ZONE DE SAISIE PRIMAIRE ////////////// debut zone fonctions ////////////////////

	function traitement($email,$eemail,$pass,$epass)
    {
        $bdd = new PDO('mysql:host=localhost;dbname=classe', 'root', 'passer');
		$pass=sha1($pass);
		//onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette entrée?'));"
        //----------------------------------coté base de données------------------------------
        $requete=$bdd->prepare('SELECT * FROM user WHERE email=:email AND password=:pass')or die(print_r($bdd->errorInfo()));
   		$requete->execute(array('email'=>$email,'pass'=>$pass));	
        //$req=$bdd->prepare('SELECT * FROM user ')or die(print_r($bdd->errorInfo()));
        //$req->execute();    

   		if($requete->rowCount()==1)
          {
   		    while ($donnees = $requete->fetch())
            {
                echo $donnees['idUser'];
                session_start();
                $_SESSION['idUser']=$donnees['idUser'];
                $_SESSION['prenomUser']=$donnees['prenomUser'];
                echo '<meta http-equiv="Refresh" content="0;url=listecitoyen.php">';
                exit();
            }
          }
          else
          {
            $eemail="VALEUR INCORRECTE";
            formulaire($email,$eemail,$pass,$epass);
        
          }
            $requete->closeCursor();
        


        
        /*
		$requete="select * from user where pseudo_u='$pseudo' and password_u='$pass'";
		$resultat=mysql_query($requete);
		while($lignes=mysql_fetch_row($resultat))
        {
            $nom=$lignes[1];$prenom=$lignes[2];
        }
        $query = "select count(*),id_stat from user where pseudo_u='$pseudo' and password_u='$pass'";
        $result = mysql_query($query) or die (mysql_error());
        while($ligne=mysql_fetch_row($result))
        {
            $OK=$ligne[0];$stat=$ligne[1];
        }
        if($OK==0)
        {
            $epseudo="le pseudo ou le mot de passe est incorrect";
            formulaire($pseudo,$epseudo,$pass,$epass);
        }
        else
        {
            if($stat==1)
            {
			    session_start();
				$_SESSION['pseudo']=$pseudo;
				$_SESSION['statut']=1;
                echo '<meta http-equiv="Refresh" content="0;url=accueil.php">';
				exit();
            }
			if($stat==2)
            {
			    session_start();
				$_SESSION['pseudo']=$pseudo;
				$_SESSION['nom']=$nom;
				$_SESSION['prenom']=$prenom;
				$_SESSION['statut']=2;
				//header("location:accueils.php");
                echo '<meta http-equiv="Refresh" content="0;url=accueils.php">';
				exit();
            }
			if($stat==3)
            {
			    session_start();
				$_SESSION['pseudo']=$pseudo;
				$_SESSION['nom']=$nom;
				$_SESSION['prenom']=$prenom;
				$_SESSION['statut']=3;
				//header("location:accueils.php");
                echo '<meta http-equiv="Refresh" content="0;url=accueili.php">';
				exit();
            }
			if($stat==4)
            {
			    session_start();
				$_SESSION['pseudo']=$pseudo;
				$_SESSION['nom']=$nom;
				$_SESSION['prenom']=$prenom;
				$_SESSION['statut']=4;
				//header("location:accueils.php");
                echo '<meta http-equiv="Refresh" content="0;url=accueilm.php">';
				exit();
            }
            
            else
			    echo 'tu es secrétaire';
        }
        //--------------------------------fin côté base de données---------------------------- */
    }

    $eemail="";$email="";$pass="";$epass="";$i=0;

    if(isset($_POST['email'] ))
    {
    	
        $email=$_POST['email'];
        $pass=$_POST['pass'];

        if(empty($_POST['email']))
        {
            $eemail="L'EMAIL SVP.";$i=1;
        }
        if(empty($_POST['pass']))
        {
            $epass="MOT DE PASSE SVP.";$i=1;
        }
        if($i==0)
        {
 
            traitement($email,$eemail,$pass,$epass);
        }
        else
            formulaire($email,$eemail,$pass,$epass);
    }
    else
    {
        formulaire($email,$eemail,$pass,$epass);
    }
;?>




</div>
</div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>    
  </body>
</html>

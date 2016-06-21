<?php
session_start();// À placer obligatoirement avant tout code HTML.
$_SESSION['connect']=0; //Initialise la variable 'connect'.

$email=$_POST['email'];
$pass=$_POST['pass'];     

$bdd = new PDO('mysql:host=localhost;dbname=classe', 'root', 'passer');
$pass=sha1($pass);
       
        //----------------------------------coté base de données------------------------------
        $requete=$bdd->prepare('SELECT * FROM user WHERE email=:email AND password=:pass')or die(print_r($bdd->errorInfo()));
        $requete->execute(array('email'=>$email,'pass'=>$pass));    
          

        if($requete->rowCount()==1)
          {
            if ($donnees = $requete->fetch())
            {
                $iduser=$donnees['idUser'];
                $prenomUser=$donnees['prenomUser'];
                $_SESSION['connect']=1;
                $_SESSION['idUser']=$donnees['idUser'];
                $_SESSION['prenomUser']=$donnees['prenomUser'];
                $_SESSION['nomUser']=$donnees['nomUser'];
                
               ?>
                 <script language="JavaScript">
             
                window.location.replace("accueil.php");
                 </script>
            <?php
            }
          }
          else
          {
            ?>
                 <script language="JavaScript">
                 //alert("Echec authentification!!");
                window.location.replace("index.php");
                 </script>
            <?php
          }
            $requete->closeCursor();
        
?>
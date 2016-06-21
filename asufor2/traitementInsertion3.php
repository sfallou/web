<?php
session_start();
include("MesFonctions.php");
if(isset($_FILES['photo2'])){
$tofo=$_FILES['photo2']['name'];
$extensions=array('.png','.PNG','.jpg','.JPG');
$typetof=strrchr($tofo,".");
$linktof=$_FILES['photo2']['tmp_name'];
if(in_array($typetof,$extensions)){
        $nom=$_SESSION['cty_nom'];
        $tofo="conjoint$nom$tofo";
        $transfert=move_uploaded_file($linktof,'photo/'.$tofo);
        $_SESSION['cty_photoConjoint']=$tofo;

    }
}
$prenomPere=$_POST['prenomPere'];
$prenomMere=$_POST['prenomMere'];
$nomMere=$_POST['nomMere'];
$prenomConjoint=$_POST['prenomConjoint'];
$nomConjoint=$_POST['nomConjoint'];

$_SESSION['cty_prenomPere']=$prenomPere;
$_SESSION['cty_prenomMere']=$prenomMere;
$_SESSION['cty_nomMere']=$nomMere;
$_SESSION['cty_prenomConjoint']=$prenomConjoint;
$_SESSION['cty_nomConjoint']=$nomConjoint;

/*----------Génération de l'immatriculation---------*/
$immatricule=numeroImmatriculation();
$dateImmatricule=date("Y-m-d");
$_SESSION['cty_immatricule']=$immatricule;
$_SESSION['cty_dateImmatricule']=$dateImmatricule;


echo " -------- Resume: -------- <br/><br/>";
echo "-------------Informations personnelles--------------:<br/>";
echo"Nom: ";echo$_SESSION['cty_nom'];echo"<br/>";
echo"Prenom :";echo$_SESSION['cty_prenom'];echo"<br/>";
echo"Nom Photo :";echo$_SESSION['cty_photo'];echo"<br/>";
echo"CNI :";echo$_SESSION['cty_cni'];echo"<br/>";
echo"Date naissance :";echo$_SESSION['cty_datenaissance'];echo"<br/>";
echo"Lieu naissance :";echo$_SESSION['cty_adresse'];echo"<br/>";
echo"Date delivrance cni :";echo$_SESSION['cty_datecnidelivre'];echo"<br/>";
echo"Date expiration cni :";echo$_SESSION['cty_datecniexpire'];echo"<br/>";
echo"Sexe :";echo$_SESSION['cty_sexe'];echo"<br/>";
echo"Profession :";echo$_SESSION['cty_profession'];echo"<br/>";
echo"specialite :";echo$_SESSION['cty_specialite'];echo"<br/>";
echo"Matrimonial :";echo$_SESSION['cty_matrimonial'];echo"<br/>";
echo"Date d'entree au Gondwana :";echo$_SESSION['cty_dateentre'];echo"<br/>";
echo"Teint :";echo$_SESSION['cty_teint'];echo"<br/>";
echo"Taille :";echo$_SESSION['cty_taille'];echo"<br/>";
echo"Immatriculation :";echo$_SESSION['cty_immatricule'];echo"<br/>";
echo"Date Immatriculation :";echo$_SESSION['cty_dateImmatricule'];echo"<br/><br/>";

echo "-------------Coordonnees--------------:<br/>";

echo"Telephone:";echo$_SESSION['cty_tel'];echo"<br/>";
echo"Email:";echo$_SESSION['cty_email'];echo"<br/>";
echo"Telephone Gondwana:";echo$_SESSION['cty_telGondwana'];echo"<br/>";
echo"Adresse Gondwana:";echo$_SESSION['cty_adresseGondwana'];echo"<br/>";
echo"Telephone Senegal:";echo$_SESSION['cty_telSenegal'];echo"<br/>";
echo"Adresse Senegal:";echo$_SESSION['cty_adresseSenegal'];echo"<br/>";
echo"Adresse Travail:";echo$_SESSION['cty_adresseTravail'];echo"<br/>";
echo"Adresse Domicile:";echo$_SESSION['cty_adresseDomicile'];echo"<br/><br/>";

echo "-------------Familles--------------:<br/>";
echo"Prenom du Pere: ";echo$_SESSION['cty_prenomPere'];echo"<br/>";
echo"Prenom de la mere: ";echo$_SESSION['cty_prenomMere'];echo"<br/>";
echo"Nom de la mere: ";echo$_SESSION['cty_nomMere'];echo"<br/>";
echo"Prenom Conjoint(e) ";echo$_SESSION['cty_prenomConjoint'];echo"<br/>";
echo"Nom Conjoint(e): ";echo$_SESSION['cty_nomConjoint'];echo"<br/>";
echo"Photo Conjoint(e): ";echo$_SESSION['cty_photoConjoint'];echo"<br/><br>";

/*echo'<center><form method="POST" action="traitementInsertion3.php">
    <input type="submit" name="Valider" value="Valider" ><br/><br/>
    </form></center>';

if(isset($_POST['Valider'])){
/*********** insertion dans la base de donnees************/

ajouterCitoyen($_SESSION['cty_nom'],$_SESSION['cty_prenom'],$_SESSION['cty_datenaissance'],$_SESSION['cty_adresse'],$_SESSION['cty_cni'],$_SESSION['cty_sexe'],$_SESSION['cty_datecnidelivre'],$_SESSION['cty_datecniexpire'],$_SESSION['cty_profession'],$_SESSION['cty_specialite'],$_SESSION['cty_matrimonial'],$_SESSION['cty_dateentre'],$_SESSION['cty_photo'],$_SESSION['cty_teint'],$_SESSION['cty_taille'],$_SESSION['cty_immatricule'],$_SESSION['cty_dateImmatricule']);

ajouterContact($_SESSION['cty_tel'],$_SESSION['cty_email'],$_SESSION['cty_telGondwana'],$_SESSION['cty_adresseGondwana'],$_SESSION['cty_telSenegal'],$_SESSION['cty_adresseSenegal'],$_SESSION['cty_adresseTravail'],$_SESSION['cty_adresseDomicile'],$_SESSION['cty_cni']);

ajouterParent($_SESSION['cty_prenomPere'],$_SESSION['cty_prenomMere'],$_SESSION['cty_nomMere'],$_SESSION['cty_prenomConjoint'],$_SESSION['cty_nomConjoint'],$_SESSION['cty_photoConjoint'],$_SESSION['cty_cni']);

?>

<script language="JavaScript">
	alert("Enregistrement reussi!");
	window.location.replace("body.php");
	</script>
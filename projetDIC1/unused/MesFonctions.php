<?php
////////////////////////////// ajouter citoyen //////////////////////////////////////////////
function ajouterCitoyen($nom,$prenom,$datenais,$lieunais,$cni,$sexe,$datecnideliv,$datecniexp,$profession,$specialite,$matrimonial,$dateentre,$foto,$teint,$taille,$immatr,$dateimmatr){

  $bdd = new PDO('mysql:host=localhost;dbname=gondwana', 'root', 'passer');
//insertion avec requête préparée
  $sql="INSERT INTO dic_citoyen(cty_prenom, cty_nom, cty_datenaissance, cty_lieunaissance, cty_nci, cty_sexe, cty_datecnidelivre, cty_datecniexpire, cty_profession, cty_specialite, cty_matrimoniale, cty_dateentre, cty_photo, cty_teint, cty_taille, cty_immatricul, cty_dateimmatricul)
 VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$req=$bdd->prepare($sql);
$req->execute(array($nom,$prenom,$datenais,$lieunais,$cni,$sexe,$datecnideliv,$datecniexp,$profession,$specialite,$matrimonial,$dateentre,$foto,$teint,$taille,$immatr,$dateimmatr));
}
//ajouterCitoyen("bass", "Diop", "2015-05-10 00:00:00", "thies", 1238200400779, "masculin", "2015-08-13 00:00:00", "2015-09-10 00:00:00", "etudiant", "informatique", "celibataire", "2015-08-12", "profil.jpg", "noir", "1.3", "0020456", "2015-08-12");


////////////////////////////// ajouter contacte //////////////////////////////////////////////
function ajouterContact($tel,$email,$telGondwana,$adressGondwana,$telSenegal,$adresse,$adresseTravail,$adresseDomicil,$cniCitoyen){

  $bdd = new PDO('mysql:host=localhost;dbname=gondwana', 'root', 'passer');
//insertion avec requête préparée
  $sql="INSERT INTO contacts(cty_telephone, cty_email, cty_telGondwana, cty_adresseGondwana, cty_telSenegal, cty_adresse, cty_adresseTravail, cty_adresseDomicile, cty_contact_cni)
   VALUES (?,?,?,?,?,?,?,?,?)";
$req=$bdd->prepare($sql);
$req->execute(array($tel,$email,$telGondwana,$adressGondwana,$telSenegal,$adresse,$adresseTravail,$adresseDomicil,$cniCitoyen));
}

////////////////////////////// ajouter parent //////////////////////////////////////////////
function ajouterParent($prenomPere,$prenomMere,$nomMere,$prenomConjoint,$nomConjoint,$fotoConjoint,$cniCitoyen){

  $bdd = new PDO('mysql:host=localhost;dbname=gondwana', 'root', 'passer');
//insertion avec requête préparée
  $sql="INSERT INTO parents(cty_prenomPere, cty_prenomMere, cty_nomMere, cty_prenomConjoint, cty_nomConjoint, cty_scanphoto, cty_cniparent)
   VALUES (?,?,?,?,?,?,?)";
$req=$bdd->prepare($sql);
$req->execute(array($prenomPere,$prenomMere,$nomMere,$prenomConjoint,$nomConjoint,$fotoConjoint,$cniCitoyen));
}

////////////////////////////// Fonction de génération automatique des immatricules //////////////////////////////////////////////
function numeroImmatriculation(){
$annee=date('Y');
$num="$annee-";
$bdd = new PDO('mysql:host=localhost;dbname=gondwana', 'root', 'passer');
//recuperation dernier id
  $sql="SELECT * FROM dic_citoyen ";
  $req= $bdd->query($sql);
  $array=$req->fetchALL();
  $nb=count($array);
  //echo "$nb";
  
  $increment=$nb+1;
  $increment="$increment";
  $numeroIncrem = substr_replace("0000",$increment, -strlen($increment));
  $immatricul="$num$numeroIncrem";

 
  //echo "$immatricul";
  return $immatricul;
}
?>
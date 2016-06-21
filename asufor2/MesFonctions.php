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



function updateciyoyen($id,$nom,$prenom,$datenais,$lieunais,$cni,$sexe,$datecnideliv,$datecniexp,$profession,$specialite,$matrimonial,$dateentre,$teint,$taille) {
  $bdd = new PDO('mysql:host=localhost;dbname=gondwana', 'root', 'passer');
  $requete=$bdd->exec("update dic_citoyen set cty_prenom='$prenom', cty_nom='$nom',cty_datenaissance='$datenais',cty_lieunaissance='$lieunais',cty_nci='$cni',cty_sexe='$sexe',cty_datecnidelivre='$datecnideliv',cty_datecniexpire='$datecniexp',cty_profession='$profession', cty_specialite='$specialite',cty_matrimoniale='$matrimonial',cty_dateentre='$dateentre',cty_teint='$teint',cty_taille='$taille' WHERE cty_id='$id'  ");

}

function updatecontact($tel,$email,$telGondwana,$adressGondwana,$telSenegal,$adresse,$adresseTravail,$adresseDomicil,$contactcni) {
   $bdd = new PDO('mysql:host=localhost;dbname=gondwana', 'root', 'passer');
   $requete=$bdd->exec("UPDATE contacts SET cty_telephone='$tel',cty_email='$email',cty_telGondwana=$telGondwana,cty_adresseGondwana='$adressGondwana',cty_telSenegal='$telSenegal',cty_adresse='$adresse',cty_adresseTravail='$adresseTravail',cty_adresseDomicile='$adresseDomicil',cty_contact_cni='$contactcni' WHERE cty_contact_cni='$contactcni' ");
}

function updateparent($cni,$prenomPere,$prenomMere,$nomMere,$prenomConjoint,$nomConjoint){
  $bdd = new PDO('mysql:host=localhost;dbname=gondwana', 'root', 'passer');
  $requete=$bdd->exec("UPDATE parents SET cty_prenomPere='$prenomPere',cty_prenomMere='$prenomMere',cty_nomMere='$nomMere',cty_prenomConjoint='$prenomConjoint',cty_nomConjoint='$nomConjoint' WHERE cty_cniparent=$cni ");
}

?>
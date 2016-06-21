<?php
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
  
  $increment=$nb;
  $increment="$increment";
  $numeroIncrem = substr_replace("0000",$increment, -strlen($increment));
  $immatricul="$num$numeroIncrem";

 
  //echo "$immatricul";
  return $immatricul;
}

/*
function numeroImmatriculation(){
 $id=0;
 $last=0;
 $annee=date('Y');
 $numero = "$annee-";
 $bdd = new PDO('mysql:host=localhost;dbname=gondwana', 'root', 'passer');
//recuperation dernier id
  $sql="SELECT MAX(cty_id) as id FROM dic_citoyen ";
  $req= $bdd->query($sql);

  if($data=$req->fetch()){
  	$id=$data['id'];
  	if($id!=0){
      $req2= $bdd->query("SELECT cty_immatricul FROM dic_citoyen WHERE cty_id=$id");
      if($data2=$req2->fetch()){
      $last=$data2['cty_immatricul'];
      list($year,$increment)=explode("-",$last);
      if($year==$annee){
        $increment+=1;
        $increment="$increment";
        $numeroIncrem = substr_replace("0000",$increment, -strlen($increment));
        $immatricul="$numero$numeroIncrem";
      }
      else{
        $increment=1;
        $increment="$increment";
        $numeroIncrem = substr_replace("0000",$increment, -strlen($increment));
        $immatricul="$numero$numeroIncrem";
      }
    }
  }
  
}
else{
     $immatricul="$numero0001";
  }
return $immatricul;
}
echo numeroImmatriculation();*/
?>
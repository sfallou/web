<?php
require("connexion.php");
$id=$_GET['id'];
if(isset($id)){
    
$req = "select * from dic_citoyen where cty_id= :id ";
$reponse = $bdd->prepare($req);
$reponse->execute(array("id"=>$id));
    // On affiche chaque entrée une à une
    if ($donnees = $reponse->fetch())
    {
        $id=$donnees['cty_id'];
        $immatricul=$donnees['cty_immatricul'];
        $prenom=$donnees['cty_prenom'];
        $nom=$donnees['cty_nom'];
        $datenaiss=$donnees['cty_datenaissance'];
        $lieunaiss=$donnees['cty_lieunaissance'];
        $cni=$donnees['cty_nci'];
        $datecnideliv=$donnees['cty_datecnidelivre'];
        $datecniexpire=$donnees['cty_datecniexpire'];
        $sexe=$donnees['cty_sexe'];
        $profession=$donnees['cty_profession'];
        $specialite=$donnees['cty_specialite'];
        $dateentre=$donnees['cty_dateentre'];
        $teint=$donnees['cty_teint'];
        $taille=$donnees['cty_taille'];
        $photo=$donnees['cty_photo'];
        /*********** récperation des coordonnees*************/
        $req2 = "select * from contacts where cty_contact_cni= :cni ";
        $reponse2 = $bdd->prepare($req2);
        $reponse2->execute(array("cni"=>$cni));
        if($donnees2 = $reponse2->fetch()){
            $tel=$donnees2['cty_telephone'];
            $email=$donnees2['cty_email'];
            $telGondwana=$donnees2['cty_telGondwana'];
            $adresseGondwana=$donnees2['cty_adresseGondwana'];
            $telSenegal=$donnees2['cty_telSenegal'];
            $adresseSenegal=$donnees2['cty_adresse'];
            $adresseTravail=$donnees2['cty_adresseTravail'];
            $adresseDomicile=$donnees2['cty_adresseDomicile'];
        }
        /*************** recuperations informations familiales ***************/
        $req3 = "select * from parents where cty_cniparent= :cni ";
        $reponse3 = $bdd->prepare($req3);
        $reponse3->execute(array("cni"=>$cni));
        if($donnees3 = $reponse3->fetch()){
            $prenomPere=$donnees3['cty_prenomPere'];
            $prenomMere=$donnees3['cty_prenomMere'];
            $nomMere=$donnees3['cty_nomMere'];
            $prenomConjoint=$donnees3['cty_prenomConjoint'];
            $nomConjoint=$donnees3['cty_nomConjoint'];
            $photoConjoint=$donnees3['cty_scanphoto'];
        }
    }

$cheminphoto_cty="./photo/$photo";
$cheminphoto_conjoint="./photo/$photoConjoint";
}
list($datenaiss,$a)=explode(" ", $datenaiss);
?>

<style type="text/css">
<!--
div.minifiche
{
    position:    relative;
    overflow:    hidden;
    width:       454px;
    height:      138px;
    padding:     0;
    font-size:   11px;
    text-align:  left;
    font-weight: normal;
    /*background-image: url(./res/exemple10a.gif);*/
}
div.minifiche img.icone    { position: absolute; border: none; left: 5px;   top: 5px;  width: 240px; height: 128px;overflow: hidden; }
div.minifiche div.zone1    { position: absolute; border: none; left: 257px; top: 8px;  width: 188px; height: 14px; padding-top: 1px; overflow: hidden; text-align: center; font-weight: bold; }
div.minifiche div.zone2    { position: absolute; border: none; left: 315px; top: 28px; width: 131px; height: 14px; padding-top: 1px; overflow: hidden; text-align: left; font-weight: normal; }
div.minifiche div.zone3    { position: absolute; border: none; left: 315px; top: 48px; width: 131px; height: 14px; padding-top: 1px; overflow: hidden; text-align: left; font-weight: normal; }
div.minifiche div.zone4    { position: absolute; border: none; left: 315px; top: 68px; width: 131px; height: 14px; padding-top: 1px; overflow: hidden; text-align: left; font-weight: normal; }
div.minifiche div.zone5    { position: absolute; border: none; left: 315px; top: 88px; width: 131px; height: 14px; padding-top: 1px; overflow: hidden; text-align: left; font-weight: normal; }
div.minifiche div.download { position: absolute; border: none; left: 257px; top: 108px;width: 188px; height: 22px; overflow: hidden; text-align: center; font-weight: normal; }
-->
</style>
<page>
    
    <table style="width: 100%">
        <tr>
            <td style="width: 80%">
                
            </td>
            <td >
               <img src="<?php echo$cheminphoto_cty;?>" />
            </td>
        </tr>
    </table>
    
    
</page>

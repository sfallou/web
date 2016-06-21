<?php
session_start();
require("connexion_bd.php");
require("variables.php");
include("date.php");
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
<title><?php echo $title ?></title>
<link type="text/css" rel="stylesheet" href="css/style.css" />
	<script type="text/javascript" src="calendar.js"></script>
	<script type="text/javascript" src="script/scr3/jquery.js"></script>
	<script type="text/javascript" src="script/scr3/jquery.reveal.js"></script>
	<style>

body

{
	    background: url("images/fond3.png") no-repeat fixed center center / cover transparent;
        background-color: transparent;
        background-image: url("images/fond3.png");
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center center;
        background-clip: border-box;
        background-origin: padding-box;
        background-size: cover;
}

}

</style>
	
<script>
			var _hidediv = null;
			function showdiv(id) {
				if(_hidediv)
				_hidediv();
				var div = document.getElementById(id);
				div.style.display = 'block';
				_hidediv = function () { div.style.display = 'none'; };
							}
</script>

<script type="text/javascript">
function verif_formulaire()
{
 if(document.formulaire.date.value == "")  {
   alert("Veuillez entrer une date");
   document.formulaire.date.focus();
   return false;
  }
 if(document.formulaire.ancien_index.value == "") {
   alert("Veuillez entrer ancien index!");
   document.formulaire.ancien_index.focus();
   return false;
  }
 if(document.formulaire.nouvel_index.value == "") {
   alert("Veuillez entrer nouvel_index!");
   document.formulaire.nouvel_index.focus();
   return false;
  }
 
}

function verification_formulaire()
{
 if(document.formulaire_finance.date1.value == "")  {
   alert("Veuillez entrer la première date");
   document.formulaire_finance.date1.focus();
   return false;
  }
 if(document.formulaire_finance.date2.value == "")  {
   alert("Veuillez entrer la deuxième date");
   document.formulaire_finance.date2.focus();
   return false;
  }
 
}

function verification_formulaire_update()
{
 if(document.formulaire_update.pass1.value == "")  {
   alert("Veuillez entrer le mot de passe actuel!");
   document.formulaire_udate.pass1.focus();
   return false;
  }
 if(document.formulaire_update.pass2.value == "" || document.formulaire_update.pass3.value == "" )  {
   alert("Veuillez remplir correctement les champs!");
   return false;
  }
  if((document.formulaire_update.pass2.value == "" || document.formulaire_update.pass3.value == "" ) && (document.formulaire_update.pass2.value != docuent.formulaire_update.pass3.value) )  {
   alert("Les mots de passe ne coresspondent pas!");
   return false;
  }
 
}

function verification_formulaire_tarif()
{
 if(document.formulaire_tarif.nv_tarif.value == "" || document.formulaire_tarif.nv_tarif.value < 0)  {
   alert("Veuillez entrer une valeur correcte!");
   document.formulaire_tarif.nv_tarif.focus();
   return false;
  }
}

function verification_formulaire_abonne()
{
var prenom=document.formulaire_abonne.prenom.value;
var nom=document.formulaire_abonne.nom.value;
var cni=document.formulaire_abonne.cni.value;
var telephone=document.formulaire_abonne.telephone.value;
var date=document.formulaire_abonne.date_abonnement.value;
var frais=document.formulaire_abonne.frais_abonnement.value;
 if(prenom== "" || nom== "" || cni== "" || telephone== "" || date== "" || frais== "" || cni <0 || telephone <0 || frais <0 )  {
   alert("Veuillez remplir correctement tous les champs!");
   return false;
  }
}
</script>

	</head>

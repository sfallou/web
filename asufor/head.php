<?php
session_start();
//ini_set("display_errors",0);error_reporting(0);
require("connexion_bd.php");
require("variables.php");
include("date.php");
include("changer_format_date.php");
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" />
<title><?php echo $title ?></title>
<link type="text/css" rel="stylesheet" href="css/style.css" />
	<script type="text/javascript" src="./dept_xhr.js" ></script>
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

<script language="javascript">
function plus()
{code_html = '<a href="#" ><img border="0" src="'+pictures[chiffre]+'"></a>';
document.getElementById("zone_bannieres").innerHTML = code_html;
	if(chiffre == longueur)
        { chiffre = 0; }
        else
        { chiffre++; }
changement = 1;
//durée d'affichage d'une bannière en secondes
window.setTimeout("plus()", (changement*2000));}
/* http://www.espacejavascript.com */
pictures = new Array()
pictures[0] = 'images/eau.jpg';
pictures[1] = 'images/robinet.jpg';
pictures[2] = 'images/images.jpg';
longueur = pictures.length-1;

liens = new Array()
liens[0] = 'lien_image1.html';
liens[1] = 'lien_image2.html';
liens[2] = 'lien_image3.html';
chiffre = 0;
</script>

<script type="text/javascript">
function Mois()
{
var mois=document.getElementById('mois').value;
 alert(mois);
}
function verif_formulaire()
{
 
 if(document.formulaire2.nouvel_index.value == "") 
 {
   alert("Veuillez entrer la nouvel_index!");
   return false;
  }
  /*if(document.formulaire.date.value == "")  {
   alert("Veuillez entrer une date");
   document.formulaire.date.focus();
   return false;
  }
 if(document.formulaire.ancien_index.value == "") {
   alert("Veuillez entrer ancien index!");
   document.formulaire.ancien_index.focus();
   return false;
  }*/
 
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


function verification_formulaire_finance()
{
 if(document.formulaire_finance.date.value == "") 
 {
   alert("Veuillez entrer une date correcte!");
   return false;
  }
}

function verification_formulaire_abonne()
{
/*var prenom=document.formulaire_abonne.prenom.value;
var nom=document.formulaire_abonne.nom.value;
var cni=document.formulaire_abonne.cni.value;
var telephone=document.formulaire_abonne.telephone.value;
var date=document.formulaire_abonne.date_abonnement.value;
var frais=document.formulaire_abonne.frais_abonnement.value;*/
 if(document.formulaire_abonne.prenom.value== "")
	{
		alert("Veuillez fournir correctement le prénom!");
		return false;
	}
if(document.formulaire_abonne.nom.value== "")
	{
		alert("Veuillez fournir correctement le nom!");
		return false;
	}
if(document.formulaire_abonne.cni.value== "")
	{
		alert("Veuillez fournir correctement le cni!");
		return false;
	}
if(document.formulaire_abonne.telephone.value== "")
	{
		alert("Veuillez fournir correctement le numéro de téléphone!");
		return false;
	}
if(document.formulaire_abonne.date_abonnement.value== "")
	{
		alert("Veuillez fournir une date correcte!");
		return false;
	}
if(document.formulaire_abonne.frais_abonnement.value== "")
	{
		alert("Veuillez donner une valeur exacte du frais d'abonnement!");
		return false;
	}		
}
</script>

<script type="text/javascript">
//http://www.dynamicdrive.com
//Traduction http://www.outils-web.com

//Taille des images, elle doivent avoir toutes les mêmes dimensions
	var Car_Image_Width=200;
	var Car_Image_Height=100;
	var Car_Border=true;		// true ou false
	var Car_Border_Color="white";
	var Car_Speed=4;
	var Car_Direction=true;		// true or false
	var Car_NoOfSides=8;		// nb de faces 4,6,8 ou 12

/* Liste des images et des liens associés 
le nb d'images à déclarer doit être la moitié du nombre de faces
ici 8 faces donc 4 images
*/
	Car_Image_Sources=new Array(
		"img/img1.gif","",
		"img/img2.gif","",
		"img/img3.gif","", //exemple sans lien
		"img/img4.gif","" //pas de virgule a la derniere
		);

//ne rien modifier ci-dessous
	CW_I=new Array(Car_NoOfSides/2+1);C_ClcW=new Array(Car_NoOfSides/2);
	C_Coef=new Array(
		3*Math.PI/2,0,3*Math.PI/2,11*Math.PI/6,Math.PI/6,3*Math.PI/2,7*Math.PI/4,	0,
		Math.PI/4,3*Math.PI/2,5*Math.PI/3,11*Math.PI/6,0,Math.PI/6,Math.PI/3);
	var C_CoefOf=Car_NoOfSides==4?0:Car_NoOfSides==6?2:Car_NoOfSides==8?5:9;
	C_Pre_Img=new Array(Car_Image_Sources.length);
	var C_Angle=Car_Direction?Math.PI/(Car_NoOfSides/2):0,C_CrImg=Car_NoOfSides,C_MaxW,C_TotalW,
	C_Stppd=false,i,C_LeftOffset,C_HalfNo=Car_NoOfSides/2;

	function Carousel(){
		if(document.getElementById){
			for(i=0;i<Car_Image_Sources.length;i+=2){
				C_Pre_Img[i]=new Image();C_Pre_Img[i].src=Car_Image_Sources[i]}
			C_MaxW=Car_Image_Width/Math.sin(Math.PI/Car_NoOfSides)+C_HalfNo+1;
			Car_Div=document.getElementById("Carousel");
			for(i=0;i<C_HalfNo;i++){
				CW_I[i]=document.createElement("img");Car_Div.appendChild(CW_I[i]);	
				CW_I[i].style.position="absolute";
				CW_I[i].style.top=0+"px";
				CW_I[i].style.height=Car_Image_Height+"px";
				if(Car_Border){
					CW_I[i].style.borderStyle="solid";
					CW_I[i].style.borderWidth=1+"px";
					CW_I[i].style.borderColor=Car_Border_Color}
				CW_I[i].src=Car_Image_Sources[2*i];
				CW_I[i].lnk=Car_Image_Sources[2*i+1];
				CW_I[i].onclick=C_LdLnk;
				}
			CarImages()}}

	function CarImages(){
		if(!C_Stppd){
			C_TotalW=0;
			for(i=0;i<C_HalfNo;i++){
				C_ClcW[i]=Math.round(Math.cos(Math.abs(C_Coef[C_CoefOf+i]+C_Angle))*Car_Image_Width);
				C_TotalW+=C_ClcW[i]}
			C_LeftOffset=(C_MaxW-C_TotalW)/2;
			for(i=0;i<C_HalfNo;i++){
				CW_I[i].style.left=C_LeftOffset+"px";
				CW_I[i].style.width=C_ClcW[i]+"px";
				C_LeftOffset+=C_ClcW[i]}
			C_Angle+=Car_Speed/720*Math.PI*(Car_Direction?-1:1);
			if((Car_Direction&&C_Angle<=0)||(!Car_Direction&&C_Angle>=Math.PI/C_HalfNo)){
				if(C_CrImg==Car_Image_Sources.length)C_CrImg=0;
				if(Car_Direction){
					CW_I[C_HalfNo]=CW_I[0];
					for(i=0;i<C_HalfNo;i++)CW_I[i]=CW_I[i+1];
					CW_I[C_HalfNo-1].src=Car_Image_Sources[C_CrImg];
					CW_I[C_HalfNo-1].lnk=Car_Image_Sources[C_CrImg+1]}
				else{	for(i=C_HalfNo;i>0;i--)CW_I[i]=CW_I[i-1];
					CW_I[0]=CW_I[C_HalfNo];
					CW_I[0].src=Car_Image_Sources[C_CrImg];
					CW_I[0].lnk=Car_Image_Sources[C_CrImg+1]}
				C_Angle=Car_Direction?Math.PI/C_HalfNo:0;C_CrImg+=2}}
		setTimeout("CarImages()",50)}

	function C_LdLnk(){if(this.lnk)window.location.href=this.lnk}
</script>

<script language="javascript"> 
<!-- 
function popupcentree(page,largeur,hauteur,options) {     
        var top=(screen.height-hauteur)/2;     
        var left=(screen.width-largeur)/2;     
        window.open(page,"","top="+top+",left="+left+",width="
	+largeur+",height="+hauteur+","+options); 
} 
--> 
	</script>
	<script language="javascript">
    function OuvrirPopup(page,nom,option) {
       window.open(page,nom,option);
    }
 </script>
<script type="text/javascript">
<!--
var i = 2
var contenu ='';    
function nouveauInput(){
    i = i + 1;
    contenu = contenu +' <tr><td><input type="text" size="8" name="date[]" class="calendrier"/></td><td><input type="text" size="5" name="gazoil[]"/></td><td><input type="text" size="5" name="electricite[]"/></td><td><input type="text" size="5" name="salaire[]"/></td><td><input type="text" size="5" name="entretien[]"/></td><td><input type="text" size="5" name="divers[]"/></td>	<td><textarea name="note[]" cols="10" rows="1"></textarea></td></tr>';
    document.getElementById('nouveau_input').innerHTML = contenu;
}
</script>
	</head>

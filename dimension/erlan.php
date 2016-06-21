<?php

$S=0;
$mu=0;
$lamda=0; 	
$teta=0;

function Facto($n){
	$res=1;
	$n=$n+1;
	for ($i=1;$i<=$n;$i++)
		$res=$res*$i;
	return $res;
}


function Puissance1($p,$n){
	$res=1;
	for ($i=1;$i<=$n;$i++)
		$res=$res*$p;
	return $res;
}
//------------------------------------ Loi d'Erlang B ----------------------------------------//

//– les clients arrivent selon un processus de Poisson de parametre lamda > 0,
//–le temps de service est une loi exponentielle de parametre mu > 0,
//– il y a s serveurs montes en parallele,
//– il n’y a pas de file d’attente.

//Probabilité de perte
function B($teta,$S){
	$somme=0;
	$num = Puissance1($teta,$S)/Facto($S);
	for ($k=0;$k<=$S+1;$k++){
		$somme = $somme + Puissance1($teta,$k)/Facto($k);
	}
	
	return ($num/$somme);
}
//Trafic écoulé
function TrafEc($teta,$S){
	return ($teta*( 1- B($teta,$S)));
}
//-----------------------------------Loi d'Erlang C------------------------------------------//

//Probabilité d'attente
function C($teta,$S){
	$somme = 0;
	$num = Puissance1($teta,$S)/Facto($S);
	$denom =1;
	$a = (1 - ($teta/$S));
	for ($i=0;$i<=$S;$i++){
		$somme = $somme + Puissance1($teta,$i)/Facto($i);	
	}
	$denom = $num + ($a*$somme);
	return ($num/$denom);
}

//Nombre moyen de clients en attente
function Q($teta,$S){
	$num = $teta*C($teta,$S);
	$denom = $S - $teta;
	return $num/$denom;
}
//Temps moyen d'attente dans la file
function tempMoy($teta,$S,$lamda){
	$num = Q($teta,$S);
	$a=$lamda;
	return $num/$a;
}
//Taux de séjour (attente+service)
function t ($teta,$S,$mu,$lamda){
	return (tempMoy($teta,$S,$lamda) + 1/$mu);
}
?>
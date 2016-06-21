<?php

function factoriel($n){
	$res=1;
	$n=$n+1;
	for ($i=1;$i<=$n;$i++)
		$res=$res*$i;
	return $res;
}

function puissance($p,$n){
	$res=1;
	for ($i=1;$i<=$n;$i++)
		$res=$res*$p;
	return $res;
}


function calcul_po($lamda,$mu,$nb){
	$po1=0;
	$theta=(float)($lamda)/(float)($mu);
	for ($i=1;$i<=$n+1;$i++)
		$po1=$po1+puissance($theta,$i)/factoriel($i);
	$po2=puissance($theta,(int)($nb+1)/(factoriel((int)($nb)*((int)($nb-$theta)))));	
		
	$po=1/($po1+$po2);	
	return $po;
}
function calcul_nu($lamda,$mu,$nb){  
	$theta=($lamda)/($mu);
	$m1=puissance($theta,($nb)+1)*calcul_po($lamda,$mu,$nb);
	$m2=($nb)*factoriel(($nb))*puissance(1-$theta/($nb),2);	
	$m=$m1/$m2;
	return $m;
}
function calcul_n($lamda,$mu,$nb){  
	$theta=(float)($lamda)/(float)($mu);
	$n1=calcul_nu($lamda,$mu,$nb)+$theta;
	return $n1;
}

function calcul_t($lamda,$mu,$nb){
	$theta=(float)($lamda)/(float)($mu);
	$tf=calcul_nu($lamda,$mu,$nb)/(float)($lamda);	
	return $tf;
}

function traitement($lamda,$mu,$nb){
	$theta=(float)($lamda/$mu);
	$nbs=$nb;
	$rho=(int)($nbs-$theta);
	if ($theta<1){
		$nu=calcul_nu($lamda,$mu,$nb);
		$tf=calcul_t($lamda,$mu,$nb);
		$n=calcul_n($lamda,$mu,$nb);
		$res="$theta-$nbs-$rho-$nu-$tf-$n";
	}
	else{
		$res="traitement impossible.lamda doit etre superieur a mu";
	}
	return $es;
}



$sms=$_GET['message'];
$numero=$_GET['num'];
//list($lamda,$mu,$nb)=explode(",",$sms);
$tab=explode(" ",$sms);
$lamda=$tab[1];
$mu=$tab[2];
$nb=$tab[3];
$reply="";
$theta=(float)($lamda/$mu);
$nbs=$nb;
$rho=(int)($nbs-$theta);

if ($theta<1){
		$nu=calcul_nu($lamda,$mu,$nb);
		$tf=calcul_t($lamda,$mu,$nb);
		$n=calcul_n($lamda,$mu,$nb);
		$nu = number_format($nu,6);
		$tf = number_format($tf,6);
		$n = number_format($n,6);
		$reply="Pour lamda=$lamda,mu=$mu et nb=$nb, on a les resultats: nu=$nu,n=$n,tf=$tf,rho=$rho";
	}
	else{
		$reply="traitement impossible.lamda doit etre superieur a mu";
	}

echo $reply;
?>

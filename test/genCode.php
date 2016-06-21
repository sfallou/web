<?php
/*fonction qui génére un code aléatoire de 6 caratères*/
function codeNumerique(){
	
	$characts = '1234567890';
	$code = 'FS';
	//4 est le nombre de chiffre aléatoire à ajouter à FS
	for($i=0;$i < 4;$i++){ 
		$code.= substr($characts,rand()%(strlen($characts)),1);
	}
	return $code;
}

$cod=codeNumerique();
echo "$cod";
?>

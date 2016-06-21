<?php
$rv="10 mai 2014";
$heures="10h00";
$code="55889955";
$message="Votre rendez-vous est pour le $rv a $heures.Code RV=$code";
		$cmd="echo $message > /var/spool/asterisk/outgoing/sms.call";
		exec($cmd);
?>

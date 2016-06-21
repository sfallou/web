<?php
require("connexion_bd.php");
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$username=$_POST['username'];
$numero=$_POST['numero'];
$pass=$_POST['passwd'];
$email=$_POST['email'];
$context=$_POST['context'];

		$req=mysql_query("insert into users(username,nom,prenom,numero,mdp,email,context) values('$username','$nom','$prenom',$numero,'$pass','$email','$context')");
		$sip="\n[$username]\ntype=friend\ncontext=$context\nsecret=$pass\nhost=dynamic\ndtmfmode=rfc2833\ncallerid=$prenom $nom<$numero>\nmailbox=$numero@default\ncallgroup=1\nqualify=yes\ndisallow=all\nallow=alaw\nallow=ulaw\nallow=gsm\nallow=g729\nallow=h264\nallow=h263\nallow=h263p\nicesupport=yes\ndirectmedia=no\ntransport=udp\navpf=no\nencryption=no";
		$extension="\n\nexten => $numero,1,Dial(SIP/$username,10,Ttr)\nexten => $numero,n,VoiceMail($numero)\nexten => $numero,n,Hangup()";
		$voicemail="\n$numero = 1234, $username, $email";
		$cmd1="echo \"$sip\" >> /etc/asterisk/sip.conf";
		$cmd2="echo \"$extension\" >> /etc/asterisk/extensions.conf";
		$cmd3="echo \"$voicemail\" >> /etc/asterisk/voicemail.conf";
		$cmd4=" /etc/init.d/asterisk reload";
		exec($cmd1);
		exec($cmd2);
		exec($cmd3);
		exec($cmd4);

header('Location: ajout_client.php');
?>



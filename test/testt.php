<?php
$num=5000;
$date=date("Y-m");
$cmd="cd /usr/local/bin/mbrola && echo \"  10 mars 2015\" > rv_audio$num.txt";
exec($cmd);
$rep="\$LIA_PHON_REP";
$echo="#!/bin/bash\ncd /usr/local/bin/mbrola && $rep/script/lia_nett < rv_audio$num.txt | $rep/script/lia_taggreac | $rep/script/lia_phon | $rep/bin/lia_add_proso > rv_audio$num.pho\n
cd /usr/local/bin/mbrola && ./mbrola -I $rep/data/initfile.lia fr1/fr1 rv_audio$num.pho rv_audio$num.wav\n
mv /usr/local/bin/mbrola/rv_audio$num.wav /son/rv_audio$num.wav\n
sox /son/rv_audio$num.wav -r 8000 -c 1 -g /son/rv_audio$num.gsm\n
mv /son/rv_audio$num.wav /son/rv_audio$num$date.wav";
$fp = fopen("/son/son.sh","w"); // ouverture du fichier en écriture
fputs($fp, "$echo"); // on écrit les commandes dans le fichier
fclose($fp);
$cmd2="chmod -R 777 /son/son.sh ";
exec($cmd2);
$cmd3="/bin/bash /son/son.sh ";
exec($cmd3);
$cmd4="php /var/www/emc2/testt.php";
exec($cmd4);


?>

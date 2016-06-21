<?php
$d=date("d");
$m=date("m");
$y=date("Y");
$h=date("H");
$m=date("i");
$dates=$d.$m.$y.$h.$i; 

$num=$_GET['num']; 
//rv
$mv1 = "mv /son/son_jour$num.gsm /son/son_jour$num$dates.gsm";
exec($mv1);
$mv2 = "mv /son/son_mois$num.gsm /son/son_mois$num$dates.gsm";
exec($mv2);
$mv3 = "mv /son/son_year$num.gsm /son/son_year$num$dates.gsm";
exec($mv3);
$mv4 = "mv /son/son_heure$num.gsm /son/son_heure$num$dates.gsm";
exec($mv4);
$mv5 = "mv /son/son_minute$num.gsm /son/son_minute$num$dates.gsm";
exec($mv5);

//codes
$mv_0 = "mv /son/code_0$num.gsm /son/code_0$num$dates.gsm";
exec($mv_0);
$mv_1 = "mv /son/code_1$num.gsm /son/code_1$num$dates.gsm";
exec($mv_1);
$mv_2 = "mv /son/code_2$num.gsm /son/code_2$num$dates.gsm";
exec($mv_2);
$mv_3 = "mv /son/code_3$num.gsm /son/code_3$num$dates.gsm";
exec($mv_3);
$mv_4 = "mv /son/code_4$num.gsm /son/code_4$num$dates.gsm";
exec($mv_4);
$mv_5 = "mv /son/code_5$num.gsm /son/code_5$num$dates.gsm";
exec($mv_5);
$mv_6 = "mv /son/code_6$num.gsm /son/code_6$num$dates.gsm";
exec($mv_6);
$mv_7 = "mv /son/code_7$num.gsm /son/code_7$num$dates.gsm";
exec($mv_7);


echo"OK";
?>

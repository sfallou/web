 <?php
 $arrayName = array('ok' => 1, 'bon' => 2,'ol' => 3);
 $tab=array_values($arrayName);
 $tabo=array(1,2,3);
 $bool=in_array(4,$tab);
 //print_r($tabo);
 //print_r($arrayName);
 print_r($tab);
 echo "$bool";
 ?>
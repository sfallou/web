<?php
require('secure.php');
function changedate1($date)//$date contient 2006-05-09 
			{
			$array = explode ('-', $date); //on separe 2006 et 05 et 09 dans un new array
			$newdate = $array[2].'/'.$array[1].'/'.$array[0]; //on remet le tout dans le bon sens
			return $newdate; //$newdate contient 09/05/2006 
			}
			
function changedate2($date)//$date contient 10/05/2014
			{
			$array = explode ('-', $date); //on separe 10 et 05 et 2014 dans un new array
			$newdate = $array[2].'-'.$array[1].'-'.$array[0]; //on remet le tout dans le bon sens 
			return $newdate; //$newdate contient 2014-05-10
			}

?>
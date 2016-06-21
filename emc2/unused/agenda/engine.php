<?php

/**
 * This file is part of php-agenda.
 * 
 * php-agenda is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * php-agenda is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with php-agenda; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 * 
 * Copyright 2006-2009, Thomas Abeel
 * 
 * Project: http://sourceforge.net/projects/php-agenda/
 * 
 */
include ('auth/include/session.inc.php');
include ('lang/lang.inc.php');
if (!$session->logged_in) {
	header('Location: login.php');
	die();
}
$db = new DB($dbhost, $dbuser, $dbpass, $dbname);

$messages=array();

switch ($_POST['action']){
	case "addTODO":
	addTODO($db,$session,$_POST['priority'],$_POST['text'],$messages);
	break;
	default:
	//Do nothing
	break;
}
/* Output messages */

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
  <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=ISO-8859-1" />
  <title><?php echo $lang["title"];?></title>
  <link href="engine.css.php" rel="stylesheet" type="text/css"/>
  <meta http-equiv="refresh" content="2;url=index.php"
</head>
<body>

<div id="box">
<?php

echo '<ul>';
foreach($messages as $message){
	echo '<li>'.$message[0].": ".$message[1].'</li>';
}
echo '</ul>';


function addTODO($db,$session,$priority,$text,array &$messages){
	$ret=$db->addTODO($session->id,$priority,$text);
	if($ret!=true)
		$messages[]=array("Error",$ret);
	else
		$messages[]=array("Message","TODO item succesfully added");

}
?>
</div>
</body>
</html>
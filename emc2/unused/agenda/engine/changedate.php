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
 * Copyright 2006, Thomas Abeel
 * 
 * Project: http://sourceforge.net/projects/php-agenda/
 * 
 */
$now = time();
include ('../auth/include/session.inc.php');
if (isset ($_SESSION['current'])) {
	$current = $_SESSION['current'];
} else {
	$current = mktime(0, 0, 0, date("m", $now), date("d", $now), date("Y", $now));
}
//echo $current.'<br>';
if (isset ($_GET['day'])) {
	$_SESSION['current'] = mktime(0, 0, 0, date("m", $current), date("d", $current) + $_GET['day'], date("Y", $current));
} else
	if (isset ($_GET['week'])) {
		$_SESSION['current'] = mktime(0, 0, 0, date("m", $current), date("d", $current) + 7 * $_GET['week'], date("Y", $current));
	} else
		if (isset ($_GET['month'])) {
			$_SESSION['current'] = mktime(0, 0, 0, date("m", $current) + $_GET['month'], date("d", $current), date("Y", $current));
		} else
			if (isset ($_GET['year'])) {
				$_SESSION['current'] = mktime(0, 0, 0, date("m", $current), date("d", $current), date("Y", $current) + $_GET['year']);
			}
$now = time();
if (isset ($_POST["goto"])) {
	$date=$_POST["date"];
	list($year,$month,$day)=split("-",$date);
	$_SESSION['current'] = mktime(0, 0, 0, $month, $day, $year);
} 

if(isset($_GET['date'])){
	$date=$_GET['date'];
	list($year,$month,$day)=split("-",$date);
	$_SESSION['current'] = mktime(0, 0, 0, $month, $day, $year);
}
//echo $_SESSION['current'].'<br>';
header('Location: ' .$session->referrer);
?>


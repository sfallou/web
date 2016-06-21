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
 * Copyright 2006-2007, Thomas Abeel
 * 
 * Project: http://sourceforge.net/projects/php-agenda/
 * 
 */

include ('../auth/include/session.inc.php');
include ('../adodb/adodb.inc.php');
if (!$session->logged_in) {
	header('Location: ../login.php');
	die();
}
$db = ADONewConnection('mysql');
$db->Connect($dbhost, $dbuser, $dbpass, $dbname);
$db->debug = false;

if (isset ($_POST["repeatEvent"])) {
	/*
	 * Get event parameters.
	 */
	$deadline = 0;
	if (isset ($_POST["deadline"])) {
		$deadline = 1;
	}
	$dayevent = 0;
	if (isset ($_POST["dayevent"])) {
		$dayevent = 1;
	}
	/*
	 * Get the FROM date from the post variables. 
	 * If no date is set, use the current day
	 */
	$tmp_date = "";
	if (isset ($_POST["fromdate"]))
		$tmp_date = $_POST["fromdate"];
	if ($tmp_date != "")
		list ($tmp_year, $tmp_month, $tmp_day) = split("-", $tmp_date);
	else {
		$current = $_SESSION["current"];
		$tmp_year = date("Y", $_SESSION["current"]);
		$tmp_month = date("m", $_SESSION["current"]);
		$tmp_day = date("d", $_SESSION["current"]);
	}
	/*
	 *  Get the TO date from the post variables. 
	 *	If no date is set, post for the next 10 years
	 */
	$tmp2_date = "";
	if (isset ($_POST["todate"]))
		$tmp2_date = $_POST["todate"];
	if ($tmp2_date != "")
		list ($tmp2_year, $tmp2_month, $tmp2_day) = split("-", $tmp2_date);
	else {
		$current = $_SESSION["current"];
		$tmp2_year = date("Y", $_SESSION["current"])+10;
		$tmp2_month = date("m", $_SESSION["current"]);
		$tmp2_day = date("d", $_SESSION["current"]);
	}
	/*
	 * Get the time from the post variables.
	 * If there is no time set, consider this to be a daylong event.
	 */
	$tmp_time = "";
	if (isset ($_POST["time"]))
		$tmp_time = $_POST["time"];

	if ($tmp_time != "")
		list ($tmp_hour, $tmp_minute) = split(":", $tmp_time);
	else {
		$tmp_hour = 0;
		$tmp_minute = 0;
		$dayevent = 1;
	}

	$title = mysql_real_escape_string(htmlspecialchars($_POST["title"]));
	$description = mysql_real_escape_string(htmlspecialchars($_POST["description"]));

	$fromdate = mktime($tmp_hour, $tmp_minute, 0, $tmp_month, $tmp_day, $tmp_year);
	$todate = mktime($tmp_hour, $tmp_minute, 0, $tmp2_month, $tmp2_day, $tmp2_year);
	$insertdate = $fromdate;
	while ($insertdate <= $todate) {
		$db->Execute("insert into events (`user_id`,`date`,`title`,`description`,`added`,`deadline`,`dayevent`) " .
		"values(" . $session->id . "," . $insertdate . ",'$title','$description'," . time() . ",$deadline,$dayevent);");
		switch ($_POST["frequency"]) {
			case 'daily' :
				$insertdate = mktime($tmp_hour, $tmp_minute, 0, date('m', $insertdate), date('d', $insertdate) + 1, date('Y', $insertdate));
				break;
			case 'weekdays' :
				if (date('w', $insertdate) == 5){//friday
					$insertdate = mktime($tmp_hour, $tmp_minute, 0, date('m', $insertdate), date('d', $insertdate) + 3, date('Y', $insertdate));
				}elseif (date('w', $insertdate) == 6){//saturday
					$insertdate = mktime($tmp_hour, $tmp_minute, 0, date('m', $insertdate), date('d', $insertdate) + 2, date('Y', $insertdate));
				}else{//other day
					$insertdate = mktime($tmp_hour, $tmp_minute, 0, date('m', $insertdate), date('d', $insertdate) + 1, date('Y', $insertdate));
				}
				break;
			case 'weekly' :
				$insertdate = mktime($tmp_hour, $tmp_minute, 0, date('m', $insertdate), date('d', $insertdate) + 7, date('Y', $insertdate));
				break;
			case 'biweekly' :
                $insertdate = mktime($tmp_hour, $tmp_minute, 0, date('m', $insertdate), date('d', $insertdate) + 14, date('Y', $insertdate));
                break;
			case 'monthly' :
				$insertdate = mktime($tmp_hour, $tmp_minute, 0, date('m', $insertdate) + 1, date('d', $insertdate), date('Y', $insertdate));
				break;
			case 'yearly' :
				$insertdate = mktime($tmp_hour, $tmp_minute, 0, date('m', $insertdate), date('d', $insertdate), date('Y', $insertdate) + 1);
				break;
			default :
				$insertdate = mktime($tmp_hour, $tmp_minute, 0, date('m', $insertdate), date('d', $insertdate), date('Y', $insertdate) + 1);
		}
	}

}
$db->Close();
header("Location: ..");
?>

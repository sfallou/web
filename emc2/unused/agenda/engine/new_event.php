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

if (isset ($_POST["newEvent"])) {
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
	 * Get the date from the post variables. 
	 * If no date is set, use the current day
	 */
	$tmp_date = "";
	if (isset ($_POST["date"]))
		$tmp_date = $_POST["date"];
	if ($tmp_date != "")
		list ($tmp_year, $tmp_month, $tmp_day) = split("-", $tmp_date);
	else {
		$current = $_SESSION["current"];
		$tmp_year = date("Y", $_SESSION["current"]);
		$tmp_month = date("m", $_SESSION["current"]);
		$tmp_day = date("d", $_SESSION["current"]);
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

	$date = mktime($tmp_hour, $tmp_minute, 0, $tmp_month, $tmp_day, $tmp_year);
	if ($title != "") {
		$db->Execute("insert into events (`user_id`,`date`,`title`,`description`,`added`,`deadline`,`dayevent`) " .
		"values(" . $session->id . "," . $date . ",'$title','$description'," . time() . ",$deadline,$dayevent);");
		$insertID = $db->Insert_ID();
		if ($_POST["x1day"]) {
			$localDate = mktime($tmp_hour, $tmp_minute, 0, $tmp_month, $tmp_day -1, $tmp_year);
			$db->Execute("insert into reminders (`userid`,`eventid`,`time`) values (" . $session->id . "," . $insertID . "," . $localDate . ")");
		}
		if ($_POST["x3hour"]) {
			$localDate = mktime($tmp_hour-3, $tmp_minute, 0, $tmp_month, $tmp_day, $tmp_year);
			$db->Execute("insert into reminders (`userid`,`eventid`,`time`) values (" . $session->id . "," . $insertID . "," . $localDate . ")");
		}
		if ($_POST["x1hour"]) {
			$localDate = mktime($tmp_hour-1, $tmp_minute, 0, $tmp_month, $tmp_day, $tmp_year);
			$db->Execute("insert into reminders (`userid`,`eventid`,`time`) values (" . $session->id . "," . $insertID . "," . $localDate . ")");
		}
		if ($_POST["x15min"]) {
			$localDate = mktime($tmp_hour, $tmp_minute-15, 0, $tmp_month, $tmp_day, $tmp_year);
			$db->Execute("insert into reminders (`userid`,`eventid`,`time`) values (" . $session->id . "," . $insertID . "," . $localDate . ")");
		}
		unset ($_POST["newEvent"]);

	}

}
$db->Close();
header("Location: ..");
?>

<?php
header('Content-type: text/html; charset=utf-8');

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
?>
<?php


include ('auth/include/session.inc.php');
if (!$session->logged_in) {
	header('Location: login.php');
	die();
}
/*
 * Load languages
 */
include ('lang/lang.inc.php');
/*
 * Rest of the includes
 */
include ('adodb/adodb.inc.php');
$db = ADONewConnection('mysql');
$db->Connect($dbhost, $dbuser, $dbpass, $dbname);
$db->debug = false;

//business logic
if (isset ($_POST["editEvent"])) {
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
	$tmp_eventid = mysql_real_escape_string(htmlspecialchars($_POST["hiddenid"]));
	
	$cleanEventID=-1;
	if(is_numeric($tmp_eventid)){
		$cleanEventID=$tmp_eventid;
	}
	
	$date = mktime($tmp_hour, $tmp_minute, 0, $tmp_month, $tmp_day, $tmp_year);
	if ($singleAgenda)
		$sql = "update events set `date`=$date,`title`='$title', `description`='$description',`deadline`=$deadline,`dayevent`=$dayevent where id=$cleanEventID";
	else
		$sql = "update events set `date`=$date,`title`='$title', `description`='$description',`deadline`=$deadline,`dayevent`=$dayevent where id=$cleanEventIDand and user_id=" . $session->id;
	//	$sql="update events (`date`,`title`,`description`,`added`,`deadline`,`dayevent`) " .
	//	"values(" . $date . ",'$title','$description'," . time() . ",$deadline,$dayevent);";
	$db->Execute($sql);
	unset ($_POST["editEvent"]);
	$redirect_date = mktime(0, 0, 0, $tmp_month, $tmp_day, $tmp_year);
	header("Location: index.php?day=$redirect_date");
	die();
}

if (isset ($_GET["eventid"])) {
	
	$cleanEventID=-1;
	if(is_numeric($_GET["eventid"])){
		$cleanEventID=$_GET["eventid"];
	}
	
	$eventid = mysql_real_escape_string($cleanEventID);
	/* Get activity information */
	if ($singleAgenda)
		$sql = "select * from events where id=$eventid";
	else
		$sql = "select * from events where id=$eventid and user_id=" . $session->id;
	$recordXSet = $db->Execute($sql);
	$count = 0;
	while (!$recordXSet->EOF) {
		$count++;
		$datetime = $recordXSet->fields["date"];
		$title = $recordXSet->fields["title"];
		$description = $recordXSet->fields["description"];
		$deadline = $recordXSet->fields["deadline"];
		$dayevent = $recordXSet->fields["dayevent"];
		$recordXSet->MoveNext();
	}
	if ($count == 0) { //Trying to edit someone else event
		header("Location: index.php");
	}
	$edit_day = date("d", $datetime);
	$edit_month = date("m", $datetime);
	$edit_year = date("Y", $datetime);
	$edit_hour = date("H", $datetime);
	$edit_minute = date("i", $datetime);
	$insert_deadline = "";
	if ($deadline == 1) {
		$insert_deadline = "checked";
	}
	
?>
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	   		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
		<head>
  			<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
  			<title>The Simple PHP Agenda</title>
  			<link href="style.css.php" rel="stylesheet" type="text/css"/>
  			<link href="CalendarControl.css" rel="stylesheet" type="text/css"/>
  			<link href="TimeControl.css" rel="stylesheet" type="text/css"/>
		</head>
		<body>
		<script src="CalendarControl.js.php" language="javascript"></script>
		<script src="TimeControl.js.php" language="javascript"></script>

		<div align="center" id="editbox">
		<h3><?php echo $lang['edit-boxtitle'];?></h3>
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		<label for="date"><?php echo $lang['edit-date'];?>: </label>
		<input name="date" onfocus="showCalendarControl(this);" type="text" value="<?php echo $edit_year.'-'.$edit_month.'-'.$edit_day;?>"/><br/>
		<label for"time"><?php echo $lang['edit-time'];?>: </label>
		<?php


	if ($dayevent) {
		echo '<input name="time" onfocus="showTimeControl(this);" type="text" value=""/><br/>';
	} else {
		echo '<input name="time" onfocus="showTimeControl(this);" type="text" value="' . $edit_hour . ':' . $edit_minute . '"/><br/>';
	}
?>
		
		<input type="hidden" name="hiddenid" value="<?php echo $eventid;?>"/>
		
		
		<label for="title"><?php echo $lang['edit-title'];?>: </label>
		<input type="text" name="title" value="<?php echo $title;?>"/><br/>
		<label for="description"><?php echo $lang['edit-description'];?>: </label>
		<input type="text" name="description" value="<?php echo $description;?>"/><br/>
		<input type="checkbox" name="deadline" value="deadline" <?php echo $insert_deadline;?>><?php echo $lang['edit-deadline'];?></input><br/>
		<p><input type="submit" name="editEvent" value="<?php echo $lang['edit-button'];?>"/>&nbsp;&nbsp;<input type="button" value="<?php echo $lang['edit-return'];?>" onclick="javascript:document.location.href='index.php?day=<?php echo $datetime;?>'" /></p>
		</form>
		</div>
	
<?php


} else {
	//when there is no eventid, go back to the main page
	header("Location: index.php");
}

$db->Close();
?>
</body>
</html>

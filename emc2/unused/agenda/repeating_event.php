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
include ('auth/include/session.inc.php');
include ('lang/lang.inc.php');

include ('adodb/adodb.inc.php');

$db = ADONewConnection('mysql');
$db->Connect($dbhost, $dbuser, $dbpass, $dbname);
$db->debug = false;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
  <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
  <title><?php echo $lang["title"];?></title>
  <link href="style.css.php" rel="stylesheet" type="text/css"/>
  <link href="CalendarControl.css" rel="stylesheet" type="text/css"/>
  <link href="TimeControl.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<script src="CalendarControl.js.php" language="javascript"></script>
<script src="TimeControl.js.php" language="javascript"></script>
<div class="box">
<h3><?php echo $lang["repeat-addevent"];?></h3>
<a href="index.php">[<?php echo $lang['back'];?>]</a>
<form action="engine/new_repeat.php" method="POST" >
<table>
<tr><td>
	<label for="fromdate"><?php echo $lang["repeat-fromdate"];?> (yyyy-mm-dd):</label>
</td><td>
	<input name="fromdate" onfocus="showCalendarControl(this);" type="text"/>
</td></tr>
<tr><td>
	<label for="todate"><?php echo $lang["repeat-todate"];?> (yyyy-mm-dd):</label>
</td>
<td>
	<input name="todate" onfocus="showCalendarControl(this);" type="text"/>
</td></tr>
<tr><td>
	<label for="time"><?php echo $lang["time"];?> (HH:MM):</label>
</td><td>
	<input name="time" onfocus="showTimeControl(this);" type="text"/>
</td></tr>
<tr><td colspan=2>
	<input type="checkbox" name="dayevent" value="dayevent"><?php echo $lang['add-daylong'];?></input>
</td></tr>
<tr><td colspan=2>
	<input type="checkbox" name="deadline" value="deadline"><?php echo $lang['add-deadline'];?></input>
</td></tr>
<tr><td>
	<label for="title"><?php echo $lang['add-title'];?></label>
</td><td>
	<input type="text" name="title" width="50" />
</td></tr>
<tr><td>
	<label for="description"><?php echo $lang['add-description'];?></label>
</td><td>
	<input type="text" name="description" width="50" />
</td></tr>
<tr><td>
	<label for="frequency"><?php echo $lang['repeat-frequency'];?></label>
</td><td>
	<select name="frequency" size="1">
	<option value="daily"><?php echo $lang['frequency-daily'];?></option>
	<option value="weekdays"><?php echo $lang['frequency-weekdays'];?></option>
	<option value="weekly"><?php echo $lang['frequency-weekly'];?></option>
	<option value="biweekly"><?php echo $lang['frequency-biweekly'];?></option>
	<option value="monthly"><?php echo $lang['frequency-monthly'];?></option>
	<option value="yearly"><?php echo $lang['frequency-yearly'];?></option>
</select>
</td></tr>
<tr><td>
	<input type="submit" value="<?php echo $lang['add-button'];?>" name="repeatEvent"/>
</td></tr>
</table>
</form>
</div>
</body>
</html>

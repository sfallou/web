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
/* Auto load function for missing classes */

/* Check whether there is already an agenda installed, if not, move to the install script. */
// TODO install detection could be done better
if (!file_exists('config.inc.php')) {
	header('Location: install.php');
}

include ('auth/include/session.inc.php');
if (!$session->logged_in && !$allowGuestAccess) {
	header('Location: login.php');
	die();
}
// config.inc.php should be included by now
$dbNew = new DB($dbhost, $dbuser, $dbpass, $dbname);

include ('lang/lang.inc.php');
if (isset ($_SESSION['current'])) {
	$current = $_SESSION['current'];
} else {
	$now = time();
	$current = mktime(0, 0, 0, date("m", $now), date("d", $now), date("Y", $now));
	$_SESSION['current'] = $current;
}
/*
 * Rest of the includes
 */
include ('includes/functions.inc.php');
include ('includes/monthtable.inc.php');
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
<script src="CalendarControl.js.php" type="text/javascript"></script>
<script src="TimeControl.js.php" type="text/javascript"></script>
<?php


/*
 * ============================================================================
 * Busines logic
 */

//events

if (isset ($_GET["deleteEvent"]) && $session->logged_in) {
	$deleteid = mysql_real_escape_string($_GET["deleteEvent"]);
	if ($singleAgenda)
		$db->Execute("update events set status=1 where id=$deleteid");
	else
		$db->Execute("update events set status=1 where id=$deleteid and user_id=" . $session->id);
	unset ($_GET["deleteEvent"]);
}
if (isset ($_GET["deleteTODO"]) && $session->logged_in) {
	$deleteid = mysql_real_escape_string($_GET["deleteTODO"]);
	if ($singleAgenda)
		$db->Execute("update todo set status=1 where id=$deleteid");
	else
		$db->Execute("update todo set status=1 where id=$deleteid and user_id=" . $session->id);
	unset ($_GET["deleteTODO"]);
}
if (isset ($_GET["finishTODO"]) && $session->logged_in) {
	$finishid = mysql_real_escape_string($_GET["finishTODO"]);
	$time = time();
	if($singleAgenda)
		$db->Execute("update todo set status=2, closed=$time where id=$finishid");
		else
		$db->Execute("update todo set status=2, closed=$time where id=$finishid and user_id=" . $session->id);
	unset ($_GET["finishTODO"]);
}
if (isset ($_GET["finishEVENT"]) && $session->logged_in) {
	$finishid = mysql_real_escape_string($_GET["finishEVENT"]);
	$time = time();
	if($singleAgenda)
	$db->Execute("update events set status=2 where id=$finishid");
	else
	$db->Execute("update events set status=2 where id=$finishid and user_id=" . $session->id);
	unset ($_GET["finishEVENT"]);
}
if (isset ($_GET["newprior"]) && $session->logged_in) {

	$newprior = mysql_real_escape_string($_GET["newprior"]);
	if ($newprior >= 0 and $newprior <= 5) {
		$tmp_id = mysql_real_escape_string($_GET["eventid"]);
		if($singleAgenda)
			$db->Execute("update todo set priority=$newprior where id=$tmp_id and user_id=" . $session->id);
			else
			$db->Execute("update todo set priority=$newprior where id=$tmp_id");
	}
	unset ($_GET["newprior"]);
}

/*
 * ============================================================================
 */
?>

<!-- header div -->
<div id="hdr">
<div style="padding-left:10px;text-align: left;float: left;">
<?php


echo '<a href="engine/changedate.php?date=' . date("Y-m-d", time()) . '">' . strftime("%A, %d %B, %Y", time()) . '</a>,<br /> ';

if ($session->logged_in) {
	echo $lang['loggedin'] . ': <a href="auth/useredit.php">' . $session->username . '</a>';
} else {
	echo '[<a href="login.php">' . $lang['login'] . '</a>]';
}
if ($session->isAdmin()) {
	echo ' [<a href="auth/admin/admin.php">Admin Center</a>]';
}

if ($session->logged_in) {
	echo ' [<a href="auth/process.php">' . $lang['logout'] . '</a>]';
}
?>
</div>
</div>
<!-- center column -->
<div id="c-block">
<div id="c-col">
<?php


if (isset ($_GET["page"])) {
	switch ($_GET["page"]) {
		case "navlinks" :
			include ('pages/navlinks.inc.php');
			break;
		case "overview" :
			include ('pages/overview.inc.php');
			break;
		case "todo" :
			include ('pages/todo.inc.php');
			break;
		default :
			include ('pages/normal.inc.php');
	}

} else {
	include ('pages/normal.inc.php');
}
if ($session->logged_in) {
	include ('includes/addevent.inc.php');
}
?>
<div class="box">
<h4><?php echo $lang['index-addtodo'];?></h4>
<form action="engine.php" method="post" >
<fieldset>
<input type="hidden" name="action" value="addTODO" />
	<label for="priority"><?php echo $lang['todo-priority'];?></label>
	<select id="priority" name="priority" size="1">
		<option value="4"><?php echo $lang['todo-today'];?></option>
		<option value="5"><?php echo $lang['todo-urgent'];?></option>
		<option value="3"><?php echo $lang['todo-week'];?></option>
		<option value="2"><?php echo $lang['todo-month'];?></option>
		<option value="1"><?php echo $lang['todo-year'];?></option>
		<option value="0"><?php echo $lang['todo-sometime'];?></option>
	</select><br/>
	<label for="text"><?php echo $lang['todo-description'];?></label>
	<input id ="text" type="text" name="text" size="50" />
	<input type="submit" value="<?php echo $lang['todo-button'];?>" name="newTODO"/>
</fieldset>
</form>
</div>
<!-- ===================== NEXT EVENTS BOX ========================= -->
<div class="box">
<h4><?php echo $lang['nextevents'];?></h4>
<?php


if ($session->logged_in&&!$singleAgenda) {
	$sql = "select distinct * from events where status!=1 and date>=" . time() . " and user_id=" . $session->id . " order by date asc limit 20";
} else {
	$sql = "select distinct * from events where status!=1 and date>=" . time() . " order by date asc limit 20";
}
$recordXSet = $db->Execute($sql);
echo '<table width="100%">';
echo '<tr><td></td><td></td></tr>'; //for xhtml strict if there are no events
while (!$recordXSet->EOF) {
	$nextid = $recordXSet->fields["id"];

	echo '<tr>';
	if ($recordXSet->fields["dayevent"] == 0)
		echo '<td width="25%" align="left"><a href="engine/changedate.php?date=' . date("Y-m-d", $recordXSet->fields["date"]) . '">' . date("j-m-y  H:i", $recordXSet->fields["date"]) . '</a></td>';
	else
		echo '<td width="25%" align="left"><a href="engine/changedate.php?date=' . date("Y-m-d", $recordXSet->fields["date"]) . '">' . date("j-m-y", $recordXSet->fields["date"]) . '</a></td>';
	echo '<td align="left"><span title="' . $recordXSet->fields["description"] . '">' . $recordXSet->fields["title"] . "</span></td>";
	echo "<td width=\"5%\" align=\"right\"><a href=\"?deleteEvent=$nextid\" onClick=\"javascript:return confirm('" . $lang['certainremove'] . "')\"><img src=\"img/delete.png\"/ alt=\"delete\"/></a></td>";
	echo '</tr>';

	$recordXSet->MoveNext();
}
echo '</table>';
?>
</div>
</div>
<!-- end of center column -->
</div>
<!-- end c-block -->
<!-- ===================== FOOTER ========================= -->
<div id="ftr">
	<?php include('includes/footer.php');?>
</div>
<!-- ====================== LEFT ========================== -->
<!-- left column -->
<div id="lh-col">
<div class="box">
<!-- coming days -->
<table width="100%">
<?php


echo '<tr><td colspan="7" align="center"><b>' . $lang['left-coming'] . '</b></td></tr>';
echo '<tr>';
for ($i = 0; $i < 7; $i++) {
	$xcolor = '#ffffff';
	$tmp = mktime(0, 0, 0, date("m", $now), date("d", $now) + $i, date("Y", $now));
	$tmp1 = mktime(0, 0, 0, date("m", $now), date("d", $now) + $i +1, date("Y", $now));
	if ($session->logged_in&&!$singleAgenda) {
		$sql = "select * from events where status!=1 and date>=$tmp and date<$tmp1 and user_id=" . $session->id . " order by date asc";
	} else {
		$sql = "select * from events where status!=1 and date>=$tmp and date<$tmp1 order by date asc";
	}
	$recordSet = & $db->Execute($sql);
	$count = 0;
	while (!$recordSet->EOF) {
		$count++;
		$recordSet->MoveNext();

	}
	if ($count > 0) {
		$xcolor = '#ff0000';
	}
	if (date("w", $tmp) == 0 or date("w", $tmp) == 6)
		echo '<td><span style="background: ' . $xcolor . ' ;"><b><a href="engine/changedate.php?date=' . date("Y-m-d", $tmp) . '">' . date("j", $tmp) . "</a></b></span></td>";
	else
		echo '<td><span style="background: ' . $xcolor . ' ;"><a href="engine/changedate.php?date=' . date("Y-m-d", $tmp) . '">' . date("j", $tmp) . "</a></span></td>";
}
echo '</tr>';
?>
</table>
</div>
<!-- previous MONTH -->
<div class="box">
<?php


printmonthtable(-1, $db, $current);
?>
</div>
<!-- this MONTH -->
<div class="box">
<?php


printmonthtable(0, $db, $current);
?>
</div>
<div class="box">
<!-- next MONTH -->
<?php


printmonthtable(1, $db, $current);
?>
</div>
</div>
<!-- end of left column -->
<!-- ======================= RIGHT ================================ -->
<!-- right column -->
<div id="rh-col">
<!-- === DEADLINES === -->
<div class="box">
<div style="text-align: center;">
<h4><?php echo $lang['right-deadline'];?></h4>
</div>
<?php


if ($session->logged_in&&!$singleAgenda) {
	$sql = "select * from events where status=0 and deadline=1 and user_id=" . $session->id . " order by date asc limit 10 ";
} else {
	$sql = "select * from events where status=0 and deadline=1 order by date asc limit 10 ";
}
$recordSet = & $db->Execute($sql);

while (!$recordSet->EOF) {

	$deadid = $recordSet->fields["id"];
	$dtime = $recordSet->fields["date"];
	$days = (int) (($dtime - $today) / (60 * 60 * 24));
	echo "<a onClick=\"javascript:return confirm('" . $lang['certainfinish'] . "')\" href=\"?finishEVENT=$deadid\"><img height='100%' src=\"img/finished.png\" alt=\"finish\" /></a>";
	echo ' <b><a href="engine/changedate.php?date=' . date("Y-m-d", $dtime) . '">' . date("j-m-y", $dtime) . '(' . $days . ')</a>: </b><span title="' . $recordSet->fields["description"] . '">' . $recordSet->fields["title"] . '</span>';
	echo '<br/>';
	$recordSet->MoveNext();
}
?>
</div>

<!-- === TODO LIST === -->
<div class="box">
<div style="text-align: center;">
	<h4><a href="?page=todo"><?php echo $lang['right-todo'];?></a></h4>
</div>
<?php


printTODOlist($db, true, 10);
?>

</div>

<div class="box">
<div style="text-align:center;">
	<h4><?php echo $lang['right-recently'];?></h4>
</div>
<?php


if ($session->logged_in&&!$singleAgenda) {
	$sql = "select * from todo where status=2 and user_id=" . $session->id . " order by closed desc limit 10";
} else {
	$sql = "select * from todo where status=2 order by closed desc limit 10";
}
$recordSet = & $db->Execute($sql);
$count = 0;
if (!$recordSet->EOF)
	echo "<ul>";
while (!$recordSet->EOF) {
	$count++;
	echo '<div class="todo">';
	$recentid = $recordSet->fields["id"];
	$priority = $recordSet->fields["priority"];
	echo "<div width: 100%>";
	echo "<li>" . $recordSet->fields["text"] . "</li>";
	echo "</div>";
	echo '</div>';
	$recordSet->MoveNext();
}
if ($count > 0)
	echo '</ul>';
?>


</div>
</div>
<!-- end of right column -->
</body>
</html>
<?php


$db->Close();
?>


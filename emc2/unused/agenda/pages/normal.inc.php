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

function isURL($url) {
	return preg_match('/^(http|https|ftp):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,6}((:[0-9]{1,5})?\/.*)?$/i', $url);
}

function printAppointmentHTML($title, $description, $deadline, $dayevent, $date, $eventid) {
	global $lang;
	$deadlineHTML = "";
	if ($deadline)
		$deadlineHTML = '<img alt="deadline" src="img/deadline.gif"/>';
	if (!$dayevent)
		echo '<td width="15%" align="right">' . $deadlineHTML . date("H:i", $date) . '</td>';
	else
		echo '<td width="15%" align="right">' . $deadlineHTML . '<img alt="dayevent" src="img/clock.png"/></td>';

	echo '<td align="left">';

	if (isURL($description)) {
		echo '<a title="' . $description . '" href="' . $description . '">' . $title . '</a>';
	} else {

		echo '<span title="' . $description . '">' . $title . '</span>';
	}
	echo '</td>';
	echo '<td width="10%" align="right"><a href="edit_event.php?eventid=' . $eventid . '"><img src="img/edit.png" alt="edit"/></a><a href="?deleteEvent=' . $eventid . '" onClick="javascript:return confirm(\'' . $lang['certainremove'] . '\')"><img src="img/delete.png" alt="delete"/></a></td>';

}

include (dirname(__FILE__) . '/navlinks.inc.php');
echo '<div class="box">';
echo '<h3>' . $lang["index-appointments"] . '</h3>';

//select events for today
$dayofweek = date("w", $current) + 1;
$dayofmonth = date("j", $current);
$dayofyear = date("z", $current) + 1;

$next = mktime(0, 0, 0, date("m", $current), date("d", $current) + 1, date("Y", $current));
if ($session->logged_in&&!$singleAgenda) {
	$sql = "select distinct * from events where status!=1 and date>=$current and date<$next and user_id=" . $session->id . " order by dayevent desc,date asc ";
} else {
	$sql = "select distinct * from events where status!=1 and date>=$current and date<$next order by dayevent desc,date asc ";
}
$recordXSet = $db->Execute($sql) or die($sql . " " . $db->ErrorMsg());
echo '<table width="100%">';

while (!$recordXSet->EOF) {
	echo '<tr>';
	printAppointmentHTML($recordXSet->fields["title"], $recordXSet->fields["description"], $recordXSet->fields["deadline"], $recordXSet->fields["dayevent"], $recordXSet->fields["date"], $recordXSet->fields["id"]);
	echo '</tr>';

	$recordXSet->MoveNext();
}
echo '<tr><td colspan="2"><b>' . $lang['legend'] . ':</b><br/><img alt="dayevent" src="img/clock.png"/> ' . $lang['legend-daylong'] . '&nbsp;<img alt="deadline" src="img/deadline.gif"/> ' . $lang['legend-deadline'] . '</td></tr>';
echo '</table>';
echo '</div>';
?>
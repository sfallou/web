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
$today = mktime(0, 0, 0, date("m", $now), date("d", $now), date("Y", $now));
$yesterday = mktime(0, 0, 0, date("m", $now), date("d", $now) - 1, date("Y", $now));
$tomorrow = mktime(0, 0, 0, date("m", $now), date("d", $now) + 1, date("Y", $now));
echo '<div class="box">';
echo '<div style="text-align:center">';
echo '[<a href="?page=normal">' . $lang['index-normalview'] . '</a>] - [<a href="?page=overview&amp;type=week">' . $lang['index-weekoverview'] . '</a>] - [<a href="?page=overview&amp;type=month">' . $lang['index-monthoverview'] . '</a>] - [<a href="?page=overview&amp;type=year">' . $lang['index-yearoverview'] . '</a>]';
echo '<h3><a href="engine/changedate.php?day=-1">' . $lang['time-previousday'] . "</a> | <a href='?page=normal'>" . strftime("%A, %d %B, %Y", $current) . '</a>' .
		' | <a href="engine/changedate.php?day=1">' . $lang['time-nextday'] . '</a></h3>';
echo '<a href="engine/changedate.php?year=-1">&lt;&lt; ' . $lang['time-year'] . '</a> ' .
'| <a href="engine/changedate.php?month=-1">&lt;&lt; ' . $lang['time-month'] . '</a> ' .
'| <a href="engine/changedate.php?week=-1">&lt;&lt; ' . $lang['time-week'] . '</a> ' .
'| <a href="engine/changedate.php?week=1">' . $lang['time-week'] . ' &gt;&gt;</a> ' .
'| <a href="engine/changedate.php?month=1">' . $lang['time-month'] . ' &gt;&gt;</a> ' .
'| <a href="engine/changedate.php?year=1">' . $lang['time-year'] . ' &gt;&gt;</a>';
echo "</div>";
?>
<div style="text-align:center">
<form action="engine/changedate.php" method="post" >

<fieldset>
	<label for="date"><?php echo $lang["date"];?> (yyyy-mm-dd):</label>
	<input name="date" id="date" onfocus="showCalendarControl(this);" type="text"/>
	<input type="submit" value="<?php echo $lang["index-goto"];?>" name="goto"/>
</fieldset>
</form>
</div>
</div>

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
class DB {

	var $link;
	function __construct($dbhost, $dbuser, $dbpass, $dbname) {
		/* Connect or die */
		$this->link = mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
		mysql_select_db($dbname) or die(mysql_error());
	}
	function __destruct() {
		mysql_close($this->link);
	}

	private function toMatrix($result) {

	}
	/* Prepare a string for database use */
	private function s($string) {
		return mysql_real_escape_string(htmlspecialchars($string),$this->link);
	}
	function addTODO($userid, $priority, $text) {
		$cleanPriority=0;
		if(is_numeric(DB::s($priority)))
			$cleanPriority=DB::s($priority);
			
		$sql = "insert into todo (`user_id`,`priority`,`text`,`added`) " .
		"values(" . DB::s($userid) . "," . $cleanPriority . ",'" . DB::s($text) . "'," . time() . ");";
		return mysql_query($sql);

	}
	private function executeQuery($sql) {
		mysql_query($sql,$this->link);
		return mysql_error();
	}

}
?>
<?php
function __autoload($class_name) {
	require $class_name . '.php';
}
$dbhost = 'localhost';
$dbname = 'agenda';
$dbuser = 'root';
$dbpass = 'passer';
define("DB_SERVER", $dbhost);
define("DB_USER", $dbuser);
define("DB_PASS", $dbpass);
define("DB_NAME", $dbname);
define("TBL_USERS", "users");
define("TBL_ACTIVE_USERS", "active_users");
define("TBL_ACTIVE_GUESTS", "active_guests");
define("TBL_BANNED_USERS", "banned_users");
define("ADMIN_NAME", "admin");
define("GUEST_NAME", "Guest");
define("ADMIN_LEVEL", 9);
define("USER_LEVEL", 1);
define("GUEST_LEVEL", 0);
define("TRACK_VISITORS", true);
define("USER_TIMEOUT", 10);
define("GUEST_TIMEOUT", 5);
define("COOKIE_EXPIRE", 60 * 60 * 24 * 100);
define("COOKIE_PATH", "/");
define("EMAIL_FROM_NAME", "John Doe");
define("EMAIL_FROM_ADDR", "john.doe@mail.com");
define("ALL_LOWERCASE", true);

/**
 * Controls whether guests (non logged in users) can view your agenda. 
 * Guest can only view the agenda, they cannot edit or add events.
 */
$allowGuestAccess = false;
/**
 * Controls whether all users work on a single agenda.
 */
$singleAgenda=true;
/**
 * Controls whether reminders are enabled. 
 * When setting this to true, you should also add the engine/sendreminders.php and 
 * engine/senddailyreminders.php to you're cron tab. This is detailed in the install.txt.
 */
$enableReminders = false;

/**
 * Controls whether people can sign up to your agenda. If this is set to false, 
 * you can still register new users in the admin center.
 */
$allowSignUp = false;
?>

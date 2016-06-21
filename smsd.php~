#!/usr/bin/php -q

<?php
$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$db = new PDO("mysql:host=localhost;dbname=smstool", "root", "passer", $pdo_options);
$sms_type = $argv[1];
$sms_file = $argv[2];
$sms_file_content = file_get_contents($sms_file);
$i = strpos($sms_file_content, "\n\n ");
$sms_headers_part = substr($sms_file_content, 0, $i);
$sms_message_body = substr($sms_file_content, $i + 2);
$sms_header_lines = split(" \n ", $sms_headers_part);
$sms_headers = array();
$sms = " default ";
foreach ($sms_header_lines as $header)
{
$i = strpos($header, " : ");
if ($i !== false)
$sms_headers[substr($header, 0, $i)] = substr($header, $i + 2);
}
if ($sms_type == " RECEIVED ")
{
$data = " Got SMS from  " .$sms_headers["From"] . "\n ". "Message:\n ".$sms_message_body;
file_put_contents(" /tmp/sms_test ", $data);
//$result = $db->exec(" INSERT INTO sms VALUES (' ".$sender. "',' ". $txt. "') ");
}
?>

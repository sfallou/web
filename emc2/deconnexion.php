<?php
session_start();
$_SESSION = array();
if (isset($_COOKIE[session_name()]))
{
setcookie(session_name(),'',time()-4200,'/');
}
session_destroy();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
 <head>
 <title>Au revoir</title>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <!-- Lien vers la favicon -->               
 <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" height="48" width="48"/>
 </head>
 <body>
 <div id="corps">
 <h1 style="color-font: #6ba5ef; font-size: 2em;">Vous êtes à présent déconnecté</h1>
 <form action="index.php" method="post">
 <p>
 <input type="submit" value="OK"/>
 </p>
 </form>
 </div>
 </body>
 </html>

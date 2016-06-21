<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF8" />
<title>Authentification</title>
<link rel="stylesheet" href="style2-1.css" />

    
</head>
<body>
<div class="cadre">
<div class="text">
        Plateforme de gestion des citoyens
</div> 
<form class="formulaire" method="POST" action="authentification.php">
    <p class="clearfix">
        <label for="login">Utilisateur:</label>
        <input type="text" name="email" id="login" placeholder="login" required> 
        
    </p>
    <p class="clearfix">
        <label for="password">Mot de passe:</label>
        <input type="password" name="pass" id="password" placeholder="Mot de passe" required> 
    </p>
    <p class="clearfix">
        <input type="submit" name="submit" value="CONNECTER" data-reveal-id="myModal">
    </p>
</form>
</div>
        </body>
    </html>

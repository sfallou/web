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
        Système de Gestion de forage: Seokhaye
</div> 
<form class="formulaire" method="POST" action="authentification.php">
    <p class="clearfix">
        <label for="Profil">Profil:</label>
        <select name="profil" >
        <option value="administrateur">Administrateur</option>
        <option value="gerant">Gerant</option>
        <option value="tresorier">Tresorier</option>
        </select>
        
    </p>
    <p class="clearfix">
        <label for="login">Utilisateur:</label>
        <input type="text" name="login" id="login" placeholder="login" required> 
        
    </p><br/>
    <p class="clearfix">
        <label for="password">Password:</label>
        <input type="password" name="pass" id="password" placeholder="Mot de passe" required style="float:right;"> 
    </p><br/>
    <p class="clearfix">
        <input type="submit" name="submit" value="CONNECTER" data-reveal-id="myModal">
    </p>
</form>
</div>
        </body>
    </html>

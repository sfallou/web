<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="robots" content="all" />
<title>Accueil</title>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type='text/javascript' src='js/jquery.hoverIntent.minified.js'></script>
<script type='text/javascript' src='js/jquery.dcmegamenu.1.3.3.js'></script>
<script type="text/javascript">
$(document).ready(function($){
	$('#mega-menu').dcMegaMenu({
		rowItems: '1',
		speed: 'fast',
		effect: 'slide'
	});
});
</script>
<link href="css/skins/grey.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div class="grey">  
<ul id="mega-menu" class="mega-menu">
	<li><a href="accueil.php">Accueil</a></li>
	<li><a href="#">Abonnements</a>
				<ul>
					<li><a href="nouvea_abonnement.php">nouvel Abonnements</a></li>
					<li><a href="abonnes.php">liste des Abonnements</a></li>
				</ul>
			
	</li>
	<li><a href="#">Comptes d'utilisateurs</a>
		<ul>
			<li><a href="ajout_utilisateur.php">nouvel Utilisateurs</a>
			<li><a href="numeros.php">Liste des Utilisateurs</a>
		</ul>
	</li>
	<li><a href="gestion_agenda.php">Gestion Agenda</a>
	<ul>
		<li><a href="gestion_agenda.php">Enrégistrement rendez vous</a></li>
		<li><a href="gestion_agenda.php">Consultation rendezvous</a></li>
	</ul>
	</li>
	<li><a href="#">Contact</a></li>
	
</ul>
</div>

</body>
</html>

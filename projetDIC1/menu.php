<?php/*
<nav>
		<ul class="top-menu"><!-- attention à bien faire correspondre l'id de chaque item avec la feuilles de style -->
			<li><a href="accueil.php">Accueil  </a><div class="menu-item" id="item5"></div></li>
			<li><a href="body.php">Citoyens  </a><div class="menu-item" id="item1"></div></li>
			<li><a href="body1.php">Ajouter  </a><div class="menu-item" id="item6"></div></li>
			<li><a href="body2.php">Search </a><div class="menu-item" id="item3"></div></li>
			<li><a href="body3.php">Statistique Sexe</a><div class="menu-item" id="item3"></div></li>
			<li><a href="body4.php">Statistique Age</a><div class="menu-item" id="item3"></div></li>
			<li><a href="deconnexion.php">Deconnexion </a><div class="menu-item" id="item4"></div></li>
			
			
			
		</ul>
	</nav>
*/?>
	<!-- Emplacement du menu -->		
<div id="container">
	<ul id="nav">
		<li id="selected"><a href="accueil.php">Accueil</a></li>
		<li><a href="body.php">Citoyens</a></li>
		<li><a href="body1.php">Ajouter</a></li>
		<li><a href="body2.php">Search</a></li>
		<li><a href="statistique0.php">Statistiques</a><li/>
		
		
		
	</ul>
</div>
<br/><br/>
<!-- Initialisation de la fonction -->		
<script type="text/javascript">
$('#nav').spasticNav();
</script>
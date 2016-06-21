<!DOCTYPE html>
<html lang="fr">
<head>
	<title>jQuery sc001</title>
<!--  Copyright 2011, AUTHORS.txt (http://jqueryui.com/about) Dual licensed under the MIT or GPL Version 2 licenses. http://jquery.org/license  http://docs.jquery.com/UI/Datepicker  -->
<!-- traduit et adapté par outils-web.com -->
<!-- chargement des feuilles de style -->
	<link rel="stylesheet" href="css/demo.css">
	<link rel="stylesheet" href="css/jquery.ui.core.css">
	<link rel="stylesheet" href="css/jquery.ui.datepicker.css">
	<link rel="stylesheet" href="css/jquery.ui.widget.css">
	<!-- les couleurs peuvent définies au sein de la feuille di dessous-->
	<link rel="stylesheet" href="css/jquery.ui.theme.css">
<!-- chargement des scripts -->	
	<script src="scr/jquery.js"></script>
	<script src="scr/jquery.ui.core.js"></script>
	<script src="scr/jquery.ui.widget.js"></script>
	<script src="scr/jquery.ui.datepicker.js"></script>
	<script src="scr/jquery.ui.datepicker-fr.js"></script>
<!-- Initialisation de la fonction -->		
	<script>
	$(function() {
		$.datepicker.setDefaults( $.datepicker.regional[ "" ] );
		$( "#datepicker" ).datepicker( $.datepicker.regional[ "fr" ] );
		$( "#locale" ).change(function() {
			$( "#datepicker" ).datepicker( "option",
				$.datepicker.regional[ $( this ).val() ] );
		});
	});
	</script>
	
</head>
<body>

<!-- Emplacement du calendrier -->		
<div class="demo"><br><br><p>Date: <input type="text" id="datepicker"></p></div>
<div class="n">Cliquez dans la case pour faire apparaitre le calendrier</div>

</body>
</html>
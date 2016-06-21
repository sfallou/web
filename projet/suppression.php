<?php
  session_start();
  $prenom=$_SESSION['prenomUser'];
 if(!isset($_SESSION['idUser']))
  {
     echo '<meta http-equiv="Refresh" content="0;url=index.php">';
  exit();
  }
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bootstrap 3, from LayoutIt!</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
     <style type="text/css">
    .container-fluid
    {
    	width:80%;
    	background-color:rgba(185, 185, 185, 0.4);
    	margin-top:1%;
    	padding-top:2%;
    	padding-right:5%;
    	padding-left:5%;
    	padding-bottom:5%;
    }
    .page-header
    {
    	margin-top:1%;
    	
    }
    #lala
    {
    	background-color:rgba(100, 100, 100, 0.4);
    	padding:2%;
    	border-radius:10px;
    }
	</style>

  </head>
  <body>
<a href="deconnexion.php" id="dev7link" title="Déconnexion"><img src="dev7logo.png"></a>
<!--bouton de déconnexion-->
<?php
echo'
<div class="btn-group">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    '.$prenom.' <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="#">Absent</a></li>
    <li><a href="#">Occupé</a></li>
    <li><a href="#">Invisible</a></li>
  </ul>
</div>
<!--Fin bouton de déconnexion-->
    <div class="container-fluid">
    <div class="page-header">
				<h1>
					BIENVENUE! <small>Profiter de votre visite</small>
				</h1>
			</div>
	<div class="row">
		<div class="col-md-12">
			<ul class="nav nav-tabs nav-stacked">
				<li >
					<a href="listecitoyen.php">Liste</a>
				</li>
				<li >
					<a href="insertion.php">Insertion</a>
				</li>
				<li >
					<a href="modification.php">Modification</a>
				</li>
				<li class="active">
					<a href="suppression.php">Suppression</a>
				</li>
				
			</ul>
			<ul class="nav nav-pills">
				<li class="active">
					 <a href="#"> <span class="badge pull-right">42</span> Home</a>
				</li>
				<li>
					 <a href="#"> <span class="badge pull-right">16</span> More</a>
				</li>
			</ul>
		</div>
	</div>
</div>'
;?>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>

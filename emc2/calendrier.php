<?php
session_start();
if (isset($_SESSION['connect']))//On vérifie que le variable existe
{$connect=$_SESSION['connect'];//On récupère la valeur de la variable de session
}
else
{
$connect=0;//Si $_SESSION['connect'] n'existe pas, on donne la valeur "0"
}
if ($connect == "1") // Si le visiteur s'est identifié
{
	$_SESSION['connect']=1;
	$pass=$_SESSION['pass'];
	$login=$_SESSION['login'];
	$id_user=$_SESSION['id'];
	$nom=$_SESSION['nom'];
	$prenom=$_SESSION['prenom'];
	$telephone=$_SESSION['telephone'];
	$email=$_SESSION['email'];
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
<title>calendrier</title>
<link type="text/css" rel="stylesheet" href="style.css">
<link rel="stylesheet" type="text/css" href="engine1/style.css" />
<script type="text/javascript" src="engine1/jquery.js"></script>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
jQuery(function($) {
$('.month').hide();
$('.month:first').show();
$('.months a:first').addClass('active');
var current = 1;
$('.months a').click(function() {
var month = $(this).attr('id').replace('linkMonth', '');
// alert(month);
if (month != current) {
$('#month' + current).slideUp();
$('#month' + month).slideDown();
$('.months a').removeClass('active');
$('.months a#linkMonth' + month).addClass('active');
current = month;
}
return false;
});
});
</script>
</head>
<body>
	<?php include("haut.php");?>
	<?php require("menu.php");?>
	<h3 class="titre">Gestion Agenda</h3>
	<?php
		require ('date.php');
		require ('config.php');
		$date = new Date();
		$year = date('Y');
		$dates = $date->getAll($year);
		//$events = $date->getevents();
	?>
	<div class="periods">
		<div class="year"><?php echo $year; ?>
		</div>
		<div class="months">
			<ul>
			<?php foreach ($date->months as $id => $m): ?>
				<li><a href="#" id="linkMonth<?php echo $id + 1; ?>"><?php echo utf8_encode(substr($m, 0, 4)); ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="clear"></div>
		<?php $dates = current($dates); ?>
		<?php foreach ($dates as $m => $days): ?>
		<div class="month relative" id="month<?php echo $m; ?>">
		<table bgcolor="#fff">
			<thead>
				<tr><?php foreach ($date->days as $d): ?>
					<th><?php echo substr($d,0,8); ?></th>
					<?php endforeach; ?>
				</tr>
			</thead>
			<tbody>
				<tr>
				<?php $end = end($days); foreach($days as $d => $w): ?>
				<?php $time = strtotime("$year-$m-$d"); ?>
				<?php if ($d == 1 and $w != 1): ?>
					<td colspan="<?php echo $w - 1; ?>" class="padding"></td>
				<?php endif; ?>
					<td <?php if ($time == strtotime(date('Y-m-d'))): ?> class="today" <?php endif; ?>>
						<div class="relative">
							<div class="day">
								<?php $year="$year"?>
								<a class="lien" href="heures.php?dates=<?php echo $date->days[$w-1] ?> <?php echo $d ?> <?php echo utf8_encode($date->months[$m-1]) ?> <?php echo $year ?>&id=<?php echo $id_user ?>"><?php echo $d ?></a>
							</div>
						</div>
						<div class="daytitle" id="daytitle">
						<?php echo $date->days[$w-1] ?> <?php echo $d ?> <?php echo utf8_encode($date->months[$m-1]) ?>
						</div>
						<ul class="events">
							<li ><?php //echo $events ?> </li>
						</ul>
					</td>
				<?php if ($w == 7): ?>
				</tr>
				<tr>
				<?php endif; ?>
				<?php endforeach; ?>
				<?php if ($end != 7): ?>
					<td colspan="<?php echo 7 - $end; ?>" class="padding"></td>
				<?php endif; ?>
				</tr>
			</tbody>
		</table>
		</div>
		<?php endforeach; ?>
		</div>
	</body>
</html>

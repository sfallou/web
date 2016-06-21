<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1"/>
		<title>Plateforme Audio-Visuelle</title>
	</head>
	<body >
		<center>
			<img src="imag.jpg"/>
			<h1><marquee>Plateforme audiovisuelle DIC1-TR </marquee></h1><br/>
			<h2>Conversion de vidéos et audios</h2><center>
			<form method="post" action="traitement.php" style="background-color:white;">
				<fieldset>
					<legend>Conversion d'une vidéo en un autre format vidéo</legend>
					<table>
					<tr><td>Vidéo à convertir :</td><td><input type="file" name="input"/> </td></tr>
					<tr><td>Nom de sortie:</td><td> <input type = "text" name ="output"/></td></tr>
					<tr><td>Formats de sortie:</td><td> <input type="radio" checked name="format" value="mp4" /> MP4<br/>
														<input type="radio" name="format" value="flv" /> FLV<br/>
														<input type="radio" name="format" value="avi" /> AVI<br/>
														<input type="radio" name="format" value="mpg" /> MPG<br/></td></tr>
					<tr><td colspan="2" align="center"><input type="submit" value="convertir"/><br></td></tr>
					</table>
				</fieldset>
				<br/><br/>
				<fieldset>
					<legend>Conversion vidéo en audio</legend>
					<table>
					<tr><td>Vidéo à convertir :</td><td><input type="file" name="video"/>  </td></tr>
					<tr><td>Nom de sortie du son:</td><td> <input type = "text" name ="son"/></td></tr>
					<td>Formats de sortie:</td>
<td><input checked="checked" name="form" type="radio" value="mp3" />MP3<br/>
<input name="form" type="radio" value="ma4" /> MA4<br/>
<input name="form" type="radio" value="wav" /> WAV<br/>
<input name="form" type="radio" value="ogg" /> OGG</td>
</tr>
					<tr><td colspan="2" align="center"><input type="submit" value="convertir en son"/><br></td></tr>
					</table>
				</fieldset>
			</form>
	</body>
</html>


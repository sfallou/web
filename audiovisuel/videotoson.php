<?php
require("head.php");
?>
	<body>
		<form action="traitementson.php" method="post">
<fieldset><legend>Conversion Vidéo en Audio</legend>
<table style="height: 219px;" width="589">
<tbody>
<tr>
<td>Vidéo à convertir :</td>
<td><input name="video" type="file" /></td>
</tr>
<tr>
<td>Nom de sortie du son:</td>
<td><input name="son" type="text" /></td>
</tr>
<tr>
<td>Formats de sortie:</td>
<td><input checked="checked" name="form" type="radio" value="mp3" />MP3<br/>
<input name="form" type="radio" value="ma4" /> MA4<br/>
<input name="form" type="radio" value="wav" /> WAV<br/>
<input name="form" type="radio" value="ogg" /> OGG</td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" value="convertir en son" /></td>
</tr>
</tbody>
</table>
</fieldset>
</form>
	</body>
</html>


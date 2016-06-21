<?php
require("head.php");
?>
<body>
		<form action="traitementsonson.php" method="post">
<fieldset><legend>Conversion Son en Son</legend>
<table style="height: 219px;" width="589">
<tbody>
<tr>
<td>Son a convertir :</td>
<td><input name="input" type="file" /></td>
</tr>
<tr>
<td>Nom de sortie:</td>
<td><input name="output" type="text" /></td>
</tr>
<tr>
<td>Formats de sortie:</td>
<td><input checked="checked" name="form" type="radio" value="mp3" />MP3
<input name="form" type="radio" value="ma4" /> MA4
<input name="form" type="radio" value="wav" /> WAV
<input name="form" type="radio" value="ogg" /> OGG</td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" value="convertir" /></td>
</tr>
</tbody>
</table>
</fieldset>
</body>
</html>


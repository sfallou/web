<?php
require("head.php");
?>
	<body>
		<form action="traitementvideo.php" method="post" enctype="multipart/form-data">
<fieldset><legend>Conversion Vidéo  en Vidéo</legend>
<table style="height: 219px;" width="589">
<tbody>
<tr>
<td>Vidéo à convertir :</td>
<td><input name="input" type="file" /></td>
</tr>
<tr>
<td>Nom de sortie:</td>
<td><input name="output" type="text" /></td>
</tr>
<tr>
<td>Formats de sortie:</td>
<td><input checked="checked" name="format" type="radio" value="mp4" />MP4 <br/>
<input name="format" type="radio" value="flv" /> FLV<br/>
<input name="format" type="radio" value="avi" /> AVI<br/>
<input name="format" type="radio" value="wmv" /> WMV<br/>
<input name="format" type="radio" value="mkv" /> MKV<br/>
</td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" name="upload" value="convertir" /></td>
</tr>
</tbody>
</table>
</fieldset>


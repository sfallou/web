
<div id="Contenu">
<form method="post" enctype="multipart/form-data">
	<table border="0" align="center" id="int">
    	<tr>
        	<th colspan="2">Ajouter un citoyen</th>
        </tr>
        <tr>
        	<td>Nom : </td>
            <td><input name="nom" type="text" required></td>
        </tr>
        <tr>
        	<td>Prenom :</td>
            <td><input name="prenom" type="text" align="right" required></td>
        </tr>
        <tr>
        	<td>Date de naissance :</td>
            <td><input name="date" type="date" required></td>
        </tr>
        <tr>
        	<td>Lieu de naissance :</td>
            <td><input name="lieu" type="text" required>
        </tr>
        <tr>
        	<td>Numero Carte d'identité Nationnale  :</td>
            <td><input name="cin" type="text" required>
        </tr>	
		<tr>
			<td>Sexe</td>
			<td><select name="sexe" required>
				<option>Masculin</option>
				<option>Feminin</option>
			</select>
			</td>
		</tr>
		
		<tr>
        	<td>Date de délivrance :</td>
            <td><input name="datedeliv" type="date" required></td>
        </tr>
		<tr>
        	<td>Date d'expiration :</td>
            <td><input name="datedexp" type="date" required></td>
        </tr>
			
		
        <tr>
        	<td>Photo :</td>
            <td><input name="photo" type="file" required ></td> 
        </tr>
        <tr>
        	<td colspan="2" align="center"><input name="Valider" type="submit" value="Valider"></td>
        </tr>
    </table>
</form>
<?php

	if(isset($_POST['Valider']))
	{	
			
			$tof=$_FILES['photo']['name'];
			$extensions=array('.png','.PNG','.jpg','.JPG');
			$typetof=strrchr($tof,".");
			$linktof=$_FILES['photo']['tmp_name'];
			if(in_array($typetof,$extensions))
			{
        $nom=$_POST['nom'];
        $tof="$nom$tof";
				$transfert=move_uploaded_file($linktof,'photo/'.$tof);
				if($transfert)
				{
					
          
          extract($_POST);
					$req="insert into citoyen values('','$nom','$prenom','$date','$lieu','$cin','$sexe','$datedeliv','$datedexp','$tof')";
					$exe=mysqli_query($link,$req);
				}
			}	
	}
?>
</div>

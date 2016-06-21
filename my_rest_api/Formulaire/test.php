<?php
//init_set("display_errors",1);error_reporting(1);
//connexion à la bdd
$bdd = new PDO('mysql:host=localhost:8889;dbname=challenge2016', 'root', 'root');

?>
<form method="post" action="traitementMatch.php">
    Ecole:<select name="ecole">
    <option value="rien">Selectionner une ecole</option>
    <?php
    $sql=$bdd->query("SELECT * FROM Ecoles");
            while ($data=$sql->fetch()) {
                $id=$data['id_ecole'];
                $nom=$data['nom_ecole'];
                ?>
                <option value="<?php echo '$id';?>"><?php echo "$nom";?></option>
             <?php
            }
    ?>
    </select>
    <br/>
    <input type="submit" value="ok">
</form>


<?php
# ========================
# Traitement du formulaire 
# ========================

if( isset($_POST['upload']) ) // si formulaire soumis
{
    $content_dir = 'upload/'; // dossier où sera déplacé le fichier

    $tmp_file = $_FILES['fichier']['tmp_name'];

    if( !is_uploaded_file($tmp_file) )
    {
        exit("Le fichier est introuvable");
    }

    // on vérifie maintenant l'extension
    $type_file = $_FILES['fichier']['type'];

    if( !strstr($type_file, 'mp4') && !strstr($type_file, 'flv') && !strstr($type_file, 'avi') && !strstr($type_file, 'mkv') && !strstr($type_file, 'wmv'))
    {
        exit("Le fichier n'est pas une video");
    }

   // on copie le fichier dans le dossier de destination
    $name_file = $_FILES['fichier']['name'];

    if( !move_uploaded_file($tmp_file, $content_dir . $name_file) )
    {
        exit("Impossible de copier le fichier dans $content_dir");
    }

    echo "Le fichier est telecharge";
}

?>

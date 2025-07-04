<?php
    

$chemin_destination = "";


if (isset($_FILES['FILE']) && $_FILES['FILE']['error'] == 0) {
    
    
    $dossier_destination = 'charger/'; 
    
    // Récupérer les infos du fichier
    $nom_fichier = basename($_FILES['FILE']['name']);
    $fichier_temporaire = $_FILES['FILE']['tmp_name'];

   
    $chemin_destination = $dossier_destination.$nom_fichier;

    // Déplacer le fichier temporaire vers le dossier de destination
    if (move_uploaded_file($fichier_temporaire, $chemin_destination)) {
        echo "Le fichier a été uploadé avec succès !<br>";
        echo "Emplacement : " . $chemin_destination;
    } else {
        echo "Erreur lors de l'upload du fichier.";
    }

} else {
    echo "Aucun fichier sélectionné ou une erreur est survenue.";
}

if(isset($_POST)){
    $con=mysqli_connect("localhost","root","","ict_108");
    if($con==FALSE){
        echo "erreur d'ouverture";
        exit(0);
    }
    $request=mysqli_query($con,"INSERT INTO livres (id,titre, sous_titre, auteur, editeur,collections, date_publication, descriptions, genre, langues_disponible,chemin_dacces) VALUES ('".$_POST['ID']."','".$_POST['TITRE']."','".$_POST['SOUS_TITRE']."','".$_POST['NOM_AUTEUR']."','".$_POST['MAISON_EDITION']."','".$_POST['COLLECTION']."','".$_POST['DATE_PUBLICATION']."','".$_POST['DESCRIPTION']."','".$_POST['radio']."','".$_POST['langue']."','".$chemin_destination."')");
    if($request==FALSE){
        echo "erreur d'insertion";
    }
    $con=mysqli_close($con);
}
?>
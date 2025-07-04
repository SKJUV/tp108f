<?php
    

$chemin_destination = "";


if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
    
    
    $dossier_destination = 'charger/'; 
    
    // Récupérer les infos du fichier
    $nom_fichier = basename($_FILES['file']['name']);
    $fichier_temporaire = $_FILES['file']['tmp_name'];

   
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
    $con=mysqli_connect("localhost","root","","ict108");
    if($con==FALSE){
        echo "erreur d'ouverture";
        exit(0);
    }
    $request=mysqli_query($con,"INSERT INTO ouvrage (titre_ouvrage,auteur_ouvrage,editeur_ouvrage,ISBN,annee_publication,description_ouvrage,couverture_ouvrage) VALUES ('".$_POST['titre_ouvrage']."','".$_POST['auteur_ouvrage']."','".$_POST['editeur_ouvrage']."','".$_POST['ISBN']."','".$_POST['annee_publication']."','".$_POST['description_ouvrage']."','".$chemin_destination."')");
    if($request==FALSE){
        echo "erreur d'insertion";
    }else{
        echo "insertion reussie";
        echo $_POST['titre_ouvrage'];
        echo $_POST['auteur_ouvrage'];
        echo $_POST['editeur_ouvrage'];
        echo $_POST['ISBN'];
        echo $_POST['annee_publication'];
        echo $_POST['description_ouvrage'];
        echo $chemin_destination;
    }
    $con=mysqli_close($con);
}
?>
<?php
/**************************************************************** 
* Projet   : Gestion de la biliothèque  
* Code PHP : enregistrement.php 
**************************************************************** 
* Auteur 1 : TAGNE FONO DAVID NICAULD 24H2005  
* Auteur 2 : OTTAM BAGNEKEN EMMANUELLA LARISSA 24H2244
* Auteur 3 : SINENG KENGNI JUVENAL 24H2194  
<tagnefonodavid@gmail.com.email> 
<larissabagneken70@gmail.com> 
<sinengjuvenal@gmail.com> 
* ... 
**************************************************************** 
* Date de création      
: 05-07-2025 (05 Juillet 2025) 
* Dernière modification : 05-07-2025 (05 Juillet 2025) 
**************************************************************** 
* Description  
* Le script enregistrement.php permet l'insertion des informations  
* pour  la base de données.  
* et affiche les informations d'ajout d'un ouvrage.
**************************************************************** 
* Historique des modifications 
* 05-07-2025 : Le script insere les informations d'un ouvrage dans la base de données
*   
critères (ISBN, auteur, éditeur, année de parution,titre de l'ouvrage,date de parution,description de l'ouvrage,couverture de l'image). 
***************************************************************/  
?>
<?php
$message = "";
$color = "green"; // Par défaut
$chemin_destination = ""; // Valeur par défaut

if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
    $dossier_destination = 'charger/';
    $nom_fichier = basename($_FILES['file']['name']);
    $fichier_temporaire = $_FILES['file']['tmp_name'];
    $chemin_destination = $dossier_destination . $nom_fichier;

    if (move_uploaded_file($fichier_temporaire, $chemin_destination)) {
        $message .= "Le fichier a été uploadé avec succès !<br>";
    } else {
        $message .= "Erreur lors de l'upload du fichier.<br>";
        $color = "red";
    }
} else {
    $message .= "Aucun fichier sélectionné ou une erreur est survenue.<br>";
    $color = "red";
}

if (!empty($_POST)) {
    $con = mysqli_connect("localhost", "root", "", "ict108");
    if ($con == FALSE) {
        $message .= "Erreur d'ouverture de la base de données.<br>";
        $color = "red";
        exit(0);
    }

    // Sécurisation
    $titre = $_POST['titre_ouvrage'];
    $auteur = $_POST['auteur_ouvrage'];
    $editeur=$_POST['editeur_ouvrage'];
    $isbn =  $_POST['ISBN'];
    $annee =  $_POST['annee_publication'];
    $description = $_POST['description_ouvrage'];

    $request = mysqli_query($con, 
        "INSERT INTO ouvrage (titre_ouvrage,auteur_ouvrage,editeur_ouvrage,ISBN,annee_publication,description_ouvrage,couverture_ouvrage)
        VALUES ('$titre', '$auteur', '$editeur', '$isbn', '$annee', '$description', '$chemin_destination')"
    );

    if ($request == FALSE) {
        $message .= "Erreur lors de l'insertion.<br>";
        $color = "red";
    } else {
        $message .= "Insertion réussie !<br>";
    }

    mysqli_close($con);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajout d'un ouvrage</title>
    <link rel="icon" href="captur.PNG">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(120deg, #e0eafc 0%, #cfdef3 100%);
            margin: 0;
            padding: 0;
        }
        header.header {
            background: linear-gradient(90deg, #2c3e50 60%, #2980b9 100%);
            color: white;
            padding: 32px 0 24px 0;
            text-align: center;
            border-radius: 0 0 30px 30px;
            box-shadow: 0 4px 20px rgba(44,62,80,0.08);
            margin-bottom: 30px;
        }
        .header-row {
            max-width: 1100px;
            margin: 0 auto;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
        }
        .logo {
            height: 64px;
        }
        .main-container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 20px;
        }
        .main-header {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 60vh;
        }
        .main-header .left {
            display: flex;
            flex-direction: column;
        }
        .main-header .title {
            font-size: 2em;
            font-family: 'Playfair Display', serif;
            font-weight: bold;
            margin-bottom: 6px;
            color: #2c3e50;
        }
        .main-header .subtitle {
            color: #555;
            font-size: 1em;
        }
        .add-btn, .gold-button, .red-button {
            display: inline-block;
            padding: 12px 28px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 1.08em;
            border: none;
            cursor: pointer;
            transition: background 0.2s, color 0.2s, transform 0.2s;
            margin-left: 10px;
        }
        .add-btn {
            background: linear-gradient(90deg, #FFD700 60%, #D4AF37 100%);
            color: #2c3e50;
        }
        .add-btn:hover {
            background: linear-gradient(90deg, #D4AF37 60%, #FFD700 100%);
            color: #fff;
            transform: translateY(-2px) scale(1.04);
        }
        .gold-button {
            background: linear-gradient(90deg, #3498db 60%, #6dd5fa 100%);
            color: white;
        }
        .gold-button:hover {
            background: linear-gradient(90deg, #2980b9 60%, #3498db 100%);
            color: #fff;
            transform: translateY(-2px) scale(1.04);
        }
        .red-button {
            background: linear-gradient(90deg, #8e44ad 60%, #a569bd 100%);
            color: white;
        }
        .red-button:hover {
            background: linear-gradient(90deg, #6c3483 60%, #8e44ad 100%);
            color: #fff;
            transform: translateY(-2px) scale(1.04);
        }
        .books-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 32px;
            margin-top: 40px;
            width: 100%;
            min-height: 200px;
        }
        .book-card {
            width: 100%;
            max-width: 400px;
            min-width: 320px;
            background: #fff;
            border-radius: 14px;
            padding: 18px 16px 24px 16px;
            box-shadow: 0 2px 12px rgba(44, 62, 80, 0.07);
            transition: transform 0.2s, box-shadow 0.2s;
            position: relative;
            cursor: pointer;
            margin: 0 auto;
        }
        .book-card:hover {
            transform: translateY(-4px) scale(1.02);
            box-shadow: 0 6px 24px rgba(52, 152, 219, 0.13);
        }
        .book-cover {
            height: 140px;
            overflow: hidden;
            border-radius: 8px;
            margin-bottom: 14px;
            background: #f7fbff;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .book-cover img {
            width: auto;
            height: 100%;
            object-fit: cover;
        }
        .book-info h2, .book-info h3 {
            margin: 0 0 8px 0;
        }
        .book-info p {
            margin: 0 0 6px 0;
        }
        .book-description {
            display: none;
            background: #fffbe6;
            color: #333;
            border-radius: 6px;
            box-shadow: 0 2px 8px rgba(212, 175, 55, 0.10);
            padding: 12px 14px;
            margin-top: 10px;
            font-size: 0.98em;
            position: absolute;
            z-index: 10;
            left: 0;
            right: 0;
        }
        .book-card:hover .book-description {
            display: block;
        }
        .confirmation-message {
            text-align: center;
            width: 100%;
            font-size: 1.15em;
            margin-top: 30px;
            color: <?php echo $color; ?>;
        }
    </style>
</head>
<body>
<header class="header">
    <div class="header-row">
        <div style="display: flex; align-items: center; gap: 16px;">
            <div style="width:40px;"></div>
            <img src="captur.PNG" alt="BOOKSPHERE" class="logo">
        </div>
        <div style="display: flex; align-items: center;">
            <button class="add-btn" onclick="window.location.href='ajouter.php';">+ Ajouter un livre</button>
            <button class="gold-button" onclick="window.location.href='retirer.php';">Supprimer</button>
            <button class="red-button" onclick="window.location.href='afficher.php';">Afficher</button>
        </div>
    </div>
</header>
<main class="main-container">
    <div class="main-header">
        <div class="left">
            <h2 class="title">Ajout d'un ouvrage</h2>
            <p class="subtitle">Résultat de l'opération d'ajout</p>
            <div class="books-wrapper">
                <p class="confirmation-message"><?php echo $message; ?></p>
                <?php
                if (!empty($_POST) && $request) {
                    echo "<div class='book-card'>
                        <div class='book-cover'>
                            <img src='$chemin_destination' alt='Couverture'/>
                        </div>
                        <div class='book-info'>
                            <h2>Titre :</h2><p>$titre</p>
                            <h3>Auteur :</h3><p>$auteur</p>
                            <h3>Editeur :</h3><p>$editeur</p>
                            <h3>ISBN :</h3><p>$isbn</p>
                            <h3>Année de publication :</h3><p>$annee</p>
                            <div class='book-description'>$description</div>
                        </div>
                    </div>";
                }
                ?>
            </div>
        </div>
    </div>
</main>
</body>
</html>


<?php
// filepath: c:\xampp\htdocs\tp108f-1\enregistrement.php
$chemin_destination = "";
$message = "";
$color = "green";

// Gestion de l'upload du fichier
if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
    $dossier_destination = 'charger/';
    $nom_fichier = basename($_FILES['file']['name']);
    $fichier_temporaire = $_FILES['file']['tmp_name'];
    $chemin_destination = $dossier_destination . $nom_fichier;

    if (move_uploaded_file($fichier_temporaire, $chemin_destination)) {
        $message .= "Le fichier a été uploadé avec succès !<br>";
        $message .= "Emplacement : " . $chemin_destination . "<br>";
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
        $message .= "erreur d'ouverture";
        $color = "red";
        exit(0);
    }
    

    $request = mysqli_query($con, "INSERT INTO ouvrage (titre_ouvrage,auteur_ouvrage,editeur_ouvrage,ISBN,annee_publication,description_ouvrage,couverture_ouvrage) VALUES ('" . $_POST['titre_ouvrage'] . "','" . $_POST['auteur_ouvrage'] . "','" . $_POST['editeur_ouvrage'] . "','" . $_POST['ISBN'] . "','" . $_POST['annee_publication'] . "','" . $_POST['description_ouvrage'] . "','" . $chemin_destination . "')");
    if ($request == FALSE) {
        $message .= "Erreur d'insertion";
        $color = "red";
    } else {
        $message .= "Insertion réussie !";
    }
    mysqli_close($con);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout d'un ouvrage</title>
    <link rel="icon" type="image/x-icon" href="captur.PNG">
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
            align-items: center;
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
            margin-top: 40px;
            flex-wrap: wrap;
            gap: 32px;
            width: 100%;
            min-height: 200px;
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
                <button class="add-btn" onclick="window.location.href='ajouter.php';">
                    <span style="font-size: 1.2em; margin-right: 4px;">+</span> Ajouter un livre
                </button>
                <button class="gold-button" onclick="window.location.href='retirer.php';" style="padding: 8px 20px; margin-left: 16px;">
                    &#8592; Supprimer
                </button>
                <button type="button" class="red-button" onclick="window.location.href='afficher.php';">
                    <i class="button"></i> Afficher
                </button>
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
                </div>
            </div>
        </div>
    </main>
</body>
</html>
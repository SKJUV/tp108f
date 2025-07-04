<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un ouvrage</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(120deg, #e0eafc 0%, #cfdef3 100%);
            margin: 0;
            padding: 0;
        }
        nav {
            display: flex;
            justify-content: center;
            gap: 30px;
            background: none;
            margin-top: 18px;
            margin-bottom: 0;
        }
        nav a {
            color: #2980b9;
            background: #fff;
            padding: 12px 28px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.08em;
            box-shadow: 0 2px 8px rgba(52,152,219,0.10);
            transition: background 0.2s, color 0.2s, transform 0.2s;
        }
        nav a:hover {
            background: #2980b9;
            color: #fff;
            transform: translateY(-2px) scale(1.04);
        }
        .container {
            max-width: 700px;
            margin: 40px auto 0 auto;
            padding: 0 20px;
        }
        .add-section {
            background: white;
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(44,62,80,0.10);
            padding: 40px 30px 30px 30px;
            text-align: center;
            margin-bottom: 40px;
            position: relative;
        }
        h1 {
            color: #2c3e50;
            text-align: center;
            margin-top: 38px;
            margin-bottom: 18px;
        }
        .add-form label {
            display: block;
            margin: 18px 0 6px 0;
            color: #2980b9;
            font-weight: bold;
            text-align: left;
        }
        .add-form input[type="text"],
        .add-form input[type="date"],
        .add-form textarea,
        .add-form input[type="file"] {
            width: 100%;
            padding: 14px 12px;
            border: 1px solid #b3c6e0;
            border-radius: 7px;
            font-size: 1.08em;
            margin-bottom: 10px;
            background: #f7fbff;
            transition: border 0.2s;
        }
        .add-form input[type="text"]:focus,
        .add-form input[type="date"]:focus,
        .add-form textarea:focus {
            border: 1.5px solid #2980b9;
            outline: none;
            background: #eaf4fb;
        }
        .add-form input[type="submit"] {
            margin-top: 22px;
            padding: 16px 48px;
            background: linear-gradient(90deg, #3498db 60%, #6dd5fa 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 1.18em;
            box-shadow: 0 2px 8px rgba(52,152,219,0.12);
            cursor: pointer;
            transition: background 0.2s, transform 0.2s;
        }
        .add-form input[type="submit"]:hover {
            background: linear-gradient(90deg, #2980b9 60%, #3498db 100%);
            transform: translateY(-2px) scale(1.04);
        }
        @media (max-width: 800px) {
            .container, .add-section {
                padding: 18px 8px;
            }
            .add-section {
                padding: 30px 10px 24px 10px;
            }
        }
    </style>
</head>
<body>
    <nav>
        <a href="afficher.php">Afficher un ouvrage</a>
        <a href="retirer.php">Supprimer un ouvrage</a>
        <a href="index.php">Accueil</a>
    </nav>
    <div class="container">
        <section class="add-section" style="max-width: 900px; margin: 0 auto;">
            <h1>Ajouter un ouvrage</h1>
            <form action="enregistrement.php" method="post" enctype="multipart/form-data" class="add-form">
                <label for="titre_ouvrage">Titre de l'ouvrage</label>
                <input type="text" name="titre_ouvrage" id="titre_ouvrage">

                <label for="auteur_ouvrage">Auteur de l'ouvrage</label>
                <input type="text" name="auteur_ouvrage" id="auteur_ouvrage">

                <label for="editeur_ouvrage">Editeur de l'ouvrage</label>
                <input type="text" name="editeur_ouvrage" id="editeur_ouvrage">

                <label for="ISBN">ISBN de l'ouvrage</label>
                <input type="text" name="ISBN" id="ISBN">

                <label for="annee_publication">Année de publication de l'ouvrage</label>
                <input type="date" name="annee_publication" id="annee_publication">

                <label for="description_ouvrage">Description de l'ouvrage</label>
                <textarea name="description_ouvrage" id="description_ouvrage" cols="30" rows="5"></textarea>

                <label for="couverture_ouvrage">Couverture de l'ouvrage</label>
                <input type="file" name="file" id="couverture_ouvrage">

                <input type="submit" value="Ajouter l'ouvrage">
            </form>
        </section>
    </div>
</body>
</html>
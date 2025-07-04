<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliothèque Universitaire</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .navbar {
            background-color: #2c3e50;
            color: white;
            padding: 20px 0;
            text-align: center;
            border-radius: 8px;
            margin-bottom: 30px;
        }
        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .nav-logo {
            font-size: 24px;
            font-weight: bold;
            color: white;
            text-decoration: none;
        }
        .nav-links {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }
        .nav-link {
            color: white;
            text-decoration: none;
            margin-left: 20px;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 30px;
        }
        .card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            width: 80%;
        }
        .welcome-section {
            text-align: center;
        }
        .action-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
        }
        .btn {
            display: inline-block;
            padding: 12px 25px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            font-weight: bold;
        }
        .btn:hover {
            background-color: #2980b9;
        }
        .features {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 40px;
        }
        .feature {
            flex: 1;
            min-width: 250px;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        footer {
            margin-top: 50px;
            text-align: center;
            padding: 20px;
            color: #7f8c8d;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <header>
        <h1>Bienvenue à la Bibliothèque Universitaire</h1>
        <p>Votre portail vers la connaissance et la découverte</p>
    </header>

    <div class="container">
        <section class="welcome-section">
            <h2>Gérez votre bibliothèque en toute simplicité</h2>
            <p>Consultez, ajoutez ou recherchez des ouvrages facilement grâce à notre plateforme intuitive.</p>
            
            <div class="action-buttons">
                <a href="afficher.php" class="btn">Rechercher un ouvrage</a>
                <a href="ajouter.php" class="btn">Ajouter un nouvel ouvrage</a>
                <a href="retirer.php" class="btn">Supprimer un ouvrage</a>
            </div>
        </section>

        <div class="features">
            <div class="feature">
                <h3>Recherche avancée</h3>
                <p>Trouvez facilement les ouvrages par titre, auteur, éditeur ou année de publication.</p>
            </div>
            <div class="feature">
                <h3>Gestion simplifiée</h3>
                <p>Ajoutez, modifiez ou supprimez des ouvrages en quelques clics.</p>
            </div>
            <div class="feature">
                <h3>Accès rapide</h3>
                <p>Navigation intuitive pour un accès rapide à toutes les fonctionnalités.</p>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; <?= date('Y') ?> Bibliothèque Universitaire - Tous droits réservés</p>
    </footer>
</body>
</html>
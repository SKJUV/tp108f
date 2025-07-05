<?php
/**************************************************************** 
* Projet   : Gestion de la biliothèque  
* Code PHP : index.php 
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
* Le script index.php est une page d'aceuill
**************************************************************** 
* Historique des modifications 
* 05-07-2025 : Le script permet de choisir les differents operations que l'on veut effectuer sur les ouvrages
*  
***************************************************************/  
?>
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
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(120deg, #e0eafc 0%, #cfdef3 100%);
            margin: 0;
            padding: 0;
        }
        header {
            background: linear-gradient(90deg, #2c3e50 60%, #2980b9 100%);
            color: white;
            padding: 40px 0 30px 0;
            text-align: center;
            border-radius: 0 0 30px 30px;
            box-shadow: 0 4px 20px rgba(44,62,80,0.08);
        }
        .container {
            max-width: 1100px;
            margin: 40px auto 0 auto;
            padding: 0 20px;
        }
        .welcome-section {
            background: white;
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(44,62,80,0.10);
            padding: 40px 30px 30px 30px;
            text-align: center;
            margin-bottom: 40px;
            position: relative;
        }
        .welcome-section img {
            width: 120px;
            margin-bottom: 18px;
            filter: drop-shadow(0 2px 8px #b3c6e0);
        }
        .welcome-section h2 {
            margin-top: 0;
            color: #2c3e50;
            font-size: 2.1em;
        }
        .welcome-section p {
            color: #555;
            font-size: 1.15em;
            margin-bottom: 30px;
        }
        .welcome-section {
            text-align: center;
        }
        .action-buttons {
            display: flex;
            gap: 25px;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 10px;
        }
        .btn {
            display: inline-block;
            padding: 14px 32px;
            background: linear-gradient(90deg, #3498db 60%, #6dd5fa 100%);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 1.08em;
            box-shadow: 0 2px 8px rgba(52,152,219,0.12);
            transition: background 0.2s, transform 0.2s;
        }
        .btn:hover {
            background: linear-gradient(90deg, #2980b9 60%, #3498db 100%);
            transform: translateY(-2px) scale(1.04);
        }
        .features {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 30px;
            margin-top: 30px;
        }
        .feature {
            flex: 1 1 280px;
            background: white;
            padding: 28px 22px;
            border-radius: 14px;
            box-shadow: 0 2px 12px rgba(44,62,80,0.07);
            text-align: center;
            min-width: 260px;
            transition: box-shadow 0.2s, transform 0.2s;
        }
        .feature:hover {
            box-shadow: 0 6px 24px rgba(52,152,219,0.13);
            transform: translateY(-3px) scale(1.03);
        }
        .feature h3 {
            color: #2980b9;
            margin-bottom: 12px;
        }
        .feature p {
            color: #555;
            font-size: 1.07em;
        }
        footer {
            margin-top: 60px;
            text-align: center;
            padding: 24px 0 18px 0;
            color: #7f8c8d;
            font-size: 1em;
            background: none;
        }
        @media (max-width: 900px) {
            .features {
                flex-direction: column;
                gap: 20px;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Bienvenue à la Bibliothèque Universitaire</h1>
        <p style="font-size:1.2em; margin-top:10px;">Votre portail vers la connaissance et la découverte</p>
    </header>

    <div class="container">
        <section class="welcome-section">
            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135768.png" alt="Bibliothèque" />
            <h2>Gérez votre bibliothèque en toute simplicité</h2>
            <p>Consultez, ajoutez ou recherchez des ouvrages facilement grâce à notre plateforme intuitive.</p>
            <div class="action-buttons">
                <a href="afficher.php" class="btn">🔍 Rechercher un ouvrage</a>
                <a href="ajouter.php" class="btn">➕ Ajouter un ouvrage</a>
                <a href="retirer.php" class="btn">🗑️ Supprimer un ouvrage</a>
            </div>
        </section>

        <div class="features">
            <div class="feature">
                <h3>🔎 Recherche avancée</h3>
                <p>Trouvez facilement les ouvrages par titre, auteur, éditeur ou année de publication.</p>
            </div>
            <div class="feature">
                <h3>📝 Gestion simplifiée</h3>
                <p>Ajoutez, modifiez ou supprimez des ouvrages en quelques clics.</p>
            </div>
            <div class="feature">
                <h3>⚡ Accès rapide</h3>
                <p>Navigation intuitive pour un accès rapide à toutes les fonctionnalités.</p>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; <?= date('Y') ?> Bibliothèque Universitaire - Tous droits réservés</p>
    </footer>
</body>
</html>
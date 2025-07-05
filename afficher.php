<?php
/**************************************************************** 
* Projet   : Gestion de la biliothèque  
* Code PHP : afficher.php 
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
* Le script afficher.php gere le formulaire d'affichage des informations  
* pour  la base de données.  
**************************************************************** 
* Historique des modifications 
* 05-07-2025 : Le script evoie les informations d'affichage des ouvrages ou d'un seul
*   
critères (ISBN, auteur, éditeur, année de parution).  
***************************************************************/  
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rechercher des ouvrages</title>
    <link rel="stylesheet" href="style.css">
    <script src="js/search-form.js" defer></script>
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
            margin-top: 30px;
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
            max-width: 950px;
            margin: 40px auto 0 auto;
            padding: 0 20px;
        }
        .search-section {
            background: white;
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(44,62,80,0.10);
            padding: 50px 60px 40px 60px;
            text-align: center;
            margin-bottom: 40px;
            position: relative;
        }
        h1 {
            color: #2c3e50;
            text-align: center;
            margin-top: 18px;
            margin-bottom: 12px;
            font-size: 2.1em;
        }
        .search-form {
            max-width: 700px;
            margin: 0 auto;
        }
        .search-form label {
            display: block;
            margin: 22px 0 8px 0;
            color: #2980b9;
            font-weight: bold;
            text-align: left;
            font-size: 1.12em;
        }
        .search-form input[type="text"] {
            width: 100%;
            padding: 18px 14px;
            border: 1px solid #b3c6e0;
            border-radius: 7px;
            font-size: 1.15em;
            margin-bottom: 8px;
            background: #f7fbff;
            transition: border 0.2s;
        }
        .search-form input[type="text"]:focus {
            border: 1.5px solid #2980b9;
            outline: none;
            background: #eaf4fb;
        }
        .search-form input[type="submit"] {
            margin-top: 28px;
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
        .search-form input[type="submit"]:hover {
            background: linear-gradient(90deg, #2980b9 60%, #3498db 100%);
            transform: translateY(-2px) scale(1.04);
        }
        @media (max-width: 1000px) {
            .container, .search-section {
                padding: 18px 8px;
            }
            .search-section {
                padding: 30px 10px 24px 10px;
            }
        }
    </style>
</head>
<body>
    <nav>
        <a href="ajouter.php">Ajouter un ouvrage</a>
        <a href="retirer.php">Supprimer un ouvrage</a>
        <a href="index.php">Accueil</a>
    </nav>
    <div class="container">
        <section class="search-section">
            <h1>Recherche d'ouvrages</h1>
            <form action="rechercher.php" method="get" class="search-form">
                <label for="ISBN">ISBN :</label>
                <input type="text" id="ISBN" name="ISBN" placeholder="ISBN">

                <label for="auteur_ouvrage">Auteur :</label>
                <input type="text" id="auteur_ouvrage" name="auteur_ouvrage" placeholder="Auteur">

                <label for="editeur_ouvrage">Éditeur :</label>
                <input type="text" id="editeur_ouvrage" name="editeur_ouvrage" placeholder="Éditeur">

                <label for="annee_publication">Année de publication :</label>
                <input type="text" id="annee_publication" name="annee_publication" placeholder="Année">

                <input type="submit" value="Rechercher">
            </form>
        </section>
    </div>
</body>
</html>
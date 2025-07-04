<?php // Page de recherche / affichage des ouvrages ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rechercher des ouvrages</title>
    <link rel="stylesheet" href="style.css">
    <script src="js/search-form.js" defer></script>
</head>
<body>
    <nav>
        <a href="ajouter.php">Ajouter un ouvrage</a>
        <a href="retirer.php">Supprimer un ouvrage</a>
    </nav>

    <h1>Recherche d'ouvrages</h1>

    <form action="rechercher.php" method="get" class="search-form">
        <label for="ISBN">ISBN :</label>
        <input type="text" name="ISBN" id="ISBN">

        <label for="auteur">Auteur :</label>
        <input type="text" name="auteur" id="auteur">

        <label for="editeur">Éditeur :</label>
        <input type="text" name="editeur" id="editeur">

        <label for="annee">Année de publication :</label>
        <input type="number" name="annee" id="annee" min="0">

        <input type="submit" value="Rechercher">
    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un ouvrage</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="rechercher.php" method="get" enctype="multipart/form-data">
        <label for="titre_ouvrage">Titre de l'ouvrage</label>
        <input type="text" name="titre_ouvrage" id="titre_ouvrage">

        <label for="auteur_ouvrage">Auteur de l'ouvrage</label>
        <input type="text" name="auteur_ouvrage" id="auteur_ouvrage">

        <label for="editeur_ouvrage">Editeur de l'ouvrage</label>
        <input type="text" name="editeur_ouvrage" id="editeur_ouvrage">

        <label for="ISBN">ISBN de l'ouvrage</label>
        <input type="text" name="ISBN" id="ISBN">

        <label for="annee_publication">Annee de publication de l'ouvrage</label>
        <input type="date" name="annee_publication" id="annee_publication">

        <label for="description_ouvrage">Description de l'ouvrage</label>
        <textarea name="description_ouvrage" id="description_ouvrage" cols="30" rows="10"></textarea>

        <label for="couverture_ouvrage">Couverture de l'ouvrage</label>
        <input type="file" name="file" id="couverture_ouvrage">
        <input type="submit" value="Ajouter l'ouvrage">
    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un ouvrage - Bibliothèque Universitaire</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <a href="index.php" class="nav-logo">Bibliothèque Universitaire</a>
            <ul class="nav-links">
                <li><a href="index.php" class="nav-link">Accueil</a></li>
                <li><a href="rechercher.php" class="nav-link">Rechercher</a></li>
                <li><a href="retirer.php" class="nav-link">Supprimer</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1 class="text-center mb-4">Ajouter un nouvel ouvrage</h1>

        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-<?= $_SESSION['message_type'] ?? 'info' ?> fade-in">
                <?= $_SESSION['message'] ?>
                <?php unset($_SESSION['message'], $_SESSION['message_type']); ?>
            </div>
        <?php endif; ?>

        <div class="card">
            <form action="enregistrement.php" method="post" enctype="multipart/form-data" class="mt-4">
                <div class="form-group">
                    <label for="titre_ouvrage">Titre de l'ouvrage *</label>
                    <input type="text" name="titre_ouvrage" id="titre_ouvrage" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="auteur_ouvrage">Auteur *</label>
                    <input type="text" name="auteur_ouvrage" id="auteur_ouvrage" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="editeur_ouvrage">Éditeur *</label>
                    <input type="text" name="editeur_ouvrage" id="editeur_ouvrage" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="ISBN">ISBN *</label>
                    <input type="text" name="ISBN" id="ISBN" class="form-control" required
                           pattern="[0-9-]+" title="Veuillez entrer un numéro ISBN valide">
                </div>

                <div class="form-group">
                    <label for="annee_publication">Année de publication *</label>
                    <input type="number" name="annee_publication" id="annee_publication" 
                           class="form-control" min="1900" max="<?= date('Y') + 1 ?>" required>
                </div>

                <div class="form-group">
                    <label for="description_ouvrage">Description</label>
                    <textarea name="description_ouvrage" id="description_ouvrage" 
                              class="form-control" rows="5"></textarea>
                </div>

                <div class="form-group">
                    <label for="couverture_ouvrage">Couverture de l'ouvrage</label>
                    <input type="file" name="file" id="couverture_ouvrage" class="form-control-file">
                    <small class="text-muted">Formats acceptés : JPG, PNG (max 2Mo)</small>
                </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fas fa-save"></i> Enregistrer l'ouvrage
                    </button>
                </div>
            </form>
        </div>
    </div>

    <footer class="text-center mt-5 mb-3">
        <p>&copy; <?= date('Y') ?> Bibliothèque Universitaire - Tous droits réservés</p>
    </footer>
</body>
</html>
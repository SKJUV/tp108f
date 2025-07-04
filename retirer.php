<?php
session_start();
$pageTitle = "Supprimer un ouvrage";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?> - Bibliothèque Universitaire</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="js/search-form.js" defer></script>
</head>
<body>
    <header class="site-header">
        <div class="container">
            <a href="index.php" class="logo">Bibliothèque Universitaire</a>
            <nav class="main-nav">
                <ul>
                    <li><a href="ajouter.php">Ajouter</a></li>
                    <li><a href="retirer.php" class="active">Supprimer</a></li>
                    <li><a href="rechercher.php">Rechercher</a></li>
                </ul>
            </nav>
            <div class="header-actions">
                <a href="#" aria-label="Profil utilisateur"><i class="fas fa-user"></i></a>
                <button class="nav-toggle" aria-label="Menu">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </header>

    <main class="container">
        <h1 class="section-title">Supprimer un ouvrage</h1>

        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-<?= $_SESSION['message_type'] ?? 'info' ?> fade-in">
                <?= $_SESSION['message'] ?>
                <?php unset($_SESSION['message'], $_SESSION['message_type']); ?>
            </div>
        <?php endif; ?>

        <div class="card">
            <form action="suppression.php" method="get" class="search-form">
                <div class="form-group">
                    <label for="ISBN">Rechercher par ISBN :</label>
                    <input type="text" 
                           name="ISBN" 
                           id="ISBN" 
                           class="form-control" 
                           placeholder="Entrez l'ISBN de l'ouvrage"
                           required
                           pattern="[0-9]{10,13}"
                           title="L'ISBN doit contenir entre 10 et 13 chiffres">
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i> Rechercher
                </button>
            </form>
        </div>
    </main>

    <footer class="site-footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <h4>Bibliothèque Universitaire</h4>
                    <p>Accès au savoir et à la connaissance pour tous.</p>
                </div>
                <div class="footer-col">
                    <h4>Liens rapides</h4>
                    <ul>
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="ajouter.php">Ajouter un ouvrage</a></li>
                        <li><a href="rechercher.php">Rechercher</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Contact</h4>
                    <p>Email: contact@biblio-univ.fr</p>
                    <p>Tél: +33 1 23 45 67 89</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; <?= date('Y') ?> Bibliothèque Universitaire. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <script>
        // Menu mobile
        document.querySelector('.nav-toggle').addEventListener('click', function() {
            document.querySelector('.main-nav').classList.toggle('active');
        });
    </script>
</body>
</html>
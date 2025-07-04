<?php
session_start();
$pageTitle = "Rechercher un ouvrage";
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
    <style>
        /* Styles spécifiques à la page de recherche */
        .search-page {
            padding: 2rem 0;
        }
        
        .search-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }
        
        .search-box {
            max-width: 800px;
            margin: 0 auto 2.5rem;
            position: relative;
        }
        
        .search-box input[type="search"] {
            width: 100%;
            padding: 1rem 1.5rem;
            padding-right: 4rem;
            font-size: 1.1rem;
            border: 2px solid var(--color-border);
            border-radius: var(--border-radius);
            transition: var(--transition-fast);
        }
        
        .search-box input[type="search"]:focus {
            border-color: var(--color-secondary);
            box-shadow: 0 0 0 3px rgba(42, 157, 143, 0.2);
            outline: none;
        }
        
        .search-box button {
            position: absolute;
            right: 0.5rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--color-text-secondary);
            font-size: 1.25rem;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 50%;
            transition: var(--transition-fast);
        }
        
        .search-box button:hover {
            color: var(--color-secondary);
            background-color: rgba(42, 157, 143, 0.1);
        }
        
        .filters {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 2rem;
            justify-content: center;
        }
        
        .filter-group {
            position: relative;
        }
        
        .filter-group select {
            padding: 0.6rem 2.5rem 0.6rem 1rem;
            border: 2px solid var(--color-border);
            border-radius: var(--border-radius);
            background-color: white;
            font-size: 0.95rem;
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%236c757d' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 12px;
        }
        
        .results-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }
        
        .book-card {
            background: white;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            transition: var(--transition-fast);
            display: flex;
            flex-direction: column;
        }
        
        .book-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
        }
        
        .book-cover {
            height: 200px;
            background-color: #f5f5f5;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        
        .book-cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .book-details {
            padding: 1.25rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }
        
        .book-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin: 0 0 0.5rem;
            color: var(--color-primary);
        }
        
        .book-author {
            color: var(--color-text-secondary);
            font-size: 0.9rem;
            margin-bottom: 0.75rem;
        }
        
        .book-meta {
            margin-top: auto;
            font-size: 0.85rem;
            color: var(--color-text-secondary);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .book-actions {
            display: flex;
            gap: 0.5rem;
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid var(--color-border);
        }
        
        .book-actions .btn {
            flex: 1;
            padding: 0.5rem;
            font-size: 0.85rem;
            text-align: center;
        }
        
        .no-results {
            text-align: center;
            padding: 3rem 1rem;
            color: var(--color-text-secondary);
            grid-column: 1 / -1;
        }
        
        @media (max-width: 768px) {
            .filters {
                flex-direction: column;
                align-items: stretch;
            }
            
            .filter-group {
                width: 100%;
            }
            
            .filter-group select {
                width: 100%;
            }
            
            .book-actions {
                flex-direction: column;
            }
        }
        
        .search-box input[type="text"] {
            width: 100%;
            padding: 12px 20px 12px 45px;
            border: 2px solid var(--border-color);
            border-radius: 30px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .search-box input[type="text"]:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(67, 97, 238, 0.25);
        }
        
        .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
        }
        
        .book-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }
        
        .book-card {
            background: var(--card-bg);
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .book-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        
        .book-cover {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-bottom: 1px solid var(--border-color);
        }
        
        .book-info {
            padding: 1.25rem;
        }
        
        .book-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--text-color);
        }
        
        .book-author {
            color: var(--text-light);
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }
        
        .book-meta {
            display: flex;
            justify-content: space-between;
            color: var(--text-light);
            font-size: 0.85rem;
            margin-top: 1rem;
            padding-top: 0.75rem;
            border-top: 1px solid var(--border-color);
        }
        
        .no-results {
            text-align: center;
            padding: 3rem 0;
            color: var(--text-light);
            grid-column: 1 / -1;
        }
        
        .filters {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }
        
        .filter-group {
            flex: 1;
            min-width: 200px;
        }
        
        @media (max-width: 768px) {
            .book-grid {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            }
            
            .filters {
                flex-direction: column;
                gap: 0.75rem;
            }
            
            .filter-group {
                width: 100%;
            }
        }
        
        .search-bar:focus {
            border-color: #D4AF37;
        }
        
        .add-btn {
            background: linear-gradient(135deg, #FFD700, #D4AF37);
            color: #0A192F;
            font-weight: 500;
            padding: 10px 24px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            margin-left: 16px;
            transition: background 0.3s, box-shadow 0.3s, transform 0.2s;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .add-btn:hover {
            background: linear-gradient(135deg, #D4AF37, #FFD700);
            box-shadow: 0 4px 12px rgba(212, 175, 55, 0.3);
            transform: translateY(-2px);
        }
        
        .main-container {
            max-width: 1200px;
            margin: 40px auto 0 auto;
            padding: 0 32px;
        }
        
        .main-header {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 32px;
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
            color: #0A192F;
        }
        
        .main-header .subtitle {
            color: #666;
            font-size: 1em;
        }
        
        .main-header .actions {
            display: flex;
            gap: 16px;
        }
        
        .gold-button {
            background: linear-gradient(135deg, #FFD700, #D4AF37);
            color: #0A192F;
            font-weight: 500;
            padding: 10px 24px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: background 0.3s, box-shadow 0.3s, transform 0.2s;
        }
        
        .gold-button:hover {
            background: linear-gradient(135deg, #D4AF37, #FFD700);
            box-shadow: 0 4px 12px rgba(212, 175, 55, 0.3);
            transform: translateY(-2px);
        }
        
        .red-button {
            background: #e3342f;
            color: #fff;
            font-weight: 500;
            padding: 10px 24px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: background 0.3s, box-shadow 0.3s, transform 0.2s;
        }
        
        .red-button:hover {
            background: #c82333;
            box-shadow: 0 4px 12px rgba(227, 52, 47, 0.15);
            transform: translateY(-2px);
        }
        
        .books-wrapper {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 16px;
        }
        
        .book-card {
            background: #f9f9f9;
            border-radius: 8px;
            padding: 16px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s, box-shadow 0.2s;
        }
        
        .book-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        
        .book-cover {
            height: 120px;
            overflow: hidden;
            border-radius: 4px;
            margin-bottom: 12px;
        }
        
        .book-cover img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }
        
        .book-info h2 {
            font-size: 1.2em;
            margin: 0 0 8px 0;
            color: #0A192F;
        }
        
        .book-info h3 {
            font-size: 1em;
            margin: 0 0 8px 0;
            color: #333;
        }
        
        .book-info p {
            font-size: 0.9em;
            margin: 0;
            color: #666;
        }
        /* Ajoute ici le reste de ton CSS pour le contenu, les modals, etc. */
    </style>
</head>

<body>
    <header class="site-header">
        <div class="container">
            <a href="index.php" class="logo">Bibliothèque Universitaire</a>
            <nav class="main-nav">
                <ul>
                    <li><a href="ajouter.php">Ajouter</a></li>
                    <li><a href="retirer.php">Supprimer</a></li>
                    <li><a href="rechercher.php" class="active">Rechercher</a></li>
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
                        }
                    }elseif(empty($_GET['auteur_ouvrage']) && empty($_GET['editeur_ouvrage']) && empty($_GET['annee_publication']) && empty($_GET['ISBN'])){
                        $request=mysqli_query($con,"SELECT * FROM ouvrage");
                        if($request==FALSE){
                                echo "erreur d'affichage";
                            }else{
                                echo "<div class='books-wrapper'>";
                                while($tab=mysqli_fetch_assoc($request)){
                                        echo "<div class='book-card'>
                                            <div class='book-cover'>
                                                <img src='".$tab['couverture_ouvrage']."' alt='Couverture livre'/>
                                            </div>

                                            <div class='book-info'>
                                                <h2>".$tab['titre_ouvrage']."</h2>
                                                <h3>Auteur: ".$tab['auteur_ouvrage']."</h3>
                                                <p>".$tab['description_ouvrage']."</p>
                                            </div>
                                            
                                        </div>";
                                }
                                echo "</div>";
                        }
                    }    
                    $con=mysqli_close($con);
                ?>
            </div>
        </div>

    </main>
</body>
</html>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Auteur</title>
    <link rel="icon" type="image/x-icon" href="captur.PNG">
    <style>
        body {
            background-color: #ffffff;
            color: #0A192F;
            font-family: 'Poppins', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        
        .header {
            width: 100%;
            padding: 16px 32px;
            background: #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .header-row {
            width: 100%;
            max-width: 1200px;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
        }
        
        .logo {
            height: 64px;
        }
        
        .search-bar {
            width: 260px;
            padding: 8px 36px 8px 12px;
            border: 2px solid #FFD700;
            border-radius: 8px;
            background: #0A192F;
            color: #fff;
            font-size: 1em;
            outline: none;
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
    <header class="header">
        <div class="header-row">
            <div style="display: flex; align-items: center; gap: 16px;">
                <!-- Espace réservé avant le logo -->
                <div style="width:40px;"></div>
                <img src="captur.PNG" alt="BOOKSPHERE" class="logo">
            </div>
            <div style="display: flex; align-items: center;">
                <input type="text" class="search-bar" placeholder="Rechercher un livre...">
                <button class="add-btn" onclick="window.location.href='livre.html';">
                    <span style="font-size: 1.2em; margin-right: 4px;">+</span> Ajouter un livre
                </button>
                <button class="gold-button" onclick="window.location.href='accueil.html';" style="padding: 8px 20px; margin-left: 16px;">
                    &#8592; Retour
                </button>
                <button type="red-button" class="add-btn" onclick="window.location.href='delete.html';">
                    <i class="button"></i> Supprimer
                </button>
            </div>
        </div>
    </header>
    <main class="main-container">
        <div class="main-header">
            <div class="left">
                <h2 class="title">Mes Livres</h2>
                <p class="subtitle">Gérez votre collection d'œuvres littéraires</p>
                <?php
            $con=mysqli_connect("localhost","root","","ict_108");
            if($con==FALSE){
                echo "erreur d'ouverture";
                exit(0);
            }
            $request=mysqli_query($con,"SELECT * FROM ouvrage");
            if($request==FALSE){
                echo "erreur d'affichage";
            }else{
                echo "<div class='books-wrapper'>";
                while($tab=mysqli_fetch_assoc($request)){
                    echo "<div class='book-card'>
                        <div class='book-cover'>
                            <img src='".$tab['chemin_dacces']."' alt='Couverture livre ".$i."'/>
                        </div>
                        <div class='book-info'>
                            <h2>".$tab['titre']."</h2>
                            <h3>Auteur: ".$tab['auteur']."</h3>
                            <p>".$tab['descriptions']."</p>
                        </div>
                    </div>";
                }
                echo "</div>";
            }
            $con=mysqli_close($con);
        ?>
            </div>
        </div>

    </main>
</body>
</html>
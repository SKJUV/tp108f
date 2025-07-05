<?php
/**************************************************************** 
* Projet   : Gestion de la biliothèque  
* Code PHP : rechercher.php 
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
* Le script rechercher.php permet l'affichage des informations  
* de  la base de données.  
**************************************************************** 
* Historique des modifications 
* 05-07-2025 : Le script affiche d'un ouvrage ou de plusieurs ouvrages
*   
critères (ISBN, auteur, éditeur, année de parution).  
***************************************************************/  
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Auteur</title>
    <link rel="icon" type="image/x-icon" href="captur.PNG">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(120deg, #e0eafc 0%, #cfdef3 100%);
            margin: 0;
            padding: 0;
        }
        
        header.header {
            background: linear-gradient(90deg, #2c3e50 60%, #2980b9 100%);
            color: white;
            padding: 32px 0 24px 0;
            text-align: center;
            border-radius: 0 0 30px 30px;
            box-shadow: 0 4px 20px rgba(44, 62, 80, 0.08);
            margin-bottom: 30px;
        }
        
        .header-row {
            max-width: 1100px;
            margin: 0 auto;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
        }
        
        .logo {
            height: 64px;
        }
        
        .main-container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 20px;
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
            color: #2c3e50;
        }
        
        .main-header .subtitle {
            color: #555;
            font-size: 1em;
        }
        
        .main-header .actions {
            display: flex;
            gap: 16px;
        }
        
        .add-btn,
        .gold-button,
        .red-button {
            display: inline-block;
            padding: 12px 28px;
            border-radius: 8px;
            font-weight: bold;
            font-size: 1.08em;
            border: none;
            cursor: pointer;
            transition: background 0.2s, color 0.2s, transform 0.2s;
            margin-left: 10px;
        }
        
        .add-btn {
            background: linear-gradient(90deg, #FFD700 60%, #D4AF37 100%);
            color: #2c3e50;
        }
        
        .add-btn:hover {
            background: linear-gradient(90deg, #D4AF37 60%, #FFD700 100%);
            color: #fff;
            transform: translateY(-2px) scale(1.04);
        }
        
        .gold-button {
            background: linear-gradient(90deg, #3498db 60%, #6dd5fa 100%);
            color: white;
        }
        
        .gold-button:hover {
            background: linear-gradient(90deg, #2980b9 60%, #3498db 100%);
            color: #fff;
            transform: translateY(-2px) scale(1.04);
        }
        
        .red-button {
            background: linear-gradient(90deg, #e74c3c 60%, #ffb199 100%);
            color: white;
        }
        
        .red-button:hover {
            background: linear-gradient(90deg, #c0392b 60%, #e74c3c 100%);
            color: #fff;
            transform: translateY(-2px) scale(1.04);
        }
        
        .books-wrapper {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 32px;
            margin: 40px auto 0 auto;
            justify-items: center;
            max-width: 1300px;
        }
        
        .book-card {
            width: 100%;
            max-width: 400px;
            min-width: 320px;
            background: #fff;
            border-radius: 14px;
            padding: 18px 16px 24px 16px;
            box-shadow: 0 2px 12px rgba(44, 62, 80, 0.07);
            transition: transform 0.2s, box-shadow 0.2s;
            position: relative;
            cursor: pointer;
        }
        
        .book-card:hover {
            transform: translateY(-4px) scale(1.02);
            box-shadow: 0 6px 24px rgba(52, 152, 219, 0.13);
        }
        
        .book-cover {
            height: 140px;
            overflow: hidden;
            border-radius: 8px;
            margin-bottom: 14px;
            background: #f7fbff;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .book-cover img {
            width: auto;
            height: 100%;
            object-fit: cover;
        }
        
        .book-info h2 {
            font-size: 1.15em;
            margin: 0 0 8px 0;
            color: #2c3e50;
        }
        
        .book-info h3 {
            font-size: 1em;
            margin: 0 0 8px 0;
            color: #2980b9;
        }
        
        .book-info p {
            font-size: 0.98em;
            margin: 0 0 6px 0;
            color: #555;
        }
        
        .book-description {
            display: none;
            background: #fffbe6;
            color: #333;
            border-radius: 6px;
            box-shadow: 0 2px 8px rgba(212, 175, 55, 0.10);
            padding: 12px 14px;
            margin-top: 10px;
            font-size: 0.98em;
            position: absolute;
            z-index: 10;
            left: 0;
            right: 0;
        }
        
        .book-card:hover .book-description {
            display: block;
        }
        
        @media (max-width: 900px) {
            .main-container {
                padding: 0 8px;
            }
            
            .books-wrapper {
                grid-template-columns: 1fr;
            }
            
            .header-row {
                flex-direction: column;
                gap: 18px;
            }
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="header-row">
            <div style="display: flex; align-items: center; gap: 16px;">
                <div style="width:40px;"></div>
                <img src="captur.PNG" alt="BOOKSPHERE" class="logo">
            </div>
            <div style="display: flex; align-items: center;">
                <button class="add-btn" onclick="window.location.href='ajouter.php';">
                    <span style="font-size: 1.2em; margin-right: 4px;">+</span> Ajouter un livre
                </button>
                <button class="gold-button" onclick="window.location.href='afficher.php';" style="padding: 8px 20px; margin-left: 16px;">
                    &#8592; Retour
                </button>
                <button type="button" class="red-button" onclick="window.location.href='retirer.php';">
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
                    $con=mysqli_connect("localhost","root","","ict108");
                    if($con==FALSE){
                        echo "erreur d'ouverture";
                        exit(0);
                    }
                    if((!empty($_GET['auteur_ouvrage']) && !empty($_GET['editeur_ouvrage']) && !empty($_GET['annee_publication'])) || !empty($_GET['ISBN'])){
                        if(empty($_GET["ISBN"])){
                            $request=mysqli_query($con,"SELECT * FROM ouvrage WHERE  auteur_ouvrage='".$_GET['auteur_ouvrage']."' AND editeur_ouvrage='".$_GET['editeur_ouvrage']."' AND annee_publication='".$_GET['annee_publication']."' ");
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
                                            <h2>TITRE DE L'OUVRAGE: </h2><p>".$tab['titre_ouvrage']."</p>
                                            <h3>AUTEUR: </h3><p>".$tab['auteur_ouvrage']."</p>
                                            <h3>EDITEUR DE L'OUVRAGE: </h3><p>".$tab['editeur_ouvrage']."</p>
                                            <h3>ANNEE DE PUBLICATION: </h3><p>".$tab['annee_publication']."</p>
                                            <h3>ISBN DE l'OUVRAGE: </h3><p>".$tab['ISBN']."</p>
                                            <div class='book-description'>".$tab['description_ouvrage']."</div>
                                        </div>
                                    </div>";
                                }
                                echo "</div>";
                            }
                        }elseif(empty($_GET["auteur_ouvrage"]) && empty($_GET["editeur_ouvrage"]) && empty($_GET["annee_publication"])){
                            $request=mysqli_query($con,"SELECT * FROM ouvrage WHERE ISBN='".$_GET['ISBN']."'");
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
                                            <h2>TITRE DE L'OUVRAGE: </h2><p>".$tab['titre_ouvrage']."</p>
                                            <h3>AUTEUR: </h3><p>".$tab['auteur_ouvrage']."</p>
                                            <h3>EDITEUR DE L'OUVRAGE: </h3><p>".$tab['editeur_ouvrage']."</p>
                                            <h3>ANNEE DE PUBLICATION: </h3><p>".$tab['annee_publication']."</p>
                                            <h3>ISBN DE l'OUVRAGE: </h3><p>".$tab['ISBN']."</p>
                                            <div class='book-description'>".$tab['description_ouvrage']."</div>
                                        </div>
                                    </div>";
                                }
                                echo "</div>";
                            }
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
                                        <h2>TITRE DE L'OUVRAGE: </h2><p>".$tab['titre_ouvrage']."</p>
                                        <h3>AUTEUR: </h3><p>".$tab['auteur_ouvrage']."</p>
                                        <h3>EDITEUR DE L'OUVRAGE: </h3><p>".$tab['editeur_ouvrage']."</p>
                                        <h3>ANNEE DE PUBLICATION: </h3><p>".$tab['annee_publication']."</p>
                                        <h3>ISBN DE l'OUVRAGE: </h3><p>".$tab['ISBN']."</p>
                                        <div class='book-description'>".$tab['description_ouvrage']."</div>
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
<?php
/**************************************************************** 
* Projet   : Gestion de la biliothèque  
* Code PHP : supression.php 
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
* Le script supression.php permet la supression des informations  
* de  la base de données.  
**************************************************************** 
* Historique des modifications 
* 05-07-2025 : Le script la supression  d'un ouvrage  
*   
critères (ISBN).  
***************************************************************/  
?>
<?php
$con = mysqli_connect("localhost", "root", "", "ict108");
if($con == FALSE){
    echo "erreur d'ouverture";
    exit(0);
}
if(isset($_GET['ISBN'])){
    $isbn = mysqli_real_escape_string($con, $_GET['ISBN']);
    $request1 = mysqli_query($con, "SELECT * FROM ouvrage WHERE ISBN='$isbn'");
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppression d'un ouvrage</title>
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
            box-shadow: 0 4px 20px rgba(44,62,80,0.08);
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
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 60vh; /* Ajuste la hauteur pour centrer verticalement */
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
        .add-btn, .gold-button, .red-button {
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
            background: linear-gradient(90deg, #8e44ad 60%, #a569bd 100%);
            color: white;
        }
        .red-button:hover {
            background: linear-gradient(90deg, #6c3483 60%, #8e44ad 100%);
            color: #fff;
            transform: translateY(-2px) scale(1.04);
        }
        .books-wrapper {
            display: flex;
            justify-content: center;
            align-items: center; /* Centre verticalement les messages et box */
            margin-top: 40px;
            flex-wrap: wrap;
            gap: 32px;
            width: 100%;
            min-height: 200px; /* Pour centrer même s'il n'y a qu'un message */
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
            margin: 0 auto;
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
        .books-wrapper p[style*="color:red"], 
        .books-wrapper p[style*="color:green"] {
            text-align: center;
            width: 100%;
            font-size: 1.15em;
            margin-top: 30px;
        }
        @media (max-width: 900px) {
            .main-container {
                padding: 0 8px;
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
                <button class="gold-button" onclick="window.location.href='retirer.php';" style="padding: 8px 20px; margin-left: 16px;">
                    &#8592; Retour
                </button>
                <button type="button" class="red-button" onclick="window.location.href='afficher.php';">
                    <i class="button"></i> Afficher
                </button>
            </div>
        </div>
    </header>
    <main class="main-container">
        <div class="main-header">
            <div class="left">
                <h2 class="title">Suppression d'un ouvrage</h2>
                <p class="subtitle">L'ouvrage ci-dessous a été supprimé de la base</p>
                <div class="books-wrapper">
                    <?php
                    if(isset($request1) && $request1 && mysqli_num_rows($request1) > 0){
                        while($tab = mysqli_fetch_assoc($request1)){
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
                        $request = mysqli_query($con, "DELETE FROM ouvrage WHERE ISBN='" . $_GET['ISBN'] . "'");
                        if($request == FALSE){
                            echo "<p style='color:red'>Erreur de suppression (ISBN inexistant).</p>";
                        }
                    }else{
                        echo "<p style='color:red'>Aucun ouvrage trouvé avec cet ISBN.</p>";
                    }
                    if(isset($con)) mysqli_close($con);
                    ?>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
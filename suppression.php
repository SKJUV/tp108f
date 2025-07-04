<?php
$con=mysqli_connect("localhost","root","","ict108");
if($con==FALSE){
    echo "erreur d'ouverture";
    exit(0);
}

if (!isset($_GET['ISBN']) || empty($_GET['ISBN'])) {
    die("Erreur : Aucun ISBN fourni");
}

$delete = $_GET['ISBN'];

$req=mysqli_query($con,"DELETE FROM ouvrage WHERE ISBN = '$delete'");
if($req==FALSE){
    echo "erreur de suppression";
}else{
    echo "suppression reussie";
}
    
?>
<html>
    <head>
        <title>Suppression</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <a href="retirer.php">Retour</a>
    </body>
</html>

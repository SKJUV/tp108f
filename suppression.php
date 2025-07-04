<?php
session_start();
header('Content-Type: text/html; charset=utf-8');

try {
    $con = new mysqli("localhost", "root", "", "ict108");
    
    if ($con->connect_error) {
        throw new Exception("Erreur de connexion à la base de données : " . $con->connect_error);
    }
    
    if (!isset($_GET['ISBN']) || empty(trim($_GET['ISBN']))) {
        throw new Exception("Erreur : Aucun ISBN fourni");
    }
    $isbn = trim($_GET['ISBN']);
    if (!preg_match('/^[0-9-]+$/', $isbn)) {
        throw new Exception("Erreur : Format d'ISBN invalide");
    }

    $check_query = "SELECT ISBN FROM ouvrage WHERE ISBN = ?";
    $stmt = $con->prepare($check_query);
    $stmt->bind_param("s", $isbn);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 0) {
        throw new Exception("Erreur : Aucun ouvrage trouvé avec l'ISBN fourni");
    }
    
    $delete_query = "DELETE FROM ouvrage WHERE ISBN = ?";
    $stmt = $con->prepare($delete_query);
    $stmt->bind_param("s", $isbn);
    
    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            $_SESSION['message'] = "L'ouvrage avec l'ISBN '{$isbn}' a été supprimé avec succès.";
            $_SESSION['message_type'] = 'success';
        } else {
            throw new Exception("Erreur lors de la suppression : aucune ligne affectée");
        }
    } else {
        throw new Exception("Erreur lors de l'exécution de la requête de suppression");
    }
    
    $stmt->close();
    $con->close();
    
    header("Location: " . (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php'));
    exit();
    
} catch (Exception $e) {
    $_SESSION['message'] = $e->getMessage();
    $_SESSION['message_type'] = 'error';
    
    if (isset($con) && $con) {
        if (isset($stmt)) $stmt->close();
        $con->close();
    }
    
    header("Location: " . (isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php'));
    exit();
}

?>
<html>
    <head>
        <title>Suppression</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <br>
        <a href="retirer.php">Retour</a>
    </body>
</html>
<?php
session_start();
require_once '../utils/connect-db.php';
$pseudo = $_POST["pseudo"];


$sql = "SELECT pseudo FROM user WHERE pseudo = '{$pseudo}';";
try {
    $stmt = $pdo->query($sql);

    if ($stmt->fetch()) {
       
        echo "Utilisateur connecté avec succès !";
        $_SESSION["user"] = $pseudo;
        header("Location: ../index.php");
        
        
    } else {
        
        $_SESSION["message"] = "Le pseudo '$pseudo' n'existe pas.";
        header("Location: ../connect_user.php");
        exit;
}
} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
}
?>
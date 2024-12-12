<?php

require_once '../utils/connect-db.php';


if (isset($_POST['pseudo']) && !empty($_POST['pseudo'])) {

    
    $pseudo = htmlspecialchars(trim($_POST['pseudo']));

   
    $stmt = $pdo->prepare("SELECT pseudo FROM user WHERE pseudo = :pseudo");
    $stmt->execute(['pseudo' => $pseudo]);

    if ($stmt->fetch()) {
       
        echo "Le pseudo '$pseudo' est déjà pris.";
       
    } else {
        
        $stmt = $pdo->prepare("INSERT INTO user (pseudo) VALUES (:pseudo)");
        $stmt->execute(['pseudo' => $pseudo]);
        echo "Utilisateur créé avec succès !";
        
    }
}
 header("Location: ../index.php");
 exit;

?>

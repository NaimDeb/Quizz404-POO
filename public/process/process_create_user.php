<?php
session_start();



if (isset($_POST['pseudo']) && !empty($_POST['pseudo'])) {

    
    $pseudo = htmlspecialchars(trim($_POST['pseudo']));
   
    
    
    $stmt = $pdo->prepare("SELECT pseudo FROM user WHERE pseudo = :pseudo");
    $stmt->execute(['pseudo' => $pseudo]);

    if ($stmt->fetch()) {


        $_SESSION["erreur"] = $pseudo;
        header("Location: ../inscription.php?error=1");
        exit;
    } else {
        
        $stmt = $pdo->prepare("INSERT INTO user (pseudo) VALUES (:pseudo)");
        $stmt->execute(['pseudo' => $pseudo]);
        $_SESSION["erreur"] = "Utilisateur créé avec succès !";
        header("Location:  ../index.php?success=1");
        
    }
} else {
    
    $_SESSION["erreur"] = "Le champ pseudo doit être rempli.";
    header("Location:  ../inscription.php");
    exit;
}
?>

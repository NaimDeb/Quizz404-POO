<?php
session_start();
require_once "../../utils/autoloader.php";


if (!isset($_POST['pseudo']) || empty($_POST['pseudo'])) {
    
    $_SESSION["erreur"] = "Le champ pseudo doit être rempli.";
    header("Location:  ../inscription.php");
    exit;
}

    
    $pseudo = htmlspecialchars(trim($_POST['pseudo']));
   
    $userRepo = new UserRepository();

    $user = $userRepo->findByPseudo($pseudo);
    
    if ($user) {
        $_SESSION["erreur"] = $pseudo;
        header("Location: ../inscription.php?error=1");
        exit;
    }

    $userRepo->createUser($pseudo);
    $_SESSION["erreur"] = "Utilisateur créé avec succès !";
    header("Location:  ../index.php?success=1");
    exit;
?>

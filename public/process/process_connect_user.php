<?php
require_once "../../utils/autoloader.php";
session_start();
$pseudo = $_POST["pseudo"];

$UserRepo = new UserRepository;

$user = $UserRepo->findByPseudo($pseudo);

if (!$user) {
    $_SESSION["erreur"] = "Le pseudo '$pseudo' n'existe pas.";
    header("Location: ../connexion.php");
    exit;
}

$_SESSION["user"] = $user;
header("Location: ../choixTheme.php");
<?php 

require_once "../utils/autoloader.php";
session_start();

$isUserConnected = isset($_SESSION["user"]) ? true : false;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quizz404</title>
  <link rel="icon" href="./assets/image/_.ico">
  <link rel="stylesheet" href="./assets/css/output.css">
  <script src="./assets/scripts/header.js"></script>
  <style>
    header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding-top: 20px;
    }
    .logo {
      flex-grow: 1;
      text-align: center;
    }
    .btn {
      width: 120px;
      height: 70px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
    }
  </style>
</head>

<body>
  <div id="app">
    <div id="star-container">

      <header class="opacity-[1] z-2 sm:px-8 lg:px-16">
        <!-- Bouton Inscription-->
        <div class="left">
          <?php if (!$isUserConnected): ?>
            <a class="text-white font-first-font font-extrabold" href="./inscription.php">
              <div class=" text-sm max-sm:w-0 max-sm:min-w-[50px] max-sm:border-[0.3rem] btn btn-left">
                Inscription
              </div>
            </a>
          <?php endif; ?>
        </div>

        <!-- Logo au centre -->
        <div class="logo ">
          <a href="./index.php">
            <h2 class=" text-xl sm:text-4xl xl:text-8xl font-extrabold font-first-font logotext lg:text-6xl">
              <span><</span>
              <span class=>Quizz</span>
              <span class="text-[#8344bc]">405</span>
              <span>/></span>
            </h2>
          </a>
        </div>

        <!-- Bouton Connexion ou Déconnexion -->
        <div class="right">
          <?php if (!$isUserConnected): ?>
            <a class="text-white font-first-font font-extrabold" href="./connexion.php">
              <div class="text-sm max-sm:w-0 max-sm:min-w-[100px] max-sm:border-[0.3rem] btn btn-right">
                Connexion
              </div>
              
            </a>
          <?php else: ?>
            <a class="text-white font-first-font font-extrabold" href="./deconnexion.php">
              <div class="text-sm max-sm:w-0 max-sm:min-w-[100px] max-sm:border-[0.3rem] btn btn-right">
                Déconnexion
              </div>
            </a>
          <?php endif; ?>
        </div>
        
      </header>

      <main>
        <div id="star-pattern"></div>
        <div id="star-gradient-overlay"></div>
      </main>

      <div id="stripe-container">
        <div id="stripe-pattern">
          <div class="h-screen m-auto max-w-[100vw]">
          <!-- METTEZ VOTRE HTML ICI -->


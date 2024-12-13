<?php
require_once "../utils/connect-db.php";


    $sql = "SELECT * FROM quiz";
    try {
        $stmt = $pdo->query($sql);
        $quizzs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $error) {
        echo "Erreur lors de la requête : " . $error->getMessage();
    }
    ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quizz404</title>
  <link rel="icon" href="./image/_.ico">
  <link rel="stylesheet" href="../css/output.css">
  <link rel="stylesheet" href="../css/style.css">
  <script src="https://cdn.tailwindcss.com"></script>


</head>

<body class="h-[100vh] bg-body">


  <!-- Header Quiz404 -->
  <header class="flex w-100 justify-around pt-5 items-center opacity-[1]">

    <div class="w-[9%] h-[70px] shadow-[0_20px_17px_4px_rgba(0,0,0,0.99)] items-center flex justify-center bg-gradient-to-r from-amber-300 to-yellow-600">
      <a class="text-white font-first-font font-extrabold" href="formulaire.php">Inscription</a>
    </div>


    <div class="w-[50%] shadow-[0_20px_17px_4px_rgba(0,0,0,0.99)] p-5 items-center text-center bg-gradient-to-r from-amber-300 to-yellow-600">
      <h2 class="text-8xl font-extrabold font-first-font">
        <span>
          < 
        </span>
        <span>Quiz</span>
        <span class="text-purple-500">404</span>
        <span>/></span>
      </h2>
    </div>
    <div class="w-[9%] h-[70px] shadow-[0_20px_17px_4px_rgba(0,0,0,0.99)] items-center flex justify-center bg-gradient-to-r from-amber-300 to-yellow-600">
      <a class="text-white font-first-font font-extrabold" href="#">Connexion</a>
    </div>
  </header>




  <!-- Main -->
  <main class="mt-8 flex justify-center">



    <h3 class="text-slate-100 size-48 shadow-sm block">Choisis ton quizz !</h3>

    <div class="flex max-md:flex-col gap-8">

    <?php 

    foreach ($quizzs as $quizz) {
    ?>
    <a href="quizz?id=<?= $quizz["id"] ?>">
    <div class="bg-slate-100 w-48 h-48 shadow-sm rounded-sm">
        <h4>
        <?= $quizz["titre"] ?>
        </h4>
    </div>
    </a>


    <?php
    }
    
    ?>
    </div>
    

  </main>

  

    <!-- Background animation -->
    <div class="background">
      <!-- étoiles pattern -->
      <div class="w-[40%] max-h-fit shadow-[0_20px_17px_4px_rgba(0,0,0,0.99)] items-center flex justify-center bg-gradient-to-r from-amber-300 to-yellow-600">
    </div>



  </div>
</body>

</html>
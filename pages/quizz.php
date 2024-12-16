<?php
require_once "../utils/connect-db.php";
session_start();





// Check si le quizz existe
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Récupérer nom du quizz
    if (!isset($_SESSION["titre"])) {
        try {
            $sql = "SELECT titre FROM quiz WHERE id LIKE {$id}";
            $stmt = $pdo->query($sql);
            $titre = $stmt->fetch(PDO::FETCH_DEFAULT);
            $_SESSION["titre"] = $titre["titre"];
        } catch (PDOException $error) {
            echo "Erreur lors de la requête : " . $error->getMessage();
        }
    }


    $sql = "SELECT * FROM question WHERE id_quiz LIKE {$id}";

} else {
    header("location: choixQuizz.php");
    exit;
};


// 
try {
    $stmt = $pdo->query($sql);
    $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $error) {
    echo "Erreur lors de la requête : " . $error->getMessage();
}

// Vérifie si il y'a des questions
if (empty($questions)){
    header("location: choixQuizz.php?error=noQuestions");
    exit;
}


// Initialise currentQuestion  et nbOfQuestions
if (!isset($_SESSION["currentQuestion"])){
    $_SESSION["currentQuestion"] = 0;
    $_SESSION["nbOfQuestions"] = count($questions);
}


// Récupère l'id de la question
$currentQuestion = $questions[$_SESSION["currentQuestion"]];

// Cherche les réponses de l'id
$sqlreponses = "SELECT * FROM answer WHERE id_question LIKE {$currentQuestion['id']}";

try {
    $stmt = $pdo->query($sqlreponses);
    $reponses = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $error) {
    echo "Erreur lors de la requête : " . $error->getMessage();
}

?>
<!-- HTML -->

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

<body>


  <!-- Main -->
  <main class="mt-8 flex flex-col items-center">

  <h1>Quizz : <?= $_SESSION["titre"]  ?> </h1>

  <p>Question : <?= $_SESSION["currentQuestion"]+1 ?> / <?= $_SESSION["nbOfQuestions"] ?> </p>

    <h2 class="text-red-400 font-bold size-32 w-fit text-nowrap">
         <?= $currentQuestion['question'] ?> 
    </h2>

<div class="flex flex-col gap-3">
<?php   
    foreach ($reponses as $reponse) {
?>


        <div class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
            <?= $reponse["intitule"] ?>
        </div>

<?php
    }
?>
</div>

</main>

  





  </div>
</body>

</html>
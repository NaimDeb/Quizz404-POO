<?php
require_once "../utils/connect-db.php";
session_start();

if (isset($_GET["id"])) {
    $id = $_GET["id"];
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


// Initialise currentQuestion 
if (!isset($_SESSION["currentQuestion"])){
    $_SESSION["currentQuestion"] = 0;
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

    <h1 class="text-red-400 font-bold size-32 w-fit text-nowrap">
         <?= $currentQuestion['question'] ?> 
    </h1>

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
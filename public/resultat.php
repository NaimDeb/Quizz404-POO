<?php 

if (!isset($_SESSION["nbOfQuestions"]) && !isset($_SESSION["nbOfCorrectQuestions"]))
{
    header("location: ./choixQuizz.php");
    exit;
}


include_once "./assets/components/htmlstart.php"


?>



<div class="bg-slate-100 w-[500px] h-[500px] m-auto shadow-md p-8">

    <h3 class="text-center">Résultats</h3>

        <p> <?=$_SESSION["nbOfCorrectQuestions"]?> /  <?= $_SESSION["nbOfQuestions"] ?> questions correctes</p>

        <p class="text-end pt-16"> Votre score : </p>


        <a href="./choixQuizz.php" class="p-2 bg-sky-400">Retourner au choix des quizz</a>



</div>

<?php
include_once "./assets/components/htmlend.php"
?>
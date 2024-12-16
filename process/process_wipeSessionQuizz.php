<?php

session_start();

unset($_SESSION["titre"]);
unset($_SESSION["currentQuestion"]);
unset($_SESSION["nbOfQuestions"]);

header("location: ../pages/choixQuizz.php");

?>
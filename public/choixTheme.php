<?php
include_once "./assets/components/htmlstart.php";


if (isset($_SESSION["user"])){
    $user = $_SESSION["user"];
}else{
    header("Location: ../index.php ");
}

// A peut etre enlever
if (isset($_SESSION["titre"])) {
    header("location: ./process/process_wipeSessionQuizz.php");
  }

echo '<div class="pt-[150px]">';
echo QCMManager::generateDisplayAllQuizzes();
echo '</div>';
include_once "./assets/components/htmlend.php"
?>
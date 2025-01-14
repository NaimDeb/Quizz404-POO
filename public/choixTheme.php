<?php
include_once "./assets/components/htmlstart.php";
include_once "../utils/connect-db.php";

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
echo QcmManager::generateDisplayAllQuizzes($pdo);
echo '</div>';
include_once "./assets/components/htmlend.php"
?>
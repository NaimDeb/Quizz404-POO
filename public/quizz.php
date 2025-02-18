<?php
if (isset($_POST["score"])){
    include_once "../utils/autoloader.php";
    session_start();
    $userManager = new UserManager;
    
    $score = $_POST["score"];
    $idUser = $_SESSION["user"]->getId();
    $idQuizz = $_POST["idQuizz"];

    
    $response = UserManager::checkScore($idUser, $idQuizz, $score);
    
    echo json_encode($response);
    die();
}


include_once "./assets/components/htmlstart.php";

if (!isset($_SESSION["user"])){

    header("location: ./index.php");
    
}



?>
<?php
echo QCMManager::generateDisplayIndividualQuizz($_GET["id"]);
?>


<?php
include_once "./assets/components/htmlend.php"
?>
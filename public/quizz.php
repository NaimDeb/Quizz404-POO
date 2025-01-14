<?php
include_once "../utils/connect-db.php";
include_once "./assets/components/htmlstart.php";
?>
<?php
echo QcmManager::generateDisplayIndividualQuizz($_GET["id"], $pdo);

?>

<?php
include_once "./assets/components/htmlend.php"
?>
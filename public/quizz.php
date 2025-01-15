<?php
include_once "./assets/components/htmlstart.php";
?>
<?php
echo QcmManager::generateDisplayIndividualQuizz($_GET["id"]);

?>


<?php
include_once "./assets/components/htmlend.php"
?>
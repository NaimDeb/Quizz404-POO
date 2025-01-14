<?php
include_once "../utils/autoloader.php";
require("../utils/connect-db.php");
$qcmRepo = new QCMRepository($pdo);
$questionRepo = new QuestionRepository($pdo);
$reponseRepo = new AnswerRepository($pdo);

// On crée l'objet QCM 
$qcm1 = $qcmRepo->findById(1);
 
// retourne un array de toutes les questions de l'id du qcm
$questions = $questionRepo->findAllByQuizzId($qcm1->getId());

foreach ($questions as $question) {
    // Retourne un array de ttes les réponses de l'id de la question
    $reponses = $reponseRepo->findAllByQuestionId($question->getId());

    // Les set dans la question
    $question->setAnswers($reponses);
}

// Met ttes les questions dans QCM
$qcm1->setQuestion($questions);






include_once "./assets/components/htmlstart.php"
?>
<?php
$qcmManager = new QcmManager();
echo $qcmManager->generateDisplayIndividualQuizz($qcm1);

?>

<?php
include_once "./assets/components/htmlend.php"
?>

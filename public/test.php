<?php
include_once "../utils/autoloader.php";
$qcmRepo = new QCMRepository();
$questionRepo = new QuestionRepository();
$reponseRepo = new AnswerRepository();
$userRepo = new UserRepository();


$user = $userRepo->findAllUser(2);
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
echo QCMManager::generateDisplayIndividualQuizz(1);

var_dump($user);
?>

<?php
include_once "./assets/components/htmlend.php"
?>
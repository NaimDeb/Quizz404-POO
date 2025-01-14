<?php
include_once "../utils/autoloader.php";
require("../utils/connect-db.php");
$qcmRepo = new QCMRepository($pdo);
$questionRepo = new QuestionRepository($pdo);
$reponseRepo = new AnswerRepository($pdo);

// On crée l'objet QCM 
$qcm1 = $qcmRepo->findById(2);
 
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


var_dump($qcm1->getQuestion()[1]->getAnswers());

// setAnswers


die();



$qcm = new QCM(1, 'QCM de test');
$question = new Question('Que signifie POO ?' ,"En fait c'est très simple t'es juste con");
$answers = [
    new Answer('Programmation Orientée Objet', true),
    new Answer('Papillon Onirique Ostentatoire', false)
];
$questions = [];

$question->setAnswers($answers);
$questions = [
    $question
];

$question2 = new Question('Que signifie Karl ?', "tfaçon on s'en fout");
$answers2 = [
    new Answer('Karl Orientée Objet', true),
    new Answer('Papillon Onirique Ostentatoire'),
    new Answer('Bah jsais pas ', true),
    new Answer('Mcfly & Karl'),
    new Answer('K', true),
    new Answer('P6eme reponse')
];

$question2->setAnswers($answers2);

$questions[] = $question2;




$qcm->setQuestion($questions);





include_once "./assets/components/htmlstart.php"
?>
<?php
$qcmManager = new QcmManager();
echo $qcmManager->generateDisplay($qcm);

?>

<?php
include_once "./assets/components/htmlend.php"
?>

<?php
include_once "../utils/autoloader.php";
$qcm = new QCM(1, 'QCM de test');
$question = new Question('Que signifie POO ?');
$answers = [
    new Answer('Programmation Orientée Objet', true),
    new Answer('Papillon Onirique Ostentatoire')
];
$questions = [];

$question->setAnswers($answers);
$answerExplanation = $question->getExplanation(); 

$questions += [
    $question
];

$question = new Question('Que signifie Karl ?');
$answers = [
    new Answer('Karl Orientée Objet', true),
    new Answer('Papillon Onirique Ostentatoire')
];

$question->setAnswers($answers);
$question->setExplanation('La réponse correcte est "Karl".');
$questions += [
    $question
];




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

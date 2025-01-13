<?php
include_once "../utils/autoloader.php";
$qcm = new QCM(1, 'QCM de test');
$question = new Question('Que signifie POO ?', "Explication de fou");
$answers = [
    new Answer('Programmation Orientée Objet', true),
    new Answer('Papillon Onirique Ostentatoire')
];

$question->setAnswers($answers);
$question->setExplanation('La réponse correcte est "Programmation Orientée Objet".');
$questions = [
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

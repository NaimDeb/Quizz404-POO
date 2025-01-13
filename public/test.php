<?php
$qcm = new QCM(1, 'QCM de test');
$question = new Question('Que signifie POO ?');
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
?>
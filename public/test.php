<?php
include_once "../utils/autoloader.php";
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
var_dump($qcm);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<section>
    
    <h2><?= $qcm->getNom() ?></h2>

    <?php foreach($qcm->getQuestion() as $question){ ?>
        <h3><?= $question->getIntitule() ?></h3>
        <ul>
            <?php foreach($question->getAnswers as $answer){ ?>
                <li><?= $answer->getAnswers() ?></li>
            <?php } ?>   
        </ul>

    <?php } ?>
</section>
</body>
</html>
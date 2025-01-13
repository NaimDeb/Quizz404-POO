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

$qcm->setQuestion($questions);;


include_once "./assets/components/htmlstart.php"
?>
<section>
    
    <h2><?= $qcm->getNom() ?></h2>

    <?php foreach($qcm->getQuestion() as $question){ ?>
        <h3><?= $question->getIntitule() ?></h3>
        <ul>
            <?php foreach($question->getAnswers() as $answer){ ?>
                <li><?= $answer->getIntitule() ?></li>
            <?php } ?>   
        </ul>

    <?php } ?>
</section>

<?php
include_once "./assets/components/htmlend.php"
?>

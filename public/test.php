<?php
include_once "../utils/autoloader.php";
require("../utils/connect-db.php");

$qcmrepo = new QCMRepository($pdo);
var_dump($qcmrepo->findById(2));

$qcm = new QCM(1, 'QCM de test');
$question = new Question('Que signifie POO ?' ,"En fait c'est très simple t'es juste con");
$answers = [
    new Answer('Programmation Orientée Objet', true),
    new Answer('Papillon Onirique Ostentatoire')
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

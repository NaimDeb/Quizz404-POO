<?php
include_once "./assets/components/htmlstart.php";

if (isset($_SESSION["user"])){
    $user = $_SESSION["user"];
}else{
    header("Location: ../index.php ");
}

require_once "../utils/connect-db.php";
$sql = "SELECT * FROM quiz";

try {
    $stmt = $pdo->query($sql);
    $quiz = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
}


if (isset($_SESSION["titre"])) {
    header("location: ./process/process_wipeSessionQuizz.php");
  }




?>

<h1 class="text-5xl font-first-font text-center">CHOISI TON THÈME !</h1>

<div class="flex justify-center flex-wrap pt-6 gap-8">
<?php
foreach ($quiz as $quizz):
?>    
<a class="size-[300px] hover:scale-110 transition-all border-black border-[2px]" href="quizz?id=<?= $quizz["id"] ?>"><img src="<?= $quizz['img'] ?>" alt=""></a>

<?php endforeach; ?>


<?php
include_once "./assets/components/htmlend.php"
?>
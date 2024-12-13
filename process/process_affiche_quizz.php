<?php
session_start();

require_once '../utils/connect-db.php';

$sql = "SELECT titre FROM quiz;";

try {
    $stmt = $pdo->query($sql);
    $quizz = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch patient details

} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
}
?>

<?php
$quizDuration = 10;  // Durée du quiz en secondes
$currentTime = time();
$endTime = $currentTime + $quizDuration;  // Calculer l'heure de fin du quiz
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz avec compte à rebours</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        var endTime = <?php echo $endTime; ?>;

        function updateCountdown() {
            var now = Math.floor(Date.now() / 1000); 
            var timeLeft = endTime - now;

            if (timeLeft <= 0) {
                document.getElementById("countdown").innerHTML = "Temps écoulé!";
                // Vous pouvez ajouter une redirection ou autre action ici
                // window.location.href = "http://localhost/Quizphp/Quizz404/index.php";
                return;
            }

            document.getElementById("countdown").innerHTML = timeLeft + " secondes";
        }

        // Mettre à jour le compte à rebours chaque seconde
        setInterval(updateCountdown, 1000);
    </script>
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">

    <div class="bg-white p-8 rounded-lg shadow-lg text-center w-80">
        <h1 class="text-3xl font-semibold mb-4 text-gray-800">Il vous reste:</h1>
        <div id="countdown" class="mt-4 text-4xl font-bold text-blue-500">10 secondes</div>
    </div>

</body>
</html>

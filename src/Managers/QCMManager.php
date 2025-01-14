<?php

require_once "../utils/connect-db.php";
require_once "../utils/autoloader.php";

class QcmManager {


    public static function generateDisplayAllQuizzes(PDO $pdo){
        $qcmRepo = new QCMRepository($pdo);
        $allQCM = $qcmRepo->getAllQuizz();
        
        ob_start(); ?>

            <h1 class="text-5xl font-first-font text-center">CHOISI TON THÈME !</h1>

            <div class="flex justify-center flex-wrap pt-6 gap-8">
            <?php
            foreach ($allQCM as $QCM) {
            ?> 
            <a class="size-[300px] hover:scale-110 transition-all border-black border-[2px]" href="quizz?id=<?= htmlspecialchars($QCM->getId()) ?>"><img src="<?= htmlspecialchars($QCM->getImg()) ?>" alt=""></a>
            <?php 
            } 
            ?>
            </div>

        <?php 
        return ob_get_clean();


    }
  
    public function generateDisplayIndividualQuizz(QCM $qcm){

        ob_start(); 
?> 
        <!-- Initialisation du HTML -->
        <div class="container mx-auto p-8 bg-gray-100 rounded-lg shadow-lg text-center">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-6"><?= htmlspecialchars($qcm->getNom()) ?></h2>

        // Parcours des questions du QCM
        foreach ($qcm->getQuestion() as $question) {
            $html .= '<div class="question-card bg-white p-6 mb-6 rounded-lg shadow-sm">';
            $html .= '<h3 class="text-2xl font-semibold text-gray-700 mb-4">' . htmlspecialchars($question->getIntitule()) . '</h3>';
            $html .= '<ul class="flex justify-center gap-4 space-y-2 flex-col">';

            // Parcours des réponses de la question
            $explanation = htmlspecialchars($question->getExplanation()); 
            foreach ($question->getAnswers() as $answer) {
                $isRight = $answer->getisRightAnswer() ? 'true' : 'false';
                
                $html .= '<li class="answer-item text-lg text-gray-600 p-2 border border-gray-300 rounded-lg w-[100%] mx-auto cursor-pointer" data-is-right="' . $isRight . '" data-explanation="' . $explanation . '">';
                $html .= htmlspecialchars($answer->getIntitule());
                $html .= '</li>';
            }

            $html .= '</ul>';
            $html .= '<p class="explanation hidden text-lg text-gray-700 mt-4"><br> Explications: ' . $explanation . '</p>'; 
            $html .= '</div>';
        }

        $html .= '</div>';

        // Ajout du JavaScript pour gérer les clics et l'affichage de l'explication
        $html .= '
        <script>
            // Sélection de tous les éléments de réponse
            const answers = document.querySelectorAll(".answer-item");

            // Ajout d\'un événement "click" sur chaque réponse
            answers.forEach(answer => {
                answer.addEventListener("click", function () {
                    const isRight = this.getAttribute("data-is-right") === "true";
                    const explanation = this.getAttribute("data-explanation");
                    const explanationElement = this.closest(".question-card").querySelector(".explanation");

                    // Supprimer les styles précédents des réponses
                    answers.forEach(a => {
                        a.classList.remove("text-green-500", "text-red-500", "font-bold", "border-green-500", "border-red-500");
                        a.classList.add("text-gray-600"); // Remet la couleur de base
                    });

                    // Ajouter les styles en fonction de la réponse
                    this.classList.remove("text-gray-600"); // Supprime la couleur grise
                    if (isRight) {
                        this.classList.add("text-green-500", "font-bold", "border-green-500"); // Bonne réponse : vert
                    } else {
                        this.classList.add("text-red-500", "font-bold", "border-red-500"); // Mauvaise réponse : rouge
                    }

                    // Afficher l\'explication
                    explanationElement.textContent = explanation;
                    explanationElement.classList.remove("hidden");
                });
            });
        </script>
        ';

        return $html;
    }
}

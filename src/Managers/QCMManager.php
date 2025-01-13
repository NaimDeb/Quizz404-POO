<?php

class QcmManager {
  
    public function generateDisplay(QCM $qcm): string {
        // Initialisation du HTML
        $html = '<div class="container mx-auto p-8 bg-gray-100 rounded-lg shadow-lg text-center">';
        $html .= '<h2 class="text-3xl font-bold text-center text-gray-800 mb-6">' . htmlspecialchars($qcm->getNom()) . '</h2>';

        // Parcours des questions du QCM
        foreach ($qcm->getQuestion() as $question) {
            $html .= '<div class="question-card bg-white p-6 mb-6 rounded-lg shadow-sm">';
            $html .= '<h3 class="text-2xl font-semibold text-gray-700 mb-4">' . htmlspecialchars($question->getIntitule()) . '</h3>';
            $html .= '<ul class="flex justify-center gap-4 space-y-2 flex-col">';

            // Parcours des réponses de la question
            foreach ($question->getAnswers() as $answer) {
                $isRight = $answer->getisRightAnswer() ? 'true' : 'false';
                $html .= '<li class="answer-item text-lg text-gray-600 p-2 border border-gray-300 rounded-lg w-[100%] mx-auto cursor-pointer" data-is-right="' . $isRight . '">';
                $html .= htmlspecialchars($answer->getIntitule());
                $html .= '</li>';
            }

            $html .= '</ul>';
            $html .= '</div>';
        }

        $html .= '</div>';

        
        $html .= '
        <script>
            // Sélection de tous les éléments de réponse
            const answers = document.querySelectorAll(".answer-item");

            // Ajout d\'un événement "click" sur chaque réponse
            answers.forEach(answer => {
                answer.addEventListener("click", function () {
                    const isRight = this.getAttribute("data-is-right") === "true";

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
                });
            });
        </script>
        ';

        return $html;
    }
}

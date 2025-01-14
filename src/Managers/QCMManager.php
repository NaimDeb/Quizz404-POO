<?php

class QcmManager {
  
    public function generateDisplay(QCM $qcm){

        ob_start(); 
?> 
        <!-- Initialisation du HTML -->
        <div class="container mx-auto p-8 bg-gray-100 rounded-lg shadow-lg text-center">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-6"><?= htmlspecialchars($qcm->getNom()) ?></h2>

            <div id="question-container">
                <?php foreach ($qcm->getQuestion() as $index => $question): ?>
                <div class="question-card bg-white p-6 mb-6 rounded-lg shadow-sm" data-question-index="<?= $index ?>" style="display: <?= $index === 0 ? 'block' : 'none' ?>;">
                    <h3 class="text-2xl font-semibold text-gray-700 mb-4"><?= htmlspecialchars($question->getIntitule()) ?></h3>
                    <ul class="flex justify-center gap-4 space-y-2 flex-col">
                    <?php foreach ($question->getAnswers() as $answer): ?>
                        <li class="answer-item text-lg text-gray-600 p-2 border border-gray-300 rounded-lg w-[100%] mx-auto cursor-pointer" data-is-right="<?= $answer->getisRightAnswer() ? 'true' : 'false' ?>" data-answer="<?= htmlspecialchars($answer->getIntitule()) ?>">
                        <?= htmlspecialchars($answer->getIntitule()) ?>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                    <p class="correct-answer text-lg text-gray-600 mt-4 hidden">La bonne réponse est : <span class="correct-answer-text"></span></p>
                    <p class="explanation text-lg text-gray-600 mt-4 hidden"><?= htmlspecialchars($question->getExplanation()) ?></p>
                </div>
                <?php endforeach; ?>
            </div>

            <button id="next-button" class="hidden mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg">Next</button>
        </div>

        <script>
            const answers = document.querySelectorAll(".answer-item");
            const nextButton = document.getElementById("next-button");
            const questionContainer = document.getElementById("question-container");
            let currentQuestionIndex = 0;

            answers.forEach(answer => {answer.addEventListener("click", handleClickAnswer)});

            function handleClickAnswer(event) {
                const isRight = this.getAttribute("data-is-right") === "true";
                const correctAnswerText = this.closest('.question-card').querySelector('.correct-answer-text');
                const explanation = this.closest('.question-card').querySelector('.explanation');
                const correctAnswer = Array.from(this.closest('.question-card').querySelectorAll('.answer-item')).find(a => a.getAttribute("data-is-right") === "true");

                answers.forEach(a => {
                    a.removeEventListener("click", handleClickAnswer)
                });

                this.classList.remove("text-gray-600");
                if (isRight) {
                    this.classList.add("text-green-500", "font-bold", "border-green-500");
                } else {
                    this.classList.add("text-red-500", "font-bold", "border-red-500");
                }

                correctAnswerText.textContent = correctAnswer.getAttribute("data-answer");
                explanation.classList.remove("hidden");
                correctAnswerText.closest('.correct-answer').classList.remove("hidden");

                nextButton.classList.remove("hidden");
            }

            nextButton.addEventListener("click", handleClickNext); 
            
            function handleClickNext(event) {
                const currentQuestion = document.querySelector(`.question-card[data-question-index="${currentQuestionIndex}"]`);
                currentQuestion.style.display = 'none';
                currentQuestionIndex++;

                if (currentQuestionIndex < questionContainer.children.length) {
                    const nextQuestion = document.querySelector(`.question-card[data-question-index="${currentQuestionIndex}"]`);
                    nextQuestion.style.display = 'block';
                    nextButton.classList.add("hidden");
                } else {
                    questionContainer.innerHTML = '<h3 class="text-2xl font-semibold text-gray-700 mb-4">Quiz Completed!</h3>';
                    nextButton.style.display = 'none';
                }

                answers.forEach(answer => {answer.addEventListener("click", handleClickAnswer)});
            }
        </script>

<?php
        return ob_get_clean();
    }
}
?>

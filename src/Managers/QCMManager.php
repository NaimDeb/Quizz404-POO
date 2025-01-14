<?php

// ! erreur de merde
require_once "../utils/connect-db.php";
require_once "../utils/autoloader.php";

class QcmManager
{


    public static function generateDisplayAllQuizzes(PDO $pdo)
    {
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

    private static function remplirQcm(QCM $qcm, PDO $pdo)
    {
        $questionRepo = new QuestionRepository($pdo);
        $reponseRepo = new AnswerRepository($pdo);

        $questions = $questionRepo->findAllByQuizzId($qcm->getId());

        foreach ($questions as $question) {
            $reponses = $reponseRepo->findAllByQuestionId($question->getId());
            $question->setAnswers($reponses);
        }

        $qcm->setQuestion($questions);

        return $qcm;
    }

    public static function generateDisplayIndividualQuizz(int $id, PDO $pdo)
    {
        $qcmRepo = new QCMRepository($pdo);
        $qcm = $qcmRepo->findById($id);
        $qcm = self::remplirQcm($qcm, $pdo);

        ob_start();
    ?>
        <div class="pt-[70px] container mx-auto p-8 bg-gray-100 rounded-lg shadow-lg text-center overflow-auto max-h-screen">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-6"><?= htmlspecialchars($qcm->getNom()) ?></h2>

            <div id="question-container">
                <?php foreach ($qcm->getQuestion() as $index => $question): ?>
                    
                   
    <img class="max-w-[300px] m-auto my-[10px]" src="<?= htmlspecialchars($question->getImgUrl()) ?>" alt="Image du quizz">




                    <div class="question-card bg-white p-6 mb-6 rounded-lg shadow-sm" data-question-index="<?= $index ?>" style="display: <?= $index === 0 ? 'block' : 'none' ?>;">
                        <h3 class="text-2xl font-semibold text-gray-700 mb-4"><?= htmlspecialchars($question->getIntitule()) ?></h3>
                        <?= $question->getImgUrl() ? '<img class="max-w-[300px] m-auto my-[10px]" src="' . htmlspecialchars($question->getImgUrl()) . '" alt="Image du quizz">' : '' ?>
                        <ul class="flex flex-wrap justify-center gap-4">
                            <?php foreach ($question->getAnswers() as $answer): ?>
                                <li class="answer-item text-lg text-gray-600 p-2 border border-gray-300 rounded-lg cursor-pointer" data-is-right="<?= $answer->getisRightAnswer() ? 'true' : 'false' ?>" data-answer="<?= htmlspecialchars($answer->getIntitule()) ?>">
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

            answers.forEach(answer => {
                answer.addEventListener("click", handleClickAnswer)
            });

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

                answers.forEach(answer => {
                    answer.addEventListener("click", handleClickAnswer)
                });
            }
        </script>

<?php
        return ob_get_clean();
    }
}

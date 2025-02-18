<?php

class QCMManager
{


    public static function generateDisplayAllQuizzes()
    {
        $qcmRepo = new QCMRepository();
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



    public static function generateDisplayIndividualQuizz(int $id)
    {
        $qcmRepo = new QCMRepository();
        // On crée un QCM
        $qcm = $qcmRepo->findById($id);
        // On remplit le QCM de ses questions et réponses
        $qcm = $qcm->remplirQcm();

        $numberOfQuestions = count($qcm->getQuestion());

        ob_start();
    ?>

        <script src="./assets/scripts/quizz.js" defer></script>
        <script> idQuizz = <?= $id ?> </script>


        <div class="pt-[70px] container mx-auto p-8 bg-gray-100 rounded-lg shadow-lg overflow-y-scroll scroll-0 text-center max-h-[800px]">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Quizz<br><?= htmlspecialchars($qcm->getNom()) ?></h2>
            <p id="demo" class=" min-w-[150px] text-3xl font-extrabold text-center text-white bg-gradient-to-r from-blue-400 via-blue-500 to-blue-600 mb-4 py-3 px-6 rounded-full shadow-2xl inline-block transform transition-all duration-300 hover:scale-110"></p>


            <div id="question-container">
                <!-- Question -->
                <?php foreach ($qcm->getQuestion() as $index => $question): ?>
                    <div class="question-card bg-white p-6 mb-6 rounded-lg shadow-sm" data-question-index="<?= $index ?>" style="display: <?= $index === 0 ? 'block' : 'none' ?>;">
                    <h3 class="text-2xl font-semibold text-gray-700 mb-4">Question : <span><?= $index+1 ?></span> / <span><?= $numberOfQuestions ?></span> <br>  <?= htmlspecialchars($question->getIntitule()) ?></h3>                        <?= $question->getImgUrl() ? '<img class="max-w-[300px] m-auto my-[10px]" src="' . htmlspecialchars($question->getImgUrl()) . '" alt="Image du quizz">' : '' ?>
                        <ul class="flex flex-wrap justify-center gap-4">
                        <!-- Réponses -->
                            <?php foreach ($question->getAnswers() as $answer): ?>
                                <li class="answer-item  text-gray-600 text-xl bg-gray-200 text-center px-4 py-2 border-2 border-gray-300 rounded-lg cursor-pointer max-w-full basis-full lg:basis-[45%] transition-all transform hover:scale-110" data-is-right="<?= $answer->getisRightAnswer() ? 'true' : 'false' ?>" data-answer="<?= htmlspecialchars($answer->getIntitule()) ?>">
                                    <?= htmlspecialchars($answer->getIntitule()) ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <p class="correct-answer text-lg text-gray-600 mt-4 hidden">La bonne réponse est : <span class="correct-answer-text"></span></p>
                        <p class="explanation text-lg text-gray-600 mt-4 hidden"><?= htmlspecialchars($question->getExplanation()) ?></p>
                    </div>
                <?php endforeach; ?>

            </div>
            <button id="next-button" class="hidden btn-lite hover:scale-110  my-4 px-4 py-2 bg-gray-500 text-white rounded-lg transition-all hover:bg-gray-700  max-sm:w-full md:w-auto">Question suivante</button>
        </div>

<?php
        return ob_get_clean();
    }
}

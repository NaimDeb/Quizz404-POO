<?php

class QuestionMapper {

    public function mapToObject(array $data): Question {

        $id = $data["id"];
        $id_quizz = $data["id_quiz"];
        $intitule = $data["question"];
        $imgUrl = $data["img"];

        return new Question($intitule, "Pas d'explications", $id, $id_quizz, $imgUrl);
    }


    // public Function mapAllQuestionsToArray (Question ...$questions) {


    //     $arrayQuestions = [];

    //     foreach ($questions as $question) {
    //         $arrayQuestions[] = $question;
    //     }

    //     return $arrayQuestions;

    // }


    // public function mapToQCM(QCM $qcm, Question $question) {




    // }

    
}
?>
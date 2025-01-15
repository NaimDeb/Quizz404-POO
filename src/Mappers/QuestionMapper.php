<?php

class QuestionMapper {

    public static function mapToObject(array $data): Question {

        // todo : Regarder si on utilise bien tout ça
        $id = $data["id"];
        // $id_quizz = $data["id_quiz"];
        $intitule = $data["question"];
        $imgUrl = $data["img"];
        $explication = $data["explication"] ? $data["explication"] : "Pas d'explications";

        return new Question($id, $intitule, $imgUrl, $explication);
    }
    
}
?>
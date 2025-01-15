<?php

class QuestionMapper {

    public static function mapToObject(array $data): Question {

        // todo : Regarder si on utilise bien tout ça
        $id = $data["id"];
        // $id_quizz = $data["id_quiz"];
        $intitule = $data["question"];
        $imgUrl = $data["img"];

        return new Question($id, $intitule, $imgUrl, "Pas d'explications");
    }
    
}
?>
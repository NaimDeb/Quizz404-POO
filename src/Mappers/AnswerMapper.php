<?php

class AnswerMapper {

    public static function mapToObject(array $data): Answer {

        $id = $data["id_question"];
        $reponse = $data["intitule"];
        $correct = $data["is_correct"];

        return new Answer($id, $reponse, $correct);
    }

    
}

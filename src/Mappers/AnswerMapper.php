<?php

class QcmAnswerMapper {

    public function mapToObject(array $data): QCM {

        $id = $data["id"];
        $titre = $data["intitule"];
        $correct = $data["is_correct"];

        return new QCM($id, $titre, $correct);
    }

    
}

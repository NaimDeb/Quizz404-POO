<?php

class QcmMapper {
    private PDO $db;


    public function mapToObject(array $data): QCM {

        $id = $data["id"];
        $titre = $data["titre"];
        $imgUrl = $data["img"];

        return new QCM($id, $titre, $imgUrl);
    }

    
}

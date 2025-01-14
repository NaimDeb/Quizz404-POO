<?php

class QcmMapper {

    public function mapToObject(array $data): QCM {

        $id = $data["id"];
        $titre = $data["titre"];
        $imgUrl = $data["img"];

        return new QCM($id, $titre, $imgUrl);
    }

    
}

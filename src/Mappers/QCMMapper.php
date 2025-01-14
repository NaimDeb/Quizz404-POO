<?php

class QcmMapper {
    private PDO $db;


    public function mapToObject(array $data): QCM {
        return new QCM($data["id"], $data["titre"]);
    }

    
}

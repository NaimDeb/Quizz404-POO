<?php
class UserRepository {

    private PDO $db;
    private UserMapper $mapper;

    public function __construct(){
        $this->db = Database::getInstance();
    }

    public function findAllUser(int $idUser): array {

        $stmt = $this->db->prepare("SELECT * FROM user WHERE id = :idUser");
        $stmt->bindParam(":idUser", $idUser, PDO::PARAM_INT);
        $stmt->execute();

        $data = $stmt->fetchAll();
        return $data;
    }
}
<?php
class UserRepository {

    private PDO $db;
    private UserMapper $mapper;

    public function __construct(){
        $this->db = Database::getInstance();
    }

    public function findByPseudo(string $pseudo): ?array {

        $stmt = $this->db->prepare("SELECT * FROM user WHERE pseudo = :pseudo");
        $stmt->bindParam(":pseudo", $pseudo, PDO::PARAM_STR);
        $stmt->execute();

        $data = $stmt->fetch();

        if (!$data) {
            return null;
        }

        return $data;
    }
}
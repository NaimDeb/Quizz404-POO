<?php
class UserRepository {

    private PDO $db;

    public function __construct(){
        $this->db = Database::getInstance();
    }

    public function findByPseudo(string $pseudo): ?User {

        $stmt = $this->db->prepare("SELECT * FROM user WHERE pseudo = :pseudo");
        $stmt->bindParam(":pseudo", $pseudo, PDO::PARAM_STR);
        $stmt->execute();

        $data = $stmt->fetch();

        if (!$data) {
            return null;
        }

        $data = UserMapper::mapToObject($data);

        return $data;
    }


    public function createUser(string $pseudo): void {

        $stmt = $this->db->prepare("INSERT INTO user (pseudo) VALUES (:pseudo)");
        $stmt->execute(['pseudo' => $pseudo]);

    }


}
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


    public function fetchScore(int $idUser, int $idQuizz){

        $stmt = $this->db->prepare("SELECT * FROM score WHERE id_user = :id_user AND id_quiz = :id_quiz");
        $stmt->bindParam(":id_user", $idUser, PDO::PARAM_INT);
        $stmt->bindParam(":id_quiz", $idQuizz, PDO::PARAM_INT);
        $stmt->execute();

        $data = $stmt->fetch();

        if (!$data) {
            return null;
        }

        return $data;

    }


    public function changeScore(int $idUser, int $idQuizz, int $score){

        if ($this->fetchScore($idUser, $idQuizz)) {

        $stmt = $this->db->prepare("UPDATE score SET score = :score WHERE id_user = :id_user AND id_quiz = :id_quiz");
        $stmt->bindParam(":score", $score, PDO::PARAM_INT);
        $stmt->bindParam(":id_user", $idUser, PDO::PARAM_INT);
        $stmt->bindParam(":id_quiz", $idQuizz, PDO::PARAM_INT);
        $stmt->execute();

        }else{

        $stmt = $this->db->prepare("INSERT INTO score (score, id_user, id_quiz) VALUES (:score, :id_user, :id_quiz)");
        $stmt->bindParam(":score", $score, PDO::PARAM_INT);
        $stmt->bindParam(":id_user", $idUser, PDO::PARAM_INT);
        $stmt->bindParam(":id_quiz", $idQuizz, PDO::PARAM_INT);
        $stmt->execute();

        }


    }

}
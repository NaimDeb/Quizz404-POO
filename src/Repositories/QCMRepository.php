<?php 


class QCMRepository {

    private PDO $db;
    private QCMMapper $mapper;

    public function __construct(){
        $this->db = Database::getInstance();
        $this->mapper = new QCMMapper();
    }


    public function findById(int $id): ?QCM {

        $stmt = $this->db->prepare("SELECT * FROM quiz WHERE id = :id LIMIT 1");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        $data = $stmt->fetch();
        

        if (!$data) {
            return null;
        }


        return $this->mapper->mapToObject($data);

    }


    public function getAllQuizz() {
        $stmt = $this->db->prepare("SELECT * FROM quiz");
        $stmt->execute();

        $data = $stmt->fetchAll();

        $arrayData = [];

        foreach ($data as $quizz) {
            $arrayData[] = $this->mapper->mapToObject($quizz);
        }

        return $arrayData;

    }

}



?>
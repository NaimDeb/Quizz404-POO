<?php 


class QCMRepository {

    private PDO $db;
    private QCMMapper $mapper;

    public function __construct(PDO $db){
        $this->db = $db;
        $this->mapper = new QCMMapper();
    }


    public function findById(int $id): ?QCM {

        $stmt = $this->db->prepare("SELECT * FROM quiz WHERE id = :id LIMIT 1");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        

        if (!$data) {
            return null;
        }


        return $this->mapper->mapToObject($data);

    }


    public function getAllQuizz() {
        $stmt = $this->db->prepare("SELECT * FROM quiz");
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $arrayData = [];

        foreach ($data as $quizz) {
            $arrayData[] = $this->mapper->mapToObject($quizz);
        }

        return $arrayData;

    }

}



?>
<?php 



class AnswerRepository {

    private PDO $db;
    private AnswerMapper $mapper;

    public function __construct(PDO $db){
        $this->db = $db;
        $this->mapper = new AnswerMapper();
    }


    // public function findById(int $id): ?Answer {

    //     $stmt = $this->db->prepare("SELECT * FROM answer WHERE id = :id");
    //     $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    //     $stmt->execute();

    //     $data = $stmt->fetch(PDO::FETCH_ASSOC);

    //     if (!$data) {
    //         return null;
    //     }


    //     return $this->mapper->mapToObject($data);


    // }


    public function findAllByQuestionId(int $idQuestion): array {

        $stmt = $this->db->prepare("SELECT * FROM answer WHERE id_question = :idQuestion");
        $stmt->bindParam(":idQuestion", $idQuestion, PDO::PARAM_INT);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!$data) {
            return [];
        }

        $arrayAnswers = [];


        foreach ($data as $answer) {

            $objectAnswer = $this->mapper->mapToObject($answer);

            $arrayAnswers[] = $objectAnswer;
            
        }

        return $arrayAnswers;
    
    }

}


?>



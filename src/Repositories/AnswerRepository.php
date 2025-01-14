<?php 



class AnswerRepository {

    private PDO $db;
    private AnswerMapper $mapper;

    public function __construct(){
        $this->db = Database::getInstance();
    }

    public function findAllByQuestionId(int $idQuestion): array {

        $stmt = $this->db->prepare("SELECT * FROM answer WHERE id_question = :idQuestion");
        $stmt->bindParam(":idQuestion", $idQuestion, PDO::PARAM_INT);
        $stmt->execute();

        $data = $stmt->fetchAll();

        if (!$data) {
            return [];
        }

        $arrayAnswers = [];


        foreach ($data as $answer) {

            $objectAnswer = AnswerMapper::mapToObject($answer);

            $arrayAnswers[] = $objectAnswer;
            
        }

        return $arrayAnswers;
    
    }

}


?>



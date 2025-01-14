<?php 



class QuestionRepository {

    private PDO $db;
    private QuestionMapper $mapper;

    public function __construct(){
        $this->db = Database::getInstance();
        $this->mapper = new QuestionMapper();
    }


    /**
     * Récupère toutes les questions ayant le même quiz_id et retourne un array
     */
    public function findAllByQuizzId(int $idQuizz): array {

        $stmt = $this->db->prepare("SELECT * FROM question WHERE id_quiz = :idQuizz");
        $stmt->bindParam(":idQuizz", $idQuizz, PDO::PARAM_INT);
        $stmt->execute();

        $data = $stmt->fetchAll();

        if (!$data) {
            return [];
        }

        $arrayQuestions = [];


        foreach ($data as $question) {

            $objectQuestion = $this->mapper->mapToObject($question);

            $arrayQuestions[] = $objectQuestion;
            
        }

        return $arrayQuestions;
    
    }

}


?>



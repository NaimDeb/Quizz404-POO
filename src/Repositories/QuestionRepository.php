<?php 



class QuestionRepository {

    private PDO $db;

    public function __construct(){
        $this->db = Database::getInstance();
    }


    /**
     * Récupère toutes les questions ayant le même quiz_id et retourne un array d'instances
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

            $arrayQuestions[] = QuestionMapper::mapToObject($question);
            
        }

        return $arrayQuestions;
    
    }

}


?>



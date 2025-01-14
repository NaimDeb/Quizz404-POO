<?php 


class AnswerRepository {

    private PDO $db;
    private QCMMapper $mapper;

    public function __construct(PDO $db){
        $this->db = $db;
        $this->mapper = new QCMMapper();
    }
    public function findById(int $questionId): array {
        $stmt = $this->db->prepare("SELECT * FROM answer WHERE id_question = :id");
        $stmt->bindParam(":id", $questionId, PDO::PARAM_INT);
        $stmt->execute();
        
    
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        var_dump($data);
    
        if (!$data) {
            return []; // Retourne un tableau vide si aucune donnée trouvée
        }
    
        // Transformation des données en objets Answer
        $answers = [];
        foreach ($data as $row) {
            $answer = new Answer($intitule = $row['intitule'], $isRightAnswer = $row['is_correct'], $id = $row['id_quetion']);
            $answer->setId($row['id_question']);
            $answer->setIntitule($row['intitule']);
            $answer->setIsRightAnswer($row['is_correct']);
            $answers[] = $answer;
        }
   
        var_dump($answers);
        return $answers;
        
    }
    
}

// Connexion PDO
require("../../utils/connect-db.php");

?>
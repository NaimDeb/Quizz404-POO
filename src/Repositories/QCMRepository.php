<?php 


class QCMRepository {

    private PDO $db;

    public function __construct(){
        $this->db = Database::getInstance();
    }


    /**
     * Cherche dans la base de donnée le Quizz qui a l'id donné, appelle QCMMapper et retourne un objet | null.
     */
    public function findById(int $id): ?QCM {

        $stmt = $this->db->prepare("SELECT * FROM quiz WHERE id = :id LIMIT 1");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        $data = $stmt->fetch();
        

        if (!$data) {
            return null;
        }

        return QcmMapper::mapToObject($data);;

    }


    /**
     * Récupère tous les quizz de la base de donnée, appelle QCMMapper et retourne une liste d'instances
     */
    public function getAllQuizz(): array {
        $stmt = $this->db->prepare("SELECT * FROM quiz");
        $stmt->execute();

        $data = $stmt->fetchAll();

        $arrayData = [];

        foreach ($data as $quizz) {
            $arrayData[] = QcmMapper::mapToObject($quizz);
        }

        return $arrayData;

    }

}



?>
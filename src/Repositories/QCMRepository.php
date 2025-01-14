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

}

// Connexion PDO
require("./utils/connect-db.php");

?>
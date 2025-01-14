<?php

class QcmMapper {
    private PDO $db;

    
    public function __construct(PDO $db) {
        $this->db = $db;
    }

    // Méthode pour récupérer un QCM complet avec ses questions et réponses
    public function getQcmById(int $qcmId): ?QCM {
       
        $stmt = $this->db->prepare("SELECT * FROM quiz WHERE id = :id");
        $stmt->execute(['id' => $qcmId]);
        $qcmData = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$qcmData) {
            return null; 
        }

        // Créer l'objet QCM
        $qcm = new QCM();
        $qcm->getId($qcmData['id']);
        $qcm->getNom($qcmData['nom']);

        
        $questions = $this->getQuestionsByQcmId($qcmId);
        $qcm->setQuestion($questions);

        return $qcm;
    }

    
}

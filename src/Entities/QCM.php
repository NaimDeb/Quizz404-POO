<?php

class QCM {
private int $id;
private array $questions;
private string $nom;

	public function __construct($id, $questions, $nom) {
		$this->id = $id;
		$this->questions = [];
		$this->nom = $nom;
	}

    public function getId(): int {
        return $this->id;
    }

    public function getQuestion(): array {
        return $this->questions;
    }

    public function setQuestion(array $questions): self {
        foreach($questions as $question){
            if(!$question instanceof QCM){
                throw new Exception("Il faut que le tableau soit composé de QCM uniquement");
            }
        }
        $this->questions = $questions;
        return $this;
    }

    public function getNom(): string {
        return $this->nom;
    }
}
?>


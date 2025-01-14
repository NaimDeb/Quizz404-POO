<?php

class QCM {
private int $id;
private string $nom;
private string $img;
private array $questions;

	public function __construct($id, $nom, $img = "https://cdn-icons-png.flaticon.com/512/25/25400.png") {
		$this->id = $id;
		$this->questions = [];
		$this->nom = $nom;
        $this->img = $img;
	}

    public function getId(): int {
        return $this->id;
    }

    public function getQuestion(): array {
        return $this->questions;
    }
    
    public function getNom(): string {
        return $this->nom;
    }

    public function getImg(): string {
        return $this->img;
    }

    public function setQuestion(array $questions): self {
        foreach($questions as $question){
            if(!$question instanceof Question){
                throw new Exception("Il faut que le tableau soit composé de QCM uniquement");
            }
        }
        $this->questions = $questions;
        return $this;
    }
}
?>


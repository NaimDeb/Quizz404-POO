<?php 


class Question {

    private string $intitule;
    private string $answerExplanation;
    private array $answers;


    public function __construct(string $intitule, string $answerExplanation = "Pas d'explications")
    {
        $this->intitule = $intitule;
        $this->answerExplanation = $answerExplanation;
        $this->answers = [];
        
    }

    // Getters

    public function getAnswers() : array {
        return $this->answers;
    }
    public function getExplanation() : string {
        return $this->answerExplanation;
    }

    // Setters

    public function setAnswers(array $answersArray): self {

        foreach ($answersArray as $answer) {
            if (!($answer instanceof Answer)) {

                throw new Exception("Il faut que le tableau donné soit composé d'instances Answer uniquement !");
            }

            $this->answers = $answersArray;
            return $this;

        }


    }
    public function setExplanation(string $explanation):self{
        $this->answerExplanation = $explanation;
        return $this;
    }



}


?>
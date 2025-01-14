<?php 


class Question {

    private string $intitule;
    private string $answerExplanation;
    private array $answers;
    private int $id;
    private string $imgUrl;


    public function __construct(int $id, string $intitule, $imgUrl = null,string $answerExplanation = "Pas d'explications")
    {
        $this->id = $id;
        $this->intitule = $intitule;
        $this->imgUrl = $imgUrl;
        $this->answerExplanation = $answerExplanation;

        $this->answers = [];
        
    }

    // Getters

    public function getIntitule() : string {
        return $this->intitule;
    }
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



    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }
}


?>
<?php 


class Question {

    private string $intitule;
    private string $answerExplanation;
    private array $answers;
    private int $id;
    private int $quizz_id;
    private string $imgUrl;


    public function __construct(string $intitule, string $answerExplanation = "Pas d'explications", $id = 0, $quizz_id = 0, $imgUrl = "Pas d'image")
    {
        $this->intitule = $intitule;
        $this->answerExplanation = $answerExplanation;
        $this->answers = [];
        $this->id = $id;
        $this->quizz_id = $quizz_id;
        $this->imgUrl = $imgUrl;
        
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


}


?>
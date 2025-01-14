<?php 

class Answer{

    private string $intitule;
    private bool $isRightAnswer;


    public function __construct(string $intitule ,bool $isRightAnswer = false)
    {
        $this->intitule = $intitule;
        $this->isRightAnswer = $isRightAnswer;
        
    }


    // Getters

    public function getIntitule() : string{
        return $this->intitule;
    }
    public function getisRightAnswer() : bool{
        return $this->isRightAnswer;
    }



}




?>
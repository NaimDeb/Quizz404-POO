<?php 

class Answer{
    private int $id;
    private string $intitule;
    private bool $isRightAnswer;


    public function __construct(int $id, string $intitule ,bool $isRightAnswer = false)
    {
        $this->id = $id;
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
    public function getId() : int{
        return $this->id;
    }

public function setIntitule(string $intitule) : void{
    $this->intitule = $intitule;

}

public function setIsRightAnswer(bool $isRightAnswer) : void{
    $this->isRightAnswer = $isRightAnswer;

}

public function setId(int $id) : void{
    $this->id = $id;

}

}



<?php

class User{
    private int $id;
    private string $pseudo;


    public function __construct(int $id, string $pseudo )
    {
        $this->id = $id;
        $this->pseudo = $pseudo;
       
        
    }

    /**
     * Get the value of pseudo
     */ 
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }
}

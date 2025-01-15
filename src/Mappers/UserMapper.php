<?php

class UserMapper {

    public static function mapToObject(array $data): User {

        $id = $data["id"];
        $pseudo = $data["pseudo"];
      
        return new User($id, $pseudo);
    }

    
}

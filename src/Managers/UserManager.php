<?php

class UserManager{


    /**
     * Verifies if the user exists in the database, redirects accordingly
     */
    public static function connectUser(string $username): void{


        $sanitizedUsername = self::sanitizeContent($username);

        $userRepo = new UserRepository;

        $connectedUser = $userRepo->findByPseudo($sanitizedUsername);

        if (!$connectedUser){
            header("Location: ./connexion.php?error=1");
            exit;
        }

        $_SESSION["user"] = $connectedUser;
        header("Location: ./choixTheme.php");
        exit;


    }


    public static function createUser(string $username): void {


        if (empty($username)) {
            header("Location:  ./inscription.php?error=1");
            exit;
        }
        
            
        $sanitizedUsername = self::sanitizeContent($username);
           
        $userRepo = new UserRepository();
        
        // Check if user already exists
        $user = $userRepo->findByPseudo($sanitizedUsername);
            
        if ($user) {
            header("Location: ./inscription.php?error=2");
            exit;
        }
        
        $userRepo->createUser($sanitizedUsername);

        header("Location:  ./index.php?success=1");
        exit;
    }




    private static function sanitizeContent(string $data): string {
        return htmlspecialchars(trim($data));
    }




    public static function checkScore(int $userId, int $quizId, int $userScore): array {

        $userRepo = new UserRepository;

        $userOldScore = $userRepo->fetchScore($userId, $quizId);

        if ($userOldScore) {
            $userOldScore = $userOldScore["score"];
        } else {
            $userOldScore = 0;
        }

        $_SESSION["oldScore"] = $userOldScore;

        $isBetterScore = false;
        if ($userScore > $userOldScore) {
            $userRepo->changeScore($userId, $quizId, $userScore);
            $isBetterScore = true;
        }

        return [
            'isBetterScore' => $isBetterScore,
            'oldScore' => $userOldScore
        ];
    }

}

?>
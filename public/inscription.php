<?php
include_once "./assets/components/htmlstart.php"
?>

<div class="w-full">



<div class="flex flex-col"> <!-- Card Formulaire -->




<form action="./process/process_create_user.php" method="post" class="flex flex-col items-center gap-4">
  <h2 class="text-4xl font-bold text-center text-gray-800 mb-4">Inscription</h2>
  <?php
if (isset($_GET["error"])) {    
    echo "<p class='text-xl text-center text-red-500'>Le pseudo {$_SESSION["erreur"]} est déjà pris.</p>";
    
    }
if (isset($_GET["success"])) {
    echo "<p class='text-green-500'> Le compte a bien été créé. </p>";
    }
?>
  <label for="pseudo" class="text-xl">Entrez votre pseudo :</label>
  <input type="text" name="pseudo" id="pseudo"  class="text-center rounded-xl w-[20%] border-2 border-black" placeholder="Votre pseudo">
  
  <input type="submit" value="S'inscrire"  class="p-3 px-7 bg-orange-500 cursor-pointer shadow-xl rounded-lg hover:scale-110 transition-all">
  
</form>


</div>

</div>
<?php
include_once "./assets/components/htmlend.php"
?>
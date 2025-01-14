<?php
include_once "./assets/components/htmlstart.php"
?>

<div class="w-full pt-[250px]">



<div class="flex flex-col"> <!-- Card Formulaire -->
<form action="./process/process_connect_user.php" method="post" class="flex flex-col items-center gap-4">
  <h2 class="text-4xl font-bold text-center text-gray-800 mb-6">Connexion</h2>

  <label for="pseudo" class="text-xl">Entrez votre pseudo :</label>
  <input type="text" name="pseudo" id="pseudo"  class="text-center rounded-xl w-[20%] border-2 border-black" placeholder="Votre pseudo">
  

  <input type="submit"  value="Se connecter" class="p-3 px-7 bg-orange-500 cursor-pointer shadow-xl rounded-lg hover:scale-110 transition-all">
  
</form>


</div>

<?php
if (isset($_SESSION["erreur"])) {
    
  echo "<p class='text-xl text-center text-red-500'>Le compte {$_SESSION["erreur"]} n'existe pas.</p>";
    
    
    unset($_SESSION["message"]);
}
?>

</div>
<?php
include_once "./assets/components/htmlend.php"
?>
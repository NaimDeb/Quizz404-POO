<?php
include_once "./assets/components/htmlstart.php";

if (isset($_SESSION["user"])) {
  header("Location: ./choixTheme.php");
  exit;
}

if (isset($_POST["pseudo"])) {
  UserManager::createUser($_POST["pseudo"]);
}
?>

<div class="w-full pt-[250px]">



<div class="flex flex-col"> 




<form action="./inscription.php" method="post" class="flex flex-col items-center gap-4">
  <h2 class="text-4xl font-bold text-center text-gray-800 mb-4">Inscription</h2>
  <?php
if (isset($_GET["error"])) {   
  switch ($_GET["error"]) {
    case 1:
      echo "<p class='text-xl text-center text-red-500'>Le pseudo que tu a donné est vide.</p>";
      break;
    
    case 2:
      echo "<p class='text-xl text-center text-red-500'>Le pseudo est déjà pris.</p>";
      break;
  } 
    }
if (isset($_GET["success"])) {
    echo "<p class='text-green-500'> Le compte a bien été créé. </p>";
    }
?>
  <label for="pseudo" class="text-xl ">Entrez votre pseudo :</label>
  <input type="text" name="pseudo" id="pseudo"  class="text-center rounded-xl w-[20%] max-sm:w-1/3 border-2 border-black" placeholder="Votre pseudo">
  
  <input type="submit" value="S'inscrire"  class="p-3 px-7 bg-orange-500 cursor-pointer shadow-xl rounded-lg hover:scale-110 transition-all">
  
</form>


</div>

</div>
<?php
include_once "./assets/components/htmlend.php"
?>
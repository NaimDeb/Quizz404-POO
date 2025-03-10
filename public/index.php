<?php
include_once "./assets/components/htmlstart.php";

if(isset($_SESSION["user"])){
  header("location: ./choixTheme.php");
}


?>


<div class="pt-[250px] max-sm:pt-[100px] flex flex-col gap-9 text-center w-100 items-center">

  <h1 class="font-first-font text-5xl max-sm:text-2xl">Bienvenue sur QUIZ405 inscrivez vous ou connecter vous pour jouer !</h1>


  <div class="flex gap-4  w-full justify-center text-center">
    <a class="text-white font-first-font font-extrabold hover:scale-110 transition-all" href="./inscription.php">
      <div class="w-[9%] h-[70px] items-center flex justify-center btn">
        Inscription
      </div>
    </a>
    <a class="text-white font-first-font font-extrabold hover:scale-110 transition-all" href="./connexion.php">
      <div class="w-[9%] h-[70px] items-center flex justify-center btn">
        Connexion
      </div>
    </a>
  </div>
</div>

<?php
include_once "./assets/components/htmlend.php"
?>
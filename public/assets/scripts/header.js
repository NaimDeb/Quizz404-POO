// document.addEventListener("mousemove", handleMouseMove);

// function handleMouseMove(event){
//     if ((event.target.classList).contains("btn")){
        
//         $currentBtn = event.target;

        
        


//     }
        
// }


document.querySelectorAll("btn").forEach($btn => {
    $btn.addEventListener("mousemove", handleMouseMove)
})




  
let timeRemaining = 0;
let timerInterval;
let stopTimer = false;



// Démarrer le timer
function startTimer() {
   
    timeRemaining = 10;
    stopTimer = false
    document.getElementById("demo").innerHTML = timeRemaining + "s"; 

    
    if (timerInterval) {
        clearInterval(timerInterval);
    }

    
    timerInterval = setInterval(myTimer, 1000);
}


function myTimer() {
    if (timeRemaining <= 0 || stopTimer == true) {
        clearInterval(timerInterval); 

        if (timeRemaining <= 0) {
            document.getElementById("demo").innerHTML = "Temps écoulé!";
        }

        answers.forEach(a => {
            a.removeEventListener("click", handleClickAnswer);  
        });

        nextButton.classList.remove("hidden");

    } else {
        document.getElementById("demo").innerHTML = timeRemaining + "s"; 
        timeRemaining--; 
    }
}


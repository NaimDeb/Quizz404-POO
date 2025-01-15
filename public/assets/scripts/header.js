// document.addEventListener("mousemove", handleMouseMove);

// function handleMouseMove(event){
//     if ((event.target.classList).contains("btn")){
        
//         $currentBtn = event.target;

        
        


//     }
        
// }


document.querySelectorAll("btn").forEach($btn => {
    $btn.addEventListener("mousemove", handleMouseMove)
})




  let timeRemaining = 10; 

    function myTimer() {
        if (timeRemaining <= 0) {
            clearInterval(timerInterval); 
            document.getElementById("demo").innerHTML = "Temps écoulé!";
        } else {
            document.getElementById("demo").innerHTML = timeRemaining + "s"; 
            timeRemaining--; 
        }
    }

    let timerInterval = setInterval(myTimer, 1000); 

    myTimer(); 

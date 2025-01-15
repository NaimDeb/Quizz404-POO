// document.addEventListener("mousemove", handleMouseMove);

// function handleMouseMove(event){
//     if ((event.target.classList).contains("btn")){
        
//         $currentBtn = event.target;

        
        


//     }
        
// }


document.querySelectorAll("btn").forEach($btn => {
    $btn.addEventListener("mousemove", handleMouseMove)
})
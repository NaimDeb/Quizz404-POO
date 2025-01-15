
const answers = document.querySelectorAll(".answer-item");
const nextButton = document.getElementById("next-button");
const questionContainer = document.getElementById("question-container");
let currentQuestionIndex = 0;
let score = 0; 
let timeRemaining = 10;
let timerInterval;
let isTimerStopped = false;



answers.forEach(answer => {
    answer.addEventListener("click", handleClickAnswer)
});

function handleClickAnswer(event) {
    const isRight = this.getAttribute("data-is-right") === "true";
    const correctAnswerText = this.closest('.question-card').querySelector('.correct-answer-text');
    const explanation = this.closest('.question-card').querySelector('.explanation');
    const correctAnswer = Array.from(this.closest('.question-card').querySelectorAll('.answer-item')).find(a => a.getAttribute("data-is-right") === "true");

    answers.forEach(a => {
        a.removeEventListener("click", handleClickAnswer)
    });

    this.classList.remove("text-gray-600");
    if (isRight) {
        this.classList.add("text-green-500", "font-bold", "border-green-500");
        score++;
    } else {
        this.classList.add("text-red-500", "font-bold", "border-red-500");
    }

    correctAnswerText.textContent = correctAnswer.getAttribute("data-answer");
    explanation.classList.remove("hidden");
    correctAnswerText.closest('.correct-answer').classList.remove("hidden");

    nextButton.classList.remove("hidden");
}



function handleClickNext() {
const currentQuestion = document.querySelector(`.question-card[data-question-index="${currentQuestionIndex}"]`);
currentQuestion.style.display = 'none'; 
currentQuestionIndex++; 

if (currentQuestionIndex < questionContainer.children.length) {
const nextQuestion = document.querySelector(`.question-card[data-question-index="${currentQuestionIndex}"]`);
nextQuestion.style.display = 'block'; 
nextButton.classList.add("hidden"); 
} else {

document.getElementById("demo").style.display = 'none';
questionContainer.innerHTML = `
    <h3 class="text-2xl font-semibold text-gray-700 mb-4">Quiz Fini !</h3>
    <p class="text-lg text-gray-600 mt-4">Votre score final : <span class="font-bold">${score} / ${questionContainer.children.length}</span></p>
`;
nextButton.style.display = 'none';
}


answers.forEach(answer => {
answer.addEventListener("click", handleClickAnswer);
});


startTimer();
}


nextButton.addEventListener("click", handleClickNext);


function handleClickAnswer(event) {
isTimerStopped = true;
const isRight = this.getAttribute("data-is-right") === "true";
const correctAnswerText = this.closest('.question-card').querySelector('.correct-answer-text');
const explanation = this.closest('.question-card').querySelector('.explanation');
const correctAnswer = Array.from(this.closest('.question-card').querySelectorAll('.answer-item')).find(a => a.getAttribute("data-is-right") === "true");


answers.forEach(a => {
a.removeEventListener("click", handleClickAnswer);  
});

this.classList.remove("text-gray-600");
if (isRight) {
this.classList.add("text-green-500", "font-bold", "border-green-500");
score++; 
} else {
this.classList.add("text-red-500", "font-bold", "border-red-500");
}

correctAnswerText.textContent = correctAnswer.getAttribute("data-answer");
explanation.classList.remove("hidden");
correctAnswerText.closest('.correct-answer').classList.remove("hidden");


nextButton.classList.remove("hidden");
}




answers.forEach(answer => {
    answer.addEventListener("click", handleClickAnswer);
});



startTimer();


// Démarrer le timer
function startTimer() {
   
    timeRemaining = timeRemaining;
    isTimerStopped = false
    document.getElementById("demo").innerHTML = timeRemaining + "s"; 

    
    if (timerInterval) {
        clearInterval(timerInterval);
    }

    
    timerInterval = setInterval(myTimer, 1000);
}


function myTimer() {
    if (timeRemaining <= 0 || isTimerStopped == true) {
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

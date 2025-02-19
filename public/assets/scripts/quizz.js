// Sélectionner tous les éléments de réponse
const answers = document.querySelectorAll(".answer-item");
// Sélectionner le bouton suivant
const nextButton = document.getElementById("next-button");
// Sélectionner le conteneur de questions
const questionContainer = document.getElementById("question-container");
// Initialiser l'index de la question actuelle
let currentQuestionIndex = 0;
// Initialiser le score
let score = 0; 
// Initialiser le temps restant pour chaque question
const maxTimeRemaining = 10;
let timeRemaining = maxTimeRemaining;
// Initialiser l'intervalle du minuteur
let timerInterval;
// Drapeau pour vérifier si le minuteur est arrêté
let isTimerStopped = false;

// Score de l'user
let totalScore = 0;

let isBetterScore;
let oldScore ;


//Appelle startTimer pour la première question

startTimer();

// Ajouter un écouteur d'événement de clic à chaque élément de réponse
answers.forEach(answer => {
    answer.addEventListener("click", handleClickAnswer)
});

// Fonction pour gérer le clic sur une réponse
function handleClickAnswer(event) {
    // Vérifier si la réponse sélectionnée est correcte
    const isRight = this.getAttribute("data-is-right") === "true";
    // Obtenir l'élément de texte de la réponse correcte
    const correctAnswerText = this.closest('.question-card').querySelector('.correct-answer-text');
    // Obtenir l'élément d'explication
    const explanation = this.closest('.question-card').querySelector('.explanation');
    // Trouver l'élément de la réponse correcte
    const correctAnswer = Array.from(this.closest('.question-card').querySelectorAll('.answer-item')).find(a => a.getAttribute("data-is-right") === "true");

    // Retirer l'écouteur d'événement de clic de tous les éléments de réponse
    answers.forEach(a => {
        a.removeEventListener("click", handleClickAnswer)
    });

    // Mettre à jour le style de la réponse sélectionnée
    this.classList.remove("text-gray-600");
    if (isRight) {
        this.classList.add("text-green-500", "font-bold", "border-green-500");
        score++;

        calculateScore();

    } else {
        this.classList.add("text-red-500", "font-bold", "border-red-500");
    }

    // On stoppe le timer
    isTimerStopped = true;

    // Afficher la réponse correcte et l'explication
    correctAnswerText.textContent = correctAnswer.getAttribute("data-answer");
    explanation.classList.remove("hidden");
    correctAnswerText.closest('.correct-answer').classList.remove("hidden");

    // Afficher le bouton suivant
    nextButton.classList.remove("hidden");
}


// Ajouter un écouteur d'événement de clic au bouton suivant
nextButton.addEventListener("click", handleClickNext);


// Fonction pour gérer le clic sur le bouton suivant
async function handleClickNext() {
    // Masquer la question actuelle
    const currentQuestion = document.querySelector(`.question-card[data-question-index="${currentQuestionIndex}"]`);
    currentQuestion.style.display = 'none'; 
    currentQuestionIndex++; 

    // Vérifier s'il y a plus de questions
    if (currentQuestionIndex < questionContainer.children.length) {
        // Afficher la question suivante
        const nextQuestion = document.querySelector(`.question-card[data-question-index="${currentQuestionIndex}"]`);
        nextQuestion.style.display = 'block'; 
        nextButton.classList.add("hidden"); 

    } else {
        // Afficher le score final
        document.getElementById("demo").style.display = 'none';

        fetch('./quizz.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({
                "score": totalScore,
                "idQuizz": idQuizz
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text(); // Convert response to text
        })
        .then(data => {
            console.log('Raw Response:', data); // Log pour voir ce qui est reçu
            const jsonData = JSON.parse(data); // Essayez de parser après validation
            isBetterScore = jsonData["isBetterScore"];
            oldScore = jsonData["oldScore"];
            console.log('Success:', jsonData);

            // Afficher le score final avec l'ancien score
            questionContainer.innerHTML = `
            <div class="flex flex-col gap-3">
                <h3 class="text-2xl font-semibold text-gray-700 mb-4">Quiz Fini !</h3>
                <p class="text-lg text-gray-600 mt-4">Votre score final : <span class="font-bold"> ${totalScore}</span> (Ancien score : <span class="font-bold">${oldScore}</span>)</p>
                <p class="text-lg text-gray-600 mt-4"> <span class="font-bold"> ${score} </span> / ${questionContainer.children.length} bonnes réponses</p>
                <a href="./index.php" class="btn-lite hover:scale-110 mt-8 px-4 py-2 bg-gray-500 text-white rounded-lg transition-all hover:bg-gray-700 max-sm:w-full md:w-auto">
                Retour aux quizz
                </a>
            </div>
            `;
        })
        .catch(error => {
            console.error('Error:', error);
        });

        nextButton.style.display = 'none';
    }

    // Ajouter un écouteur d'événement de clic à chaque élément de réponse
    answers.forEach(answer => {
        answer.addEventListener("click", handleClickAnswer);
    });

    // Redémarrer le minuteur
    startTimer();
}


// ------ MINUTEUR ------

// Fonction pour démarrer le minuteur
function startTimer() {
    timeRemaining = maxTimeRemaining;
    isTimerStopped = false;
    document.getElementById("demo").innerHTML = timeRemaining + "s"; 

    if (timerInterval) {
        clearInterval(timerInterval);
    }

    timerInterval = setInterval(myTimer, 100);
}

// Fonction du minuteur pour mettre à jour le minuteur chaque seconde
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
        timeRemaining = parseFloat((timeRemaining - 0.1).toPrecision(2)); 
    }
}


function calculateScore() {
    const numberOfQuestions = questionContainer.children.length;
    totalScore += Math.floor(((((timeRemaining / maxTimeRemaining) * 1000) + 1000) / (numberOfQuestions * 2)));
}

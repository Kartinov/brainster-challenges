const loadingScreen = document.getElementById('loading-screen');
const startScreen = document.getElementById('start-screen');
const welcomeText = document.getElementById('welcome-text');
const gameWrapper = document.getElementById('ingame-wrapper');

const questionsDiv = document.getElementById('questions');

// buttons
const startQuizBtn = document.getElementById('start-quiz-btn');
const restartQuizBtn = document.getElementById('restart-quiz-btn');

window.addEventListener('load', () => {
    loadingScreen.classList.remove('hide');
    loadingScreen.classList.add('d-flex');

    window.location.hash = ''; // empty hash if any

    saveQuestions();

    this.addEventListener('hashchange', changeQuestion);

    startQuizBtn.addEventListener('click', startQuiz);
    restartQuizBtn.addEventListener('click', restartQuiz);
});

/**
 * Fetch and save in Local Storage
 */
function saveQuestions() {
    fetchQuestions().then(data => {
        data = JSON.stringify(data.results);
        window.localStorage.setItem('questions', data);

        loadingScreen.classList.add('hide');
        startScreen.classList.add('show');
    });
}

/**
 * Fetch questions
 *
 * @returns {array} questions
 */
async function fetchQuestions() {
    const response = await fetch(`https://opentdb.com/api.php?amount=20`);
    const data = await response.json();
    return data;
}

/**
 * Start quiz
 */
function startQuiz() {
    createCorrectStorage(); // create correct answers counter

    window.location.hash = '#question-1';

    renderProgress();

    finishText('hide');

    goodLuckText('show');

    showStartOverBtn();

    questionsDiv.classList.remove('hide');
    questionsDiv.classList.add('show');

    gameWrapper.classList.add('show'); // show questions and progress DIV
}

/**
 * Restars quiz
 */
function restartQuiz() {
    saveQuestions(); // fetch and save new questions

    clearCorrectStorage(); // clear localStorage previous correct counter

    startQuiz(); // start quiz again
}

/**
 * Gets correct answers from localStorage
 * Does some DOM changes
 */
function finishQuiz() {
    goodLuckText('hide');

    finishText('show');

    hideQuestionsDiv();

    showTryAgainBtn();

    renderProgressCorrect();
}

/**
 * Get and show question in DOM
 */
function changeQuestion() {
    const currentHash = window.location.hash;

    if (currentHash.includes('#question-')) {
        const questionNumber =
            parseInt(currentHash.replace('#question-', '')) - 1;
        const question = getQuestion(questionNumber);

        renderQuestion(question);
    }
}

/**
 *
 * @param {number} questionNumber
 * @returns {object} question
 */
function getQuestion(questionNumber) {
    let questions = window.localStorage.getItem('questions');
    questions = JSON.parse(questions);

    return questions[questionNumber];
}

/**
 *
 * @param {object} question
 */
function renderQuestion(question) {
    const questionAnswers = [
        {
            answer: question.correct_answer,
            correct: true,
        },
    ];

    question.incorrect_answers.forEach(incorrectAnswer => {
        let objIncorrectAnswer = {
            answer: incorrectAnswer,
            correct: false,
        };

        questionAnswers.push(objIncorrectAnswer);
    });

    questionAnswers.sort(() => Math.random() - 0.5); // shuffle answers

    questionsDiv.innerHTML = ` 
    <div class='animate__animated animate__fadeIn'>
        <h3 class='bg-light p-3'>${question.question}</h3>
        <div id='answersDiv' class='py-4'></div>
        <div class='bg-light text-left p-3'>${question.category}</div>
    </div>
    `;

    const answersDiv = document.getElementById('answersDiv');

    questionAnswers.forEach((answer, index) => {
        let button = document.createElement('button');
        button.innerHTML = questionAnswers[index].answer;
        button.dataset.correct = questionAnswers[index].correct;
        button.classList.add('btn', 'btn-outline-secondary', 'm-2');

        button.addEventListener('click', submitAnswer);

        answersDiv.appendChild(button);
    });
}

/**
 * - update localStorage correct++
 * - update progress in DOM
 * - changes hash to next question
 *
 * @returns {undefined}
 */
function submitAnswer(e) {
    const clickedAnswer = e.target.dataset.correct;
    let currentValue = null;

    if (clickedAnswer == 'true') {
        currentValue = parseInt(window.localStorage.getItem('correct'));
        currentValue++;
        window.localStorage.setItem('correct', currentValue);
    }

    updateProgressDOM();

    let currentHash = window.location.hash;
    let nextQuestionNumber =
        parseInt(currentHash.replace('#question-', '')) + 1;

    if (nextQuestionNumber == 21) {
        finishQuiz();
        return;
    }

    window.location.hash = '#question-' + nextQuestionNumber;
}

function renderProgressCorrect() {
    const progress = document.getElementById('progress');
    const correctAnswers = window.localStorage.getItem('correct');

    progress.innerHTML = `Total Correct Answers: 
                                <span id='ingame-progress'>${correctAnswers}</span>/20`;
}

/**
 * render progress message
 */
function renderProgress() {
    const progressDiv = document.getElementById('progress');

    progressDiv.innerHTML = `
        Completed <span id="ingame-progress">0</span>/20
    `;
}

/**
 * update progress based on current answered question
 */
function updateProgressDOM() {
    const progress = document.getElementById('ingame-progress');

    window.location.hash == ''
        ? (progress.innerHTML = 0)
        : (progress.innerHTML = window.location.hash.replace('#question-', ''));
}

function createCorrectStorage() {
    window.localStorage.setItem('correct', 0);
}

function clearCorrectStorage() {
    window.localStorage.removeItem('correct');
}

function showStartOverBtn() {
    startQuizBtn.classList.add('hide'); // hide start btn

    restartQuizBtn.classList.remove('hide');
    restartQuizBtn.classList.add('d-inline-block');
    restartQuizBtn.classList.remove('btn-danger');
    restartQuizBtn.classList.add('btn-warning');
    restartQuizBtn.innerHTML = 'Start Over';
}

function showTryAgainBtn() {
    restartQuizBtn.classList.remove('btn-warning');
    restartQuizBtn.classList.add('btn-danger');
    restartQuizBtn.innerText = 'Try Again';
}

function hideQuestionsDiv() {
    questionsDiv.classList.remove('show');
    questionsDiv.classList.add('hide');
}

/**
 *
 * @param {string} show
 * @param {string} hide
 */
function goodLuckText(showOrHide) {
    const goodLuck = document.getElementById('ingame-text');

    if (showOrHide === 'show') {
        welcomeText.classList.add('hide');
        goodLuck.classList.add('show');
    } else if (showOrHide === 'hide') {
        goodLuck.classList.remove('show');
        goodLuck.classList.add('hide');
    }
}

function finishText(showOrHide) {
    const finish = document.getElementById('finish-text');

    if (showOrHide === 'show') {
        finish.classList.add('show');
    } else if (showOrHide === 'hide') {
        finish.classList.remove('show');
        finish.classList.add('hide');
    }
}

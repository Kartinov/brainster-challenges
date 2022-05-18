window.addEventListener('load', () => {
    getQuestions('https://opentdb.com/api.php?amount=20');
});

async function getQuestions(apiUrl) {
    const response = await fetch(apiUrl); // storing response
    const apiData = await response.json(); // storing data in form of JSON

    hideLoader();
    showStartScreen();
}

function hideLoader() {
    document.getElementById('loader').classList.add('hide');
}

function showStartScreen() {
    document.getElementById('start-screen').classList.add('show');
}

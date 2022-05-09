export function addBook(e) {
    e.preventDefault();
    console.log('inside from');
    const inputTitle = document.getElementById('title');
    const inputAuthor = document.getElementById('author');
    const inputOnPage = document.getElementById('onPage');
    const inputMaxPages = document.getElementById('maxPages');

    const errorMessages = document.getElementById('errorMessages');

    let errors = [];

    if (inputTitle.value.length === 0) {
        errors.push('Title field is required');
        inputTitle.style.borderColor = 'red';
    } else {
        inputTitle.style.borderColor = 'green';
    }

    if (inputAuthor.value.length === 0) {
        errors.push('Author field is required');
        inputAuthor.style.borderColor = 'red';
    } else {
        inputAuthor.style.borderColor = 'green';
    }

    if (inputMaxPages.value === '' || inputMaxPages.value === 0) {
        errors.push('You have to provide number of pages');
        inputMaxPages.style.borderColor = 'red';
    } else {
        inputMaxPages.style.borderColor = 'green';

        if (inputOnPage.value === '') {
            inputOnPage.value = 0;
        } else if (inputOnPage.value > inputMaxPages.value) {
            errors.push(
                "Current page field has to be lower than Book's Max Pages"
            );
            inputOnPage.style.borderColor = 'red';
        } else {
            inputOnPage.style.borderColor = 'green';
        }
    }

    errorMessages.innerHTML = ''; // clear

    if (errors.length > 0) {
        errors.forEach(error => {
            errorMessages.innerHTML += `<p>${error}</p>`;
        });
    } else {
        // add object
    }
}

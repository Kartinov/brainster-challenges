import { books } from './books.js';

/**
 * First list:
 * Map & Append all books objects as HTML elements
 *
 * @param {object} books
 */
export function renderBooks(books) {
    const listOfBooks = document.getElementById('books');

    listOfBooks.innerHTML = books
        .map(book => {
            return `<li>${book.title} by ${book.author}</li>`;
        })
        .join('');
}

/**
 * Second List:
 * Books with activity message
 *
 * @param {object} books
 */
export function renderBooksActivity(books) {
    const booksActivity = document.getElementById('booksActivity');
    booksActivity.innerHTML = ''; // clear

    let message = '';
    let textColor = '';

    books.forEach(book => {
        message = 'You still need to read';
        textColor = 'red';

        if (book.maxPages === book.onPage) {
            message = 'You already have read';
            textColor = 'green';
        }

        const liElement = document.createElement('li');
        liElement.style.color = textColor;
        liElement.innerHTML = `${message} ${book.title} ${book.author}`;

        booksActivity.appendChild(liElement);
    });
}

/**
 * Render Table with page progress
 *
 * @param {object} books
 */
export function renderTableWithBooks(books) {
    const tableContainer = document.getElementById('tableContainer');
    tableContainer.innerHTML = ''; // clear

    const table = document.createElement('table');
    const thead = document.createElement('thead');
    const tbody = document.createElement('tbody');

    table.appendChild(thead);
    table.appendChild(tbody);

    const headingsData = [
        'Title',
        'Author',
        'Max Pages',
        'On Page',
        'Progress',
    ];

    const headingRow = document.createElement('tr');

    headingsData.forEach(heading => {
        const tHeading = document.createElement('th');
        tHeading.innerHTML = heading;

        headingRow.appendChild(tHeading);
    });

    thead.appendChild(headingRow);

    let booksWithProgress = books.map(book => {
        return {
            // add already declared properties
            ...book,
            // add calculated percentage property
            progress: Math.floor((book.onPage / book.maxPages) * 100),
        };
    });

    booksWithProgress.forEach(book => {
        tbody.innerHTML += `
            <tr>
                <td>${book.title}</td>
                <td>${book.author}</td>
                <td>${book.maxPages}</td>
                <td>${book.onPage}</td>
                <td class='td-progress'>
                    <div class='progress'>
                        <div class='progress-inner' style='width: ${book.progress}%'>${book.progress}%</div>
                    </div>
                </td>
            </tr>
        `;
    });

    tableContainer.appendChild(table);
}

/**
 * Form Handler for Adding books
 */
export function handlerAddBook(e) {
    e.preventDefault();

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

        inputOnPage.style.borderColor = 'green';

        if (inputOnPage.value === '') {
            inputOnPage.value = 0;
        } else if (inputOnPage.value > inputMaxPages.value) {
            errors.push(
                "Current page field has to be lower than Book's Max Pages"
            );
            inputOnPage.style.borderColor = 'red';
        }
    }

    errorMessages.innerHTML = ''; // clear

    if (errors.length > 0) {
        errors.forEach(error => {
            errorMessages.innerHTML += `<p>${error}</p>`;
        });
    } else {
        books.push({
            title: inputTitle.value,
            author: inputAuthor.value,
            maxPages: inputMaxPages.value,
            onPage: inputOnPage.value,
        });

        resetInputs(inputTitle, inputAuthor, inputMaxPages, inputOnPage);

        let successMessage = document.getElementById('successMessage');
        successMessage.style.visibility = 'visible';

        setTimeout(() => (successMessage.style.visibility = 'hidden'), 5000);

        renderBooks(books);

        renderBooksActivity(books);

        renderTableWithBooks(books);
    }
}

function resetInputs(...inputs) {
    // reset values
    inputs.forEach(input => {
        input.value = '';
        input.style.borderColor = 'grey';
    });
}

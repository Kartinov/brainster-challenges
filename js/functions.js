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

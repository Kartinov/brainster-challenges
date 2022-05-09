/**
 * Map & Append all books objects as HTML elements
 *
 * @param {object} books
 */
export function listBooks(books) {
    const listOfBooks = document.getElementById('books');

    listOfBooks.innerHTML = books
        .map(book => {
            return `<li>${book.title} by ${book.author}</li>`;
        })
        .join('');
}

/**
 *
 * @param {object} books
 */
export function listBooksActivity(books) {
    const booksActivity = document.getElementById('booksActivity');

    let message = 'You still need to read';

    books.forEach(book => {
        if (book.maxPages === book.onPage) message = 'You already have read';

        booksActivity.innerHTML += `
            <li>${message} ${book.title} ${book.author}</li>`;
    });
}

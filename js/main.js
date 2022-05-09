import { books } from './books.js';
import * as func from './functions.js';
import * as handler from './handlers.js';

window.addEventListener('load', () => {
    func.renderBooks(books);

    func.renderBooksActivity(books);

    func.renderTableWithBooks(books);

    // Handling form
    const form = document.getElementById('formAddBook');

    form.addEventListener('submit', handler.addBook);
});

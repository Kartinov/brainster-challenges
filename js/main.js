import { books } from './books.js';
import * as func from './functions.js';

window.addEventListener('load', () => {
    func.renderBooks(books);

    func.renderBooksActivity(books);

    func.renderTableWithBooks(books);

    // Handling form
    const form = document.getElementById('formAddBook');

    form.addEventListener('submit', func.handlerAddBook);
});

import { books } from './books.js';
import * as func from './functions.js';

window.addEventListener('load', () => {
    func.listBooks(books); // list books in HTML DOM

    func.listBooksActivity(books); // list books with activity message
});

// Functions

/**
 * Only whole numbers e.g. [1, 5, 10, 25, 50]
 *
 * @param {integer} number
 */
function isEvenAndConsoleMessage(number) {
    if (!Number.isInteger(number)) {
        return console.log(`${number} is not a whole number.`)
    }

    if (isEven(number)) {
        return console.log(`The number ${number} is even`)
    }

    return console.log(`The number ${number} is not even`)
}

/**
 *
 * @param {number} number
 */
function isEven(number) {
    return number % 2 === 0 ? true : false
}

// ====== Task 1 ======

const givenNumber = 4

isEvenAndConsoleMessage(givenNumber)

// ====== Task 2 ======

let expectedNumbers = []

for (let i = 10; i <= 100; i++) {
    if (isEven(i) && i % 3 === 0) {
        expectedNumbers.push(i)
    }
}

console.log(expectedNumbers)

// ====== Task 3 ======

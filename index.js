// Functions

function isEvenAndConsoleMessage(number) {
    if (!Number.isInteger(number)) {
        return console.log(`${number} is not a whole number.`)
    }

    if (isEven(number)) {
        return console.log(`The number ${number} is even`)
    }

    return console.log(`The number ${number} is not even`)
}

function isEven(number) {
    return number % 2 === 0 ? true : false
}

function isPrimeNumber(number) {
    for (let i = 2; i < number; i++) {
        if (number % i === 0) return false
    }
    return number > 1
}

function isPrimeMessage(number) {
    if (isPrimeNumber(number)) {
        return 'is prime'
    }

    return 'is not prime'
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

const numbers = [13, 15, 20]

let smallest = (largest = numbers[0])

numbers.forEach(number => {
    if (number > largest) {
        largest = number
    } else if (number < smallest) {
        smallest = number
    }
})

console.log('numbers', numbers)
console.log('smallest', smallest)
console.log('largest', largest)

console.log(`The smallest number ${smallest} ${isPrimeMessage(smallest)}`)
console.log(`The largest number ${largest} ${isPrimeMessage(largest)}`)

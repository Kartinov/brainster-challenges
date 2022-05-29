import { Race } from './Race.js';

export class Car {
    /**
     * everyone is a winner at first sight,
     * but who will remain 😃
     *
     * private properties 🔒
     */
    #winner = true;
    #speed = 0; // value will be increased in drive()
    #speedMin = 500;
    #speedMax = 2000;

    element = undefined;

    constructor(element) {
        this.element = element;
        this.#speed = this.randomSpeed;
    }

    get speed() {
        return this.#speed;
    }

    set winner(bool) {
        this.#winner = bool;
    }

    get winner() {
        return this.#winner;
    }

    get randomSpeed() {
        return Math.floor(
            Math.random() * (this.#speedMax - this.#speedMin + 1) +
                this.#speedMin
        );
    }

    get placement() {
        return this.winner ? 'first' : 'second';
    }

    drive() {
        const endPosition = Race.getEndPosition(this.element);
        const car = this;

        const driving = this.element
            .animate({ left: endPosition }, this.speed, function () {
                Race.renderSingleResult(car);
                Race.flag('show');
            })
            .promise();

        return driving;
    }
}

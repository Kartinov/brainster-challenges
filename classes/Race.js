import { Car } from './Car.js';

export class Race {
    // buttons
    static startRaceBtn = $('#start-race-btn');
    static startOverBtn = $('#start-over-btn');

    // race properties
    static raceTrack = $('#race-track');
    static carsWrapper = $('#cars-wrapper');
    static trackCenterDiv = $('#track-center-div');
    static raceFinishFlag = $('#race-finish-flag');
    static darkenTrack = $('#darken-track');
    static currentRaceResults = $('#current-race-results');
    static previousRaceResults = $('#previous-race-results');

    static allCars = $('.car');

    static saveRaceResults(data) {
        localStorage.setItem('previousRaceResults', JSON.stringify(data));
    }

    static get previousResults() {
        return JSON.parse(localStorage.getItem('previousRaceResults'));
    }

    static start = () => {
        this.startRaceBtn.prop('disabled', true); // disable start race btn
        this.startOverBtn.prop('disabled', true); // disable start over btn

        /* Creating a new instances of the Car class. */
        const car1 = new Car($('#car-1'));
        const car2 = new Car($('#car-2'));

        $.when(this.timer()).done(function () {
            car1.speed < car2.speed
                ? (car2.winner = false)
                : (car1.winner = false);

            Race.renderResultsTable();

            // finished race
            Promise.all([car1.drive(), car2.drive()]).then(results => {
                Race.startOverBtn.prop('disabled', false); // enable start over btn

                const data = {
                    car1: {
                        placement: car1.placement,
                        speed: car1.speed,
                    },
                    car2: {
                        placement: car2.placement,
                        speed: car2.speed,
                    },
                };

                Race.saveRaceResults(data);
            });
        });
    };

    /* A method that is called when the page is loaded. */
    static prepare = () => {
        this.startRaceBtn.prop('disabled', false); // enable start race btn
        this.startOverBtn.prop('disabled', true); // disable start over btn

        this.carsToDefaultPosition(); // reset cars positions to default

        if (this.isFlagVisible()) this.flag('hide'); // hide the flag if visible
    };

    /**
     * Checking if the cars are visible, if they are,
     * animate them to the left, otherwise fade in the wrapper
     */
    static carsToDefaultPosition() {
        this.carsWrapper.is(':visible')
            ? this.allCars.animate({ left: 0 }, 300)
            : this.carsWrapper.fadeIn(600);
    }

    /**
     * promise timer that will resolve after 3 seconds.
     *
     * @returns bool true
     */
    static timer() {
        const raceStartCounter = $('#race-start-counter');

        raceStartCounter.empty(); // clear

        return new Promise((resolve, reject) => {
            raceStartCounter.show();

            let timeLeft = 3; // start counter at

            let interval = setInterval(function () {
                if (timeLeft <= 0) {
                    clearInterval(interval);
                    raceStartCounter.hide();
                    resolve(true);
                }

                raceStartCounter.html(timeLeft);
                timeLeft -= 1;
            }, 800);
        });
    }

    /**
     * If 'show', then
     * darken the race track and fade in the race finish flag
     * ---------------
     * If 'hide', then
     * lighten the race track and fade out the race finish flag
     *
     * @param showOrHide - 'show' or 'hide'
     */
    static flag(showOrHide) {
        switch (showOrHide) {
            case 'show':
                this.darkenRaceTrack();
                this.raceFinishFlag.fadeIn(300);
                break;
            case 'hide':
                this.lightenRaceTrack();
                this.raceFinishFlag.fadeOut(300);
                break;
        }
    }

    /**
     * shows the darkenTrack div and
     * sets the opacity of the carsWrapper div to 0.5.
     */
    static darkenRaceTrack() {
        this.darkenTrack.show();
        this.carsWrapper.css('opacity', 0.5);
    }

    /**
     * hides the darkenTrack div and
     * sets the opacity of the carsWrapper div to 1.
     */
    static lightenRaceTrack() {
        this.darkenTrack.hide();
        this.carsWrapper.css('opacity', 1);
    }

    /**
     * If the raceFinishFlag is visible, return true, otherwise return false.
     * @returns The return value is a boolean value.
     */
    static isFlagVisible() {
        return this.raceFinishFlag.is(':visible');
    }

    static getEndPosition(carElement) {
        return this.raceTrack.width() - carElement.width();
    }

    previous() {
        // local storage
    }

    static renderResultsTable() {
        const content = `
            <div class='results-wrapper row hidden'>
                <div class="col-lg-6 result result-1"></div>
                <div class="col-lg-6 result result-2"></div>
            </div>`;

        this.currentRaceResults.prepend(content);
    }

    static renderSingleResult(car) {
        const content = `
            <div class="inner">
                <p>
                    Finished in:
                    <span>${car.placement}</span>
                    place with a time of
                    <span>${car.speed}</span>
                    miliseconds!
                </p>
            </div>`;

        const resultsWrapper = $('.results-wrapper');
        const finishedCar = car.element.data('car');
        const carResult = $(
            `.results-wrapper:first-child > .result-${finishedCar}`
        );

        carResult.html(content);

        resultsWrapper.css('display', 'flex');
    }

    static renderPreviousResults() {
        const results = this.previousResults;
        console.log(results);
        if (results) {
            const content = `
                <div class="result result-1">
                      <div class="inner">
                          <p>
                              <span>Car 1</span>
                              finished in:
                              <span>${results.car1.placement}</span>
                              place, with a time of
                              <span>${results.car1.speed}</span>
                              miliseconds!
                          </p>
                      </div>
                  </div>
                  <div class="result result-2">
                      <div class="inner">
                          <p>
                              <span>Car 2</span>
                              finished in:
                              <span>${results.car2.placement}</span>
                              place, with a time of
                              <span>${results.car2.speed}</span>
                              miliseconds!
                          </p>
                      </div>
                  </div>`;

            this.previousRaceResults.append(content);
            this.previousRaceResults.fadeIn();
        }
    }
}

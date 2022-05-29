import { Race } from '../../classes/Race.js';

$(function () {
    Race.renderPreviousResults();

    Race.prepare();

    Race.startRaceBtn.on('click', Race.start); // start race

    Race.startOverBtn.on('click', Race.prepare); // start race again
});

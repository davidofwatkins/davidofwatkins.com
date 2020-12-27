/**
 * Get a holiday message based on the time of year
 *
 * @todo someday this could get more advanced with https://www.npmjs.com/package/date-holidays, but
 * don't want to overengineer things for now (webpack on github pages).
 */

var getCurrentHolidayMessage = function () {
    var now = new Date();

    if (now.getMonth() === 11) {
        return 'Happy holidays!';
    }

    if (now.getMonth() === 0 && now.getDate() < 15) {
        return 'Happy new year!';
    }

    return '';
};

document.getElementsByClassName('holiday-message')[0].innerHTML = getCurrentHolidayMessage();
